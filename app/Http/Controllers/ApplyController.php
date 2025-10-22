<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Mail\RejectionMail;
use App\Mail\AcceptanceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewInvitationMail;
use Illuminate\Support\Facades\Storage;

class ApplyController extends Controller
{
    public function index()
    {
        $apply = Apply::all();
        confirmDelete('Hapus apply', 'Apakah yakin menghapus apply ini?');
        return view('apply.index', compact('apply'));
    }

    public function create()
    {
        return view('apply.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ],[
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'posisi.required' => 'Posisi harus diisi',
            'cv.required' => 'CV harus diisi',
            'cv.mimes' => 'CV harus berupa file pdf, doc, atau docx',
            'cv.max' => 'Ukuran file CV maksimal 2MB',
        ]);

        $data = $request->all();

        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        Apply::create($data);
        toast()->success('Data Apply berhasil ditambahkan');
        return redirect()->route('apply.index');
    }

    public function storePublic(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ],[
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'posisi.required' => 'Posisi harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'cv.required' => 'CV harus diisi',
            'cv.mimes' => 'CV harus berupa file pdf, doc, atau docx',
            'cv.max' => 'Ukuran file CV maksimal 2MB',
        ]);

        $data = $request->all();

        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        $apply = Apply::create($data);
        try {
        // Asumsi Anda punya Mailable ApplySubmitted
        Mail::to($apply->email)->queue(new \App\Mail\ApplySubmitted($apply));
    } catch (\Exception $e) {
        // Opsional: Log error jika pengiriman gagal
    }
        toast()->success('Lamaran Anda berhasil dikirim! Silakan tunggu konfirmasi.'); 
    
    // Redirect: Kembali ke halaman form lamaran dengan session 'success'
    return redirect()->back()->with('success', 'Lamaran Anda berhasil dikirim! Silakan tunggu konfirmasi.');

    }

    public function edit($id)
    {
        $apply = Apply::findOrFail($id);
        return view('apply.edit', compact('apply'));
    }

    public function update(Request $request, $id)
    {
        $apply = Apply::findOrFail($id);
        $oldStatus = $apply->status;

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:Baru,Ditinjau,Wawancara,Diterima,Ditolak',
        ]);

        $data = $request->all();

        if ($request->hasFile('cv')) {
            if ($apply->cv) {
                Storage::disk('public')->delete($apply->cv);
            }
            $data['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        $apply->update($data);

        $newStatus = $apply->status; // Ambil status baru setelah update

        // 4. LOGIKA NOTIFIKASI EMAIL
        if ($oldStatus !== $newStatus) {
            if ($newStatus === 'Wawancara') {
                Mail::to($apply->email)->queue(new InterviewInvitationMail($apply));
            } else if ($newStatus === 'Diterima') {
                Mail::to($apply->email)->queue(new AcceptanceMail($apply));
            } else if ($newStatus === 'Ditolak') {
                Mail::to($apply->email)->queue(new RejectionMail($apply));
            }
        }

        toast()->success('Data Apply berhasil diperbarui');
        return redirect()->route('apply.index');
    }

    public function destroy($id)
    {
        $apply = Apply::findOrFail($id);

        if ($apply->cv) {
            Storage::disk('public')->delete($apply->cv);
        }

        $apply->delete();
        toast()->success('Data Apply berhasil dihapus');
        return redirect()->route('apply.index');
    }
}

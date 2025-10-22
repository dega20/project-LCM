<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::all();
        confirmDelete('Hapus FAQ', 'apakah yakin menghapus faq ini?'); 
        return view('faq.index', compact('faqs'));
    }

    public function create(){
        return view('faq.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'question' => 'required|string|max:255', 
            'answer' => 'required|string'
        ]);

        Faq::create($validatedData);
        toast()->success('Faq berhasil ditambahkan');
        return redirect()->route('faq.index');
    }

    public function edit(Faq $faq){
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq){
        $validatedData = $request->validate([
            'question' => 'required|string|max:255', 
            'answer' => 'required|string'
        ]);

        $faq->update($validatedData);
        toast()->success('Faq berhasil di perbarui');
        return redirect()->route('faq.index');
    }

    public function destroy(Faq $faq){
        $faq->delete();
        toast()->success('Faq berhasil dihapus');
        return redirect()->route('faq.index');
    }
}

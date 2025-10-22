@extends('layouts.app')

@section('content_title', 'Edit Apply')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Apply</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('apply.update', $apply->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', $apply->nama) }}" class="form-control">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $apply->email) }}" class="form-control">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <input type="text" name="posisi" value="{{ old('posisi', $apply->posisi) }}" class="form-control">
                    @error('posisi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $apply->deskripsi ?? '') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>CV</label>
                    @if ($apply->cv)
                        <p><a href="{{ asset('storage/' . $apply->cv) }}" target="_blank">Lihat CV Lama</a></p>
                    @endif
                    <input type="file" name="cv" class="form-control">
                    @error('cv')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-1">
    <label for="status">Ubah Status Lamaran</label>
    <select name="status" id="status" class="form-control">
        {{-- Ambil status lama dari database jika ada, atau nilai dari old() --}}
        @php $currentStatus = old('status', $apply->status ?? 'Baru'); @endphp
        
        <option value="Baru" {{ $currentStatus == 'Baru' ? 'selected' : '' }}>Baru</option>
        <option value="Ditinjau" {{ $currentStatus == 'Ditinjau' ? 'selected' : '' }}>Ditinjau</option>
        <option value="Wawancara" {{ $currentStatus == 'Wawancara' ? 'selected' : '' }}>Wawancara</option>
        <option value="Diterima" {{ $currentStatus == 'Diterima' ? 'selected' : '' }}>Diterima</option>
        <option value="Ditolak" {{ $currentStatus == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>
</div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('apply.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

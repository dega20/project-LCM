@extends('layouts.app')

@section('content_title', 'Apply')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title my-1">Daftar Apply</h3>
            <div class="d-flex justify-content-end">
                <a href="{{ route('apply.create') }}" class="btn btn-sm btn-primary">Tambah Apply</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-sm w-100" id="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Posisi</th>
                        <th>Deskripsi</th>
                        <th>CV</th>
                        <th>Tgl.Apply</th>
                        <th>Status</th>
                        <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apply as $lamar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lamar->nama }}</td>
                            <td>{{ $lamar->email }}</td>
                            <td>{{ $lamar->posisi }}</td>
                            <td>{{ $lamar->deskripsi }}</td>
                            <td>
                                @if ($lamar->cv)
                                    <a href="{{ asset('storage/' . $lamar->cv) }}" target="_blank">Lihat CV</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                {{ $lamar->created_at->format('d M Y') }}
                                {{-- {{ $lamar->created_at->locale('id')->translatedFormat('l, d F Y') }} --}}
                            </td>
                            <td>
                                @php
                                    $status = $lamar->status;
                                    $colorClass = match ($status) {
                                        'Baru' => 'bg-primary', // Biru
                                        'Ditinjau' => 'bg-info', // Cyan/Biru Muda
                                        'Wawancara' => 'bg-warning', // Kuning/Oranye
                                        'Diterima' => 'bg-success', // Hijau
                                        'Ditolak' => 'bg-danger', // Merah
                                        default => 'bg-secondary', // Abu-abu (untuk status tidak dikenal)
                                    };
                                @endphp

                                <span class="badge {{ $colorClass }}">
                                    {{ $status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('apply.edit', $lamar->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('apply.destroy', $lamar->id) }}" data-confirm-delete="true"
                                    class="btn btn-sm btn-danger mx-1">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

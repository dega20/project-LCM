@extends('layouts.app')
@section('content_title', 'Manajemen FAQ')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title my-1">Manajemen FAQ</h3>
            <div class="d-flex justify-content-end">
                <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">Tambah Faq</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm w-100" id="table2">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <a href="{{ Route('faq.edit', $faq->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('faq.destroy', $faq->id) }}" data-confirm-delete="true" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

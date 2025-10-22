@extends('layouts.app')
@section('content_title', 'Buat Faq baru')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Faq</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="question">Pertanyaan</label>
                <input type="text" name="question" class="form-control" value="{{ old('question') }}">
            </div>
            <div class="form-group mb-3">
                <label for="answer">Jawaban</label>
                <textarea type="text" name="answer" class="form-control" value="{{ old('answer') }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Faq</button>
            <a href="{{ route('faq.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
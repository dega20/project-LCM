@extends('layouts.app')
@section('content_title', 'Edit FAQ')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit FAQ</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="question">Pertanyaan</label>
                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}">
            </div>
            <div class="form-group mb-3">
                <label for="answer">Jawaban</label>
                <input type="text" name="answer" class="form-control" value="{{ old('answer', $faq->answer) }}">
            </div>
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
            <a href="{{ route('faq.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
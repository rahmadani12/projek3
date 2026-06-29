@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Edit Note</h2>

    <form
        action="{{ route('notes.update',$note->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Judul</label>

            <input
                type="text"
                name="title"
                value="{{ $note->title }}"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Isi Note</label>

            <textarea
                name="content"
                rows="10"
                class="form-control">{{ $note->content }}</textarea>

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('notes.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection
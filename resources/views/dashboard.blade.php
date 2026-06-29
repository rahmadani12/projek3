@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Dashboard</h2>

    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">
        Tambah Note
    </a>

    @forelse($notes as $note)

        <div class="card mb-3">

            <div class="card-body">

                <h5>{{ $note->title }}</h5>

                <p>{{ $note->content }}</p>

                <a href="{{ route('notes.edit',$note->id) }}"
                    class="btn btn-warning">

                    Edit

                </a>

            </div>

        </div>

    @empty

        <div class="alert alert-info">
            Belum ada note.
        </div>

    @endforelse

</div>

@endsection
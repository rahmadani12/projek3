@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>My Notes</h2>

    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">
        Tambah Note
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="70">No</th>
                <th>Judul</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($notes as $note)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $note->title }}</td>

            <td>

                <a href="{{ route('notes.edit',$note->id) }}"
                    class="btn btn-warning">

                    Edit

                </a>

                <form action="{{ route('notes.destroy',$note->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Hapus data?')"
                        class="btn btn-danger">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="3">

                Belum ada note

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>
@endsection
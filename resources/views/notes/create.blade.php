@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Tambah Note</h2>

<form action="{{ route('notes.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Judul</label>

<input
type="text"
name="title"
class="form-control"
 required>

</div>

<div class="mb-3">

<label>Isi Note</label>

<textarea
name="content"
rows="8"
class="form-control"></textarea>

</div>

<button class="btn btn-success">

Simpan

</button>

<a href="{{ route('notes.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection
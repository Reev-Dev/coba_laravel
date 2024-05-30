@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <a href="/kategori" class="btn btn-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kategori.perform') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" autofocus autocomplete="off">
                        @error('nama_kategori')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

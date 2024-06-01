@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <a href="/siswa" class="btn btn-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2 class="fw-bold my-auto">Tambah Siswa</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.perform') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nama-siswa" class="form-label">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" autofocus autocomplete="off">
                            @error('nama_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select tom-selected ts-hidden-accessible" name="kelas_siswa"
                                aria-placeholder="Pilih Kelas">
                                <option value="">Pilih Kelas</option>
                                <option value="1">Kelas 10</option>
                                <option value="2">Kelas 11</option>
                                <option value="3">Kelas 12</option>
                            </select>
                            @error('kelas_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="domisili_siswa" class="form-label">Domisili</label>
                            <input type="text" name="domisili_siswa" class="form-control" autocomplete="off">
                            @error('domisili_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

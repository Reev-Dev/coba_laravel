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
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nama-siswa" class="form-label">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" autofocus autocomplete="off"
                                value="{{ $siswa->nama_siswa }}">
                            @error('nama_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select" name="kelas_siswa" aria-placeholder="Pilih Kelas"
                                value="{{ old('kelas_siswa') }}">
                                <option value="10" @if ($siswa->kelas_siswa == 10) selected @endif>Kelas 10</option>
                                <option value="11" @if ($siswa->kelas_siswa == 11) selected @endif>Kelas 11</option>
                                <option value="12" @if ($siswa->kelas_siswa == 12) selected @endif>Kelas 12</option>
                            </select>
                            @error('kelas_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="domisili_siswa" class="form-label">Domisili</label>
                            <input type="text" name="domisili_siswa" class="form-control" autocomplete="off"
                                value="{{ $siswa->domisili_siswa }}">
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
@endsection

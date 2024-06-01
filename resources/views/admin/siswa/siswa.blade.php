@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="mb-4">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th class="w-4">Id</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Domisili</th>
                            <th class="w-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($siswa as $item)
                            <tr>
                                <td>
                                    {{ $i++ }}
                                </td>
                                <td>
                                    {{ $item->nama_siswa }}
                                </td>
                                <td>
                                    {{ $item->kelas_siswa }}
                                </td>
                                <td>
                                    {{ $item->domisili_siswa }}
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('siswa.edit', $item->id) }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                                <form action="{{ route('siswa.delete', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah anda yain ingin menghapus kategori ini?')"
                                                        class="dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

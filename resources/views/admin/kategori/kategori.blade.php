@extends('layouts.app')

{{--  @section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="fw-bold my-auto">Create Category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.perform') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namaJudul" class="form-label">Category</label>
                        <input type="text" name="nama_kategori" class="form-control" id="namaJudul">
                        @error('nama_kategori')
                            <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold my-auto">All of Category</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive small">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($kategori as $item)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>
                                        <form class="d-inline" onsubmit="return confirm('Sure To Delete This Category')"
                                            action="{{ route('kategori.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mb-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="15" height="15"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection  --}}

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="mb-4">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th class="w-4">Id</th>
                                <th>Name</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($kategori as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->nama_kategori }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('kategori.edit', $item->id) }}" class="dropdown-item">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('kategori.delete', $item->id) }}" method="post">
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
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

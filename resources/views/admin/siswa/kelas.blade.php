@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            @session('success')
                <div class="alert alert-important alert-success alert-dismissible position-absolute bottom-0 end-0 me-3"
                    role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endsession
            <div class="mb-4">
                <a href="{{ route('kelas.create') }}" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-report">
                    Tambah Kelas
                </a>
                <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('kelas.perform') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama-kelas" class="form-label">Nama Kelas</label>
                                        <input type="text" name="nama_kelas" class="form-control" autofocus
                                            autocomplete="off" value="{{ old('nama_kelas') }}">
                                        @error('nama_kelas')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary ms-auto" data-bs-dismiss="modal" type="submit">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
                                        Tambah Kelas
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th class="w-4">Id</th>
                                <th>Nama Kelas</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($kelas as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->nama_kelas }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('kelas.edit', $item->id) }}" class="dropdown-item">
                                                        Edit
                                                    </a>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-danger{{$item->id}}">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal modal-blur fade" id="modal-danger{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <form action="{{ route('kelas.delete', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="modal-status bg-danger"></div>
                                                <div class="modal-body text-center py-4">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon mb-2 text-danger icon-lg" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                        <path d="M12 9v4" />
                                                        <path d="M12 17h.01" />
                                                    </svg>
                                                    <h3>Are you sure?</h3>
                                                    <div class="text-muted">Apakah Anda yakin ingin menghapus data ini?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col"><a href="#" class="btn w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Batal
                                                                </a></div>
                                                            <div class="col">
                                                                <button type="submit"
                                                                    class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                                    Hapus
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    @if ($errors->any())
                        var myModal = new bootstrap.Modal(document.getElementById('modal-report'));
                        myModal.show();
                    @endif
                });
            </script>
        </div>
    </div>
@endsection

@section('form-siswa')
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('siswa.perform') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama-siswa" class="form-label">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" autofocus autocomplete="off"
                                value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select tom-selected ts-hidden-accessible" name="kelas_siswa"
                                aria-placeholder="Pilih Kelas">
                                <option value="">Pilih Kelas</option>
                                <option value="10" @if (old('kelas_siswa') == 10) selected @endif>Kelas
                                    10
                                </option>
                                <option value="11" @if (old('kelas_siswa') == 11) selected @endif>Kelas
                                    11
                                </option>
                                <option value="12" @if (old('kelas_siswa') == 12) selected @endif>Kelas
                                    12
                                </option>
                            </select>
                            @error('kelas_siswa')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="domisili_siswa" class="form-label">Domisili</label>
                            <input type="text" name="domisili_siswa" class="form-control" autocomplete="off"
                                value="{{ old('domisili_siswa') }}">
                            @error('domisili_siswa')
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
                            Tambah Siswa
                        </button>
                    </div>
                </form>
            </div>
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
@endsection

@extends('admin.layouts.main')

@section('content-admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end px-2">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <span class="text-muted fw-light">Jadwal</span>
                </li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header align-items-center">
                <h5 class="mb-2">{{ $judul }}</h5>
                {{-- <small class="text-muted">{{ $subJudul }}</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tanggal') border-danger @enderror"
                                    id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}" />
                            </div>
                            @error('tanggal')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="level" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input class="form-control @error('hari') border-danger @enderror" list="datalistOptions"
                                    id="hari" name="hari" value="{{ $jadwal->hari }}" placeholder="Pilih Hari" />
                                <datalist id="datalistOptions">
                                    <option value="Senin"></option>
                                    <option value="Selasa"></option>
                                    <option value="Rabu"></option>
                                    <option value="Kamis"></option>
                                    <option value="Jum'at"></option>
                                    <option value="Sabtu"></option>
                                    <option value="Minggu"></option>
                                </datalist>
                            </div>
                            @error('level')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="waktu">Waktu</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="time" class="form-control @error('waktu') border-danger @enderror"
                                    id="timepicker" name="waktu" value="{{ $jadwal->waktu }}" />
                            </div>
                            @error('waktu')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tempat">Tempat</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control @error('tempat') border-danger @enderror"
                                    id="tempat" name="tempat" value="{{ $jadwal->tempat }}"
                                    placeholder="Masukkan Tempat" />
                            </div>
                            @error('tempat')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <a href="/admin/jadwal">
                                <button type="button" class="btn btn-sm btn-secondary px-3">Kembali
                                </button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary px-3">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

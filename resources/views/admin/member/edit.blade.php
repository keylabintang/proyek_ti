@extends('admin.layouts.main')

@section('content-admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end px-2">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <span class="text-muted fw-light">Member</span>
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
                <form action="{{ route('member.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" class="form-control @error('nama') border-danger @enderror"
                                    id="nama" name="nama" value="{{ $member->nama }}" />
                            </div>
                            @error('nama')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control @error('tempat_lahir') border-danger @enderror"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ $member->tempat_lahir }}" />
                            </div>
                            @error('tempat_lahir')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tanggal_lahir') border-danger @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ $member->tanggal_lahir }}" />
                            </div>
                            @error('tanggal_lahir')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control @error('alamat') border-danger @enderror"
                                    id="alamat" name="alamat" value="{{ $member->alamat }}" />
                            </div>
                            @error('alamat')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="sekolah">Sekolah</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control @error('sekolah') border-danger @enderror"
                                    id="sekolah" name="sekolah" value="{{ $member->sekolah }}" />
                            </div>
                            @error('sekolah')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="wa_ortu">Nomor Ortu</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control @error('wa_ortu') border-danger @enderror"
                                    id="wa_ortu" name="wa_ortu" value="{{ $member->wa_ortu }}" />
                            </div>
                            @error('wa_ortu')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="umur">Umur</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control @error('umur') border-danger @enderror"
                                    id="umur" name="umur" value="{{ $member->umur }}"
                                    placeholder="Masukkan Umur" />
                            </div>
                            @error('umur')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input class="form-control @error('level') border-danger @enderror" list="datalistOptions"
                                    id="level" name="level" value="{{ $member->level }}"
                                    placeholder="Pilih Level" />
                                <datalist id="datalistOptions">
                                    <option value="Warrior"></option>
                                    <option value="Elite"></option>
                                    <option value="Speed"></option>
                                    <option value="Freestyle"></option>
                                </datalist>
                            </div>
                            @error('level')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <a href="/admin/member">
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

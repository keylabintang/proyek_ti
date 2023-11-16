@extends('admin.layouts.main')

@section('content-admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <span class="text-muted fw-light">{{ $judul }}</span>
                </li>
                <li class="breadcrumb-item active">{{ $judul }}</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header align-items-center">
                <h5 class="mb-2">{{ $judul }}</h5>
                {{-- <small class="text-muted">{{ $subJudul }}</small> --}}
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('admin.member.store') }}" method="POST"> --}}
                <form action="/admin/biaya" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="level" class="col-sm-2 col-form-label">Jadwal</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input class="form-control @error('jadwal') border-danger @enderror" list="datalistOptions"
                                    id="jadwal" name="jadwal" value="{{ old('jadwal') }}" placeholder="Pilih Jadwal" />
                                <datalist id="datalistOptions">
                                    @foreach ($jadwal as $jdl)
                                        <option value="{{ \Carbon\Carbon::parse($jdl->tanggal)->format('d-m-Y') }}">
                                        </option>
                                    @endforeach

                                </datalist>
                            </div>
                            @error('keterangan')
                                <div class="form-text text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <table id="example" class="table table-striped py-3" style="wimmrh: 100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $mmr)
                                <tr>
                                    <td>{{ $loop->index + 1 }}. </td>
                                    <td>{{ $mmr->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mmr->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control @error('keterangan') border-danger @enderror"
                                                list="datalistOptio" id="keterangan" name="keterangan"
                                                value="{{ old('keterangan') }}" placeholder="Pilih Jadwal" />
                                            <datalist id="datalistOptio">
                                                <option value="Hadir"></option>
                                                <option value="Izin"></option>
                                                <option value="Sakit"></option>
                                            </datalist>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <a href="/admin/biaya">
                                <button type="button" class="btn btn-sm btn-secondary px-3">Kembali
                                </button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary px-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

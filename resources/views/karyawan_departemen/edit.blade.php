@extends('layout')
<title>Edit Karyawan Departemen</title>
@section('content')
    <div class="container mt-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Data Karyawan_Departemen</h5>
                <hr class="my-4">

                @if ($karyawanDepartemen)
                    <form action="{{ url('/karyawan/departemen/update', ['id' => $karyawanDepartemen->Kode]) }}"
                        method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="NIP" name="NIP" required>
                                    @foreach ($karyawanList as $karyawan)
                                        <option value="{{ $karyawan->NIP }}"
                                            {{ $karyawan->NIP == $karyawanDepartemen->NIP ? 'selected' : '' }}>
                                            {{ $karyawan->NIP }} - {{ $karyawan->Nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Id_Departemen" class="col-sm-3 col-form-label">Id_Departemen</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="Id_Departemen" name="Id_Departemen" required>
                                    @foreach ($departemenList as $departemen)
                                        <option value="{{ $departemen->Id_Departemen }}"
                                            {{ $departemen->Id_Departemen == $karyawanDepartemen->Id_Departemen ? 'selected' : '' }}>
                                            {{ $departemen->Id_Departemen }} - {{ $departemen->Nama_departemen }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            <i class="bi bi-arrow-up-right"></i> Update Karyawan Departemen
                        </button>
                        <a href="/karyawan/departemen" class="btn btn-secondary btn-block mt-4">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </form>
                @else
                    <p>Data not found</p>
                @endif
            </div>
        </div>
    </div>

@endsection

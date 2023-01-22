@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Tambah Data Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Registrasi</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Ban</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('simpanban') }}" method="POST">
                                    @csrf
                                    <label @error('no_seri_ban') class="text-danger" @enderror>No Seri Ban
                                        @error('no_seri_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="No Seri" name="no_seri_ban">
                                    </div>

                                    <label @error('nama_ban') class="text-danger" @enderror>Merk Ban
                                        @error('nama_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-circle"></i></span>
                                        </div>
                                        <select name="nama_ban" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($merk as $data)
                                                <option value="{{ $data->merk_ban_id }}">
                                                    {{ $data->merk_ban_nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label @error('id_type') class="text-danger" @enderror>Type Ban
                                        @error('id_type')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                        </div>
                                        <select name="id_type" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($type as $data)
                                                <option value="{{ $data->id_type }}">{{ $data->nama_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <label @error('kondisi') class="text-danger" @enderror>Kondisi Ban
                                        @error('kondisi')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info"></i></span>
                                        </div>
                                        <select name="id_kondisi" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($kondisi as $data)
                                                <option value="{{ $data->id_kondisi }}">{{ $data->kondisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ route('ban') }}" class="btn btn-rounded btn-secondary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

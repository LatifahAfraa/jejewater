@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Tambah Data Sopir')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Sopir</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Sopir</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('simpansopir') }}" method="POST">
                                    @csrf
                                    <label @error('nama_supir') class="text-danger" @enderror>Nama Sopir
                                        @error('nama_supir')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Sopir"
                                            name="nama_supir">
                                    </div>

                                    <label @error('no_ktp') class="text-danger" @enderror>No KTP
                                        @error('no_ktp')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="No KTP" name="no_ktp">
                                    </div>

                                    <label @error('no_sim') class="text-danger" @enderror>No SIM
                                        @error('no_sim')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="No SIM" name="no_sim">
                                    </div>

                                    <label @error('no_hp') class="text-danger" @enderror>No HP
                                        @error('no_hp')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="No HP" name="no_hp">
                                    </div>

                                    <label @error('alamat') class="text-danger" @enderror>Alamat
                                        @error('alamat')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                        </div>
                                        <textarea class="form-control" style="height: 94px;" name="alamat"></textarea>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ route('sopir') }}" class="btn btn-rounded btn-secondary">Kembali</a>
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

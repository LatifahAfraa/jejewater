@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Tambah Data Type Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Type Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Type Ban</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('simpantype') }}" method="POST">
                                    @csrf
                                    <label @error('type_ban') class="text-danger" @enderror>Type Ban
                                        @error('type_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Type Ban" name="nama_type">
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ route('type') }}" class="btn btn-rounded btn-secondary">Kembali</a>
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

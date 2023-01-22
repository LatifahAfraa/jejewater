@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Edit Data Merk Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Data Merk Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Merk Ban</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/admin/merk-ban/{{ $edit->merk_ban_id }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <label @error('merk_ban') class="text-danger" @enderror>
                                        Merk Ban
                                        @error('merk_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Merk Ban" name="merk_ban"
                                            value="{{ $edit->merk_ban_nama }}">
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ url('admin/merk-ban') }}" class="btn btn-rounded btn-secondary">
                                            Kembali
                                        </a>
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

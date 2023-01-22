@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Tambah Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('storeban', $kendaraan->id_kendaraan) }}" method="POST">
                                    @csrf
                                    <label @error('id_mobil') class="text-danger" @enderror>Mobil
                                        @error('id_mobil')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-truck"></i></span>
                                        </div>
                                        <input type="text" value="{{ $kendaraan->nama_mobil }}" readonly
                                            class="form-control">
                                    </div>

                                    <label @error('id_supir') class="text-danger" @enderror>Supir
                                        @error('id_supir')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" value="{{ $kendaraan->nama_supir }}" readonly
                                            class="form-control">
                                    </div>

                                    <label @error('id_ban') class="text-danger" @enderror>Pilih Ban
                                        @error('id_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-circle"></i></span>
                                        </div>
                                        <select name="id_ban" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($ban as $data)
                                                <option value="{{ $data->id_ban }}">{{ $data->nama_ban }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label @error('tgl') class="text-danger" @enderror>Tanggal Pemasangan Ban
                                        @error('tgl')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-circle"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="tgl">
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ route('viewban') }}" class="btn btn-rounded btn-secondary">Kembali</a>
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

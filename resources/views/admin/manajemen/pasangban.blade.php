@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Pasang Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pasang Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pasang Ban - {{ $ban->no_seri_ban }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('pasang', $ban->id_ban) }}" method="POST">
                                    @csrf

                                    <label @error('id_ban') class="text-danger" @enderror>Id Ban
                                        @error('id_ban')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                        </div>
                                        <input type="text" name="id_ban" class="form-control"
                                            placeholder="{{ $ban->no_seri_ban }}" value="{{ $ban->id_ban }}" readonly>
                                    </div>
                                    <label @error('id_mobil') class="text-danger" @enderror>Mobil
                                        @error('id_mobil')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                        </div>
                                        <select name="id_mobil" class="form-control">
                                            <option value="">Pilih Mobil</option>
                                            @foreach ($mobil as $data)
                                                <option value="{{ $data->id_mobil }}">{{ $data->nama_mobil }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label @error('id_supir') class="text-danger" @enderror>Supir
                                        @error('id_supir')
                                            {{ $message }}
                                        @enderror
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info"></i></span>
                                        </div>
                                        <select name="id_supir" class="form-control">
                                            <option value="">Pilih Supir</option>
                                            @foreach ($sopir as $data)
                                                <option value="{{ $data->id_supir }}">{{ $data->nama_supir }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">Simpan</button>
                                        <a href="{{ route('home') }}" class="btn btn-rounded btn-secondary">Kembali</a>
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

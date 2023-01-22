@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Data Mobil')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Mobil</a></li>
                </ol>
            </div>
            <x-alert />
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Mobil</h4>
                            <a href="{{ route('tambahmobil') }}" class="btn btn-rounded btn-info">
                                <span class="btn-icon-left text-info">
                                    <i class="fa fa-plus color-info"></i>
                                </span>
                                Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Polisi</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Nama Pemilik</th>
                                            <th>Tahun</th>
                                            <th>Pajak</th>
                                            <th>STNK</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mobil as $no => $data)
                                            <tr>
                                                <td width="3%">{{ $no + 1 }}</td>
                                                <td>{{ $data->no_polisi }}</td>
                                                <td>{{ $data->jenis_kendaraan }}</td>
                                                <td>{{ $data->nama_pemilik }}</td>
                                                <td>{{ $data->tahun_pembuatan }}</td>
                                                <td>{{ TanggalIndo($data->pajak) }}</td>
                                                <td>{{ TanggalIndo($data->stnk) }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                                <td width="10%">
                                                    <div class="d-flex">
                                                        <a href="{{ route('editmobil', $data->id_mobil) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <x-delete id="{{ $data->id_mobil }}"
                                                            action="{{ route('hapusmobil', $data->id_mobil) }}" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

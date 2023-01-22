@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Manajemen Kendaraan')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Registrasi Mobil</a></li>
                </ol>
            </div>
            <x-alert />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Registrasi Mobil</h4>
                            <a href="{{ route('tambahkendaraan') }}" class="btn btn-rounded btn-info">
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
                                            <th>Nama Sopir</th>
                                            <th>No SIM</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kendaraan as $no => $data)
                                            <tr>
                                                <td class="text-center">{{ $no + 1 }}</td>
                                                <td>{{ $data->no_polisi }}</td>
                                                <td>{{ $data->jenis_kendaraan }}</td>
                                                <td>{{ $data->nama_supir }}</td>
                                                <td>{{ $data->no_sim }}</td>
                                                <td class="text-center" width="10%">
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <x-delete id="{{ $data->id_kendaraan }}"
                                                            action="{{ route('hapuskendaraan', $data->id_kendaraan) }}" />
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

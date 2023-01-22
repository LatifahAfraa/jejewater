@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Data Sopir')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Sopir</a></li>
                </ol>
            </div>
            <x-alert />
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Sopir</h4>
                            <a href="{{ route('tambahsopir') }}" class="btn btn-rounded btn-info"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                </span>Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sopir</th>
                                            <th>No KTP</th>
                                            <th>No SIM</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sopir as $no => $data)
                                            <tr>
                                                <td width="3%">{{ $no + 1 }}</td>
                                                <td>{{ $data->nama_supir }}</td>
                                                <td>{{ $data->no_ktp }}</td>
                                                <td>{{ $data->no_sim }}</td>
                                                <td>{{ $data->no_hp }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td width="10%">
                                                    <div class="d-flex">
                                                        <a href="{{ route('editsopir', $data->id_supir) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <x-delete id="{{ $data->id_supir }}"
                                                            action="{{ route('hapussopir', $data->id_supir) }}" />
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

@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Data Type Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Type Ban</a></li>
                </ol>
            </div>
            <x-alert />
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Type Ban</h4>
                            <a href="{{ route('tambahtype') }}" class="btn btn-rounded btn-info"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                </span>Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Type Ban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($type as $no => $data)
                                            <tr>
                                                <td width="5%">{{ $no + 1 }}</td>
                                                <td>{{ $data->nama_type }}</td>
                                                <td width="10%">
                                                    <div class="d-flex">
                                                        <a href="{{ route('edittype', $data->id_type) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <x-delete id="{{ $data->id_type }}"
                                                            action="{{ route('deletetype', $data->id_type) }}" />
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

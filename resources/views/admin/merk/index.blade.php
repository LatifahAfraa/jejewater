@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Data Merk Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Merk Ban</a></li>
                </ol>
            </div>
            <x-alert />
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Merk Ban</h4>
                            <a href="/admin/merk-ban/create" class="btn btn-rounded btn-info">
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
                                            <th>Merk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $no => $a)
                                            <tr>
                                                <td width="5%">{{ $no + 1 }}</td>
                                                <td>{{ $a->merk_ban_nama }}</td>
                                                <td width="10%">
                                                    <div class="d-flex">
                                                        <a href="/admin/merk-ban/{{ $a->merk_ban_id }}/edit"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <x-delete id="{{ $a->merk_ban_id }}"
                                                            action="/admin/merk-ban/{{ $a->merk_ban_id }}" />
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

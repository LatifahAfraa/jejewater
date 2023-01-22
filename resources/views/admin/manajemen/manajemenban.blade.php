@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Manajemen Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Manajemen Ban</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body px-4 py-3 py-md-2">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-7">
                                    <ul class="nav nav-pills review-tab">
                                        <li class="nav-item">
                                            <a href="#navpills-1" class="nav-link active px-2 px-lg-3" data-toggle="tab"
                                                aria-expanded="false">Manajemen Ban</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-2" class="nav-link px-2 px-lg-3" data-toggle="tab"
                                                aria-expanded="false">Status Ban</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-3" class="nav-link px-2 px-lg-3" data-toggle="tab"
                                                aria-expanded="true">Kondisi Ban</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="tab-content">
                        <div id="navpills-1" class="tab-pane active">
                            <div class="table-responsive table-hover fs-14">
                                <table class="table display mb-4  fs-14 table-bordered" id="example5">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Polisi</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Nama Sopir</th>
                                            <th>No SIM</th>
                                            {{-- <th>No Seri Ban</th> --}}
                                            {{-- <th>Ban</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ban as $no => $data)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $data->no_polisi }}</td>
                                                <td>{{ $data->jenis_kendaraan }}</td>
                                                <td>{{ $data->nama_supir }}</td>
                                                <td>{{ $data->no_sim }}</td>
                                                {{-- <td>{{ $data->no_seri_ban }}</td> --}}
                                                {{-- <td>{{ $data->merk_ban_nama }}</td> --}}
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div id="navpills-2" class="tab-pane">
                            <div class="table-responsive table-hover fs-14">
                                <table class="table display mb-4  fs-14" id="example4">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>No Seri Ban</th>
                                            <th>Merk Ban</th>
                                            <th>Type Ban</th>
                                            <th>Status Ban</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($status as $no => $data)
                                            <tr>
                                                <th>{{ $no + 1 }}</th>
                                                <td>{{ $data->no_seri_ban }}</td>
                                                <td>{{ $data->merk_ban_nama }}</td>
                                                <td>{{ $data->nama_type }}</td>
                                                <td>{{ $data->status }}</td>

                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div id="navpills-3" class="tab-pane">
                            <div class="table-responsive table-hover fs-14">
                                <table class="table display mb-4  fs-14" id="example3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Seri Ban</th>
                                            <th>Merk Ban</th>
                                            <th>Type Ban</th>
                                            <th>Kondisi Ban</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kondisi as $no => $data)
                                            <tr>
                                                <th>{{ $no + 1 }}</th>
                                                <td>{{ $data->no_seri_ban }}</td>
                                                <td>{{ $data->merk_ban_nama }}</td>
                                                <td>{{ $data->nama_type }}</td>
                                                <td>{{ $data->kondisi }}</td>
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

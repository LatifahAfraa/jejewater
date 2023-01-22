@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Pengembalian Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ban</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengembalian</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Pengembalian Ban</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>BA Mobil</th>
                                            <th>Sopir</th>
                                            <th>Baru</th>
                                            <th>Vulkanisir</th>
                                            <th>Km</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $no => $a)
                                            @if ($a->tgl_kembali != null)
                                                <tr>
                                                    <th width="3%" class="text-center">{{ $no + 1 }}</th>
                                                    <td>{{ TanggalIndo($a->tgl_kembali) }}</td>
                                                    <td>{{ $a->no_polisi }}</td>
                                                    <td>{{ $a->nama_supir }}</td>
                                                    <td>{{ $a->kondisi_kembali == 1 ? $a->no_seri_ban : '' }}</td>
                                                    <td>{{ $a->kondisi_kembali != 1 ? $a->no_seri_ban : '' }}</td>
                                                    <td>{{ $a->km_kembali }}</td>
                                                    <td>{{ $a->keterangan_kembali }}</td>
                                                </tr>
                                            @endif
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
@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table-datatables').DataTable();
        });
    </script>
@endpush

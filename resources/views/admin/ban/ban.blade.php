@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Data Ban')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Registrasi</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Ban</a></li>
                </ol>
            </div>
            <x-alert />
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Ban</h4>
                            <a href="{{ route('tambahban') }}" class="btn btn-rounded btn-info"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                </span>Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Seri Ban</th>
                                            <th>Merk Ban</th>
                                            <th>Type Ban</th>
                                            <th>Status Ban</th>
                                            <th>Kondisi Ban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ban as $no => $data)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $data->no_seri_ban }}</td>
                                                <td>{{ $data->merk_ban_nama }}</td>
                                                <td>{{ $data->nama_type }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td>{{ $data->kondisi }}</td>
                                                <td width="5%" class="text-center">
                                                    <x-delete id="{{ $data->id_ban }}"
                                                        action="{{ route('deleteban', $data->id_ban) }}" />
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
@push('page-scripts')
    <script src="{{ asset('base/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
@endpush
@push('after-scripts')
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Yakin hapus data?' + id,
                    text: 'Data yang dihapus tidak bisa dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Data berhasil dihapus', {
                            icon: 'success',
                        });
                        $(`#delete${id}`).submit();
                    } else {
                        swal('Data batal dihapus');
                    }
                });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endpush

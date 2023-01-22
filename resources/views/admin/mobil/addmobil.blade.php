@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Tambah Data Mobil')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('base/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/pickadate/themes/default.date.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <!-- Custom Stylesheet -->
    {{-- <link href="{{ asset('base/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Mobil</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Mobil</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('simpanmobil') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>No Polisi</label>
                                            <span class="text-danger">*</span>
                                            <input name="no_polisi" type="text"
                                                class="form-control @error('no_polisi') is-invalid @enderror"
                                                placeholder="No Polisi" value="{{ old('no_polisi') }}">
                                            @error('no_polisi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>Jenis Kendaraan</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="jenis_kendaraan"
                                                class="form-control @error('jenis_kendaraan') is-invalid @enderror"
                                                placeholder="Jenis Kendaraan" value="{{ old('jenis_kendaraan') }}">
                                            @error('jenis_kendaraan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group col-sm-12 col-md-6">
                                            <label>Jenis Mobil</label>
                                            <span class="text-danger">*</span>
                                            <select name="jenis_mobil" id="jenis_mobil"
                                                class="form-control @error('jenis_mobil') is-invalid @enderror">
                                                <option value="">Pilih Jenis Mobil</option>
                                                @foreach ($jenis as $jenis_id => $jenis_nama)
                                                    <option value="{{ $jenis_id }}"
                                                        {{ old('jenis_mobil') == $jenis_id ? 'selected' : '' }}>
                                                        {{ $jenis_nama }}
                                                    </option>
                                                @endforeach
                                                @error('jenis_mobil')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div> --}}
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>a/n Pemilik</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="nama_pemilik"
                                                class="form-control @error('nama_pemilik') is-invalid @enderror"
                                                placeholder="Nama Pemilik" value="{{ old('nama_pemilik') }}">
                                            @error('nama_pemilik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>Tahun Pembuatan</label>
                                            <span class="text-danger">*</span>
                                            <input name="tahun_pembuatan" type="number" min="1980"
                                                max="{{ date('Y') }}"
                                                class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                                                placeholder="Tahun Pembuatan" value="{{ old('tahun_pembuatan') }}">
                                            @error('tahun_pembuatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>Pajak</label>
                                            <span class="text-danger">*</span>
                                            <input name="pajak" type="date"
                                                class="form-control @error('pajak') is-invalid @enderror" id="pajak"
                                                value="{{ old('pajak') }}">
                                            {{-- <input name="pajak" class="datepicker-default form-control" id="pajak"
                                                value="{{ old('pajak') ? old('pajak') : TanggalEng($date) }}"> --}}
                                            @error('pajak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label>STNK</label>
                                            <span class="text-danger">*</span>
                                            <input name="stnk" type="date"
                                                class="form-control @error('stnk') is-invalid @enderror" id="stnk"
                                                value="{{ old('stnk') }}">
                                            {{-- <input name="stnk" class="datepicker-default form-control" id="stnk"
                                                value="{{ old('stnk') ? old('stnk') : TanggalEng($date) }}"> --}}
                                            @error('stnk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label>Keterangan</label>
                                            <input name="keterangan"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                value="{{ old('keterangan') }}" placeholder="Keterangan">
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="blockquote-footer mt-2">
                                        <span class="text-danger">
                                            <b>NB:</b>
                                            *) Wajib diisi
                                        </span>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" type="submit"
                                            id="toastr-success-top-right">
                                            Simpan
                                        </button>
                                        <a href="{{ route('mobil') }}" class="btn btn-rounded btn-secondary">
                                            Kembali
                                        </a>
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
@push('page-scripts')
    <!-- pickdate -->
    {{-- <script src="{{ asset('base/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('base/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('base/vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('base/js/plugins-init/pickadate-init.js') }}"></script> --}}
@endpush
{{-- @push('after-scripts')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $(document).ready(function() {
            $('#jenis_mobil').select2();
        });
    </script>
@endpush --}}

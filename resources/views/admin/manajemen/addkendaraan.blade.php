@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Manajemen Kendaraan')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Manajemen Kendaraan</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('simpankendaraan') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Mobil</label>
                                            <span class="text-danger">*</span>
                                            <select name="mobil" id="mobil"
                                                class="form-control @error('mobil') is-invalid @enderror">
                                                <option value="">Pilih Mobil</option>
                                                @foreach ($mobil as $a)
                                                    <option value="{{ $a->id_mobil }}"
                                                        {{ old('mobil') == $a->id_mobil ? 'selected' : '' }}>
                                                        {{ $a->no_polisi }} - {{ $a->jenis_kendaraan }}
                                                    </option>
                                                @endforeach
                                                @error('mobil')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Sopir</label>
                                            <span class="text-danger">*</span>
                                            <select name="sopir" id="sopir"
                                                class="form-control @error('sopir') is-invalid @enderror">
                                                <option value="">Pilih Sopir</option>
                                                @foreach ($supir as $id_supir => $nama_supir)
                                                    <option value="{{ $id_supir }}"
                                                        {{ old('sopir') == $id_supir ? 'selected' : '' }}>
                                                        {{ $nama_supir }}
                                                    </option>
                                                @endforeach
                                                @error('sopir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-rounded btn-primary" id="toastr-success-top-right"
                                            type="submit">
                                            Simpan
                                        </button>
                                        <a href="{{ route('kendaraan') }}" class="btn btn-rounded btn-secondary">
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

@push('after-scripts')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $(document).ready(function() {
            $('#mobil').select2();
            $('#sopir').select2();
        });
    </script>
@endpush

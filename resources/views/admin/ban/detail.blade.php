@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Detail Ban')
@section('content')
    <style>
        .table-responsive-sm {
            min-width: 0rem !important;
        }

        .line-br {
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 15px;
        }

        .bagidua {
            width: 50%;
        }
    </style>
    <div class="content-body mt-3">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                        <span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                        <span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
            @endif


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $data->type->nama_type }} - {{ $data->no_seri_ban }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="DZ_W_Todo1" class="widget-media">
                                <ul class="timeline">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 line-br mb-3">
                                                <div class="row">
                                                    {{-- <div class="col-sm-6 col-md-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-info">
                                                                TP
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Tipe</h5>
                                                                <small class="d-block">{{ $data->type->nama_type }}</small>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-sm-6 col-md-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-info">
                                                                ST
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Status</h5>
                                                                <small class="d-block">{{ $data->status->status }}</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-info">
                                                                KN
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Kondisi</h5>
                                                                <small class="d-block">{{ $data->kondisi->kondisi }}</small>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    @if ($pemasangan != null)
                                                        <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                            <div class="timeline-panel">
                                                                <div class="media mr-2 media-info">
                                                                    TP
                                                                </div>
                                                                <div class="media-body">
                                                                    <h5 class="mb-1">Tgl Pasang</h5>
                                                                    <small
                                                                        class="d-block">{{ TanggalIndo($pemasangan->tgl_ambil) }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                            <div class="timeline-panel">
                                                                <div class="media mr-2 media-info">
                                                                    KM
                                                                </div>
                                                                <div class="media-body">
                                                                    <h5 class="mb-1">KM</h5>
                                                                    <small class="d-block">{{ $pemasangan->km_ambil }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-12 line-br mb-3">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-success">
                                                                NP
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">No Polisi</h5>
                                                                <small
                                                                    class="d-block">{{ $pemasangan != null ? $pemasangan->no_polisi : 'Belum Tersedia' }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-success">
                                                                NM
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Kendaraan</h5>
                                                                <small
                                                                    class="d-block">{{ $pemasangan != null ? $pemasangan->jenis_kendaraan : 'Belum Tersedia' }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-success">
                                                                NS
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Sopir</h5>
                                                                <small
                                                                    class="d-block">{{ $pemasangan != null ? $pemasangan->nama_supir : 'Belum Tersedia' }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6 bagidua mb-3">
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2 media-success">
                                                                TP
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1">Tahun</h5>
                                                                <small
                                                                    class="d-block">{{ $pemasangan != null ? $pemasangan->tahun_pembuatan : 'Belum Tersedia' }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                @if ($pemasangan != null)
                                                    <x-addmodal color="warning" id="copot" name="Pengembalian Ban" />
                                                    <a href="{{ route('home') }}" class="btn btn-info">Kembali</a>
                                                @else
                                                    <x-addmodal color="primary" id="pasang" name="Pengambilan Ban" />
                                                    <a href="{{ route('home') }}" class="btn btn-info">Kembali</a>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pasang -->
    <div class="modal" id="modalpasang" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pengambilan Ban</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ url('pasang-ban') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="idban" value="{{ $data->id_ban }}">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <span class="text-danger">*</span>
                            <input name="tanggal" type="date"
                                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobil">Mobil</label>
                            <span class="text-danger">*</span>
                            <select class="select2-single form-control @error('mobil') is-invalid @enderror"
                                name="mobil" id="mobil">
                                <option value="">Pilih Mobil</option>
                                @foreach ($pasang as $a)
                                    <option value="{{ $a->id_kendaraan }}"
                                        {{ old('mobil') == $a->id_mobil ? 'selected' : '' }}>
                                        {{ $a->no_polisi }} - {{ $a->jenis_kendaraan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mobil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>KM</label>
                            <span class="text-danger">*</span>
                            <input name="km" type="text" class="form-control @error('km') is-invalid @enderror"
                                value="{{ old('km') }}" placeholder="KM Saat Pemasangan">
                            @error('km')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <span class="text-danger">*</span>
                            <input name="keterangan" type="text"
                                class="form-control @error('keterangan') is-invalid @enderror"
                                value="{{ old('keterangan') }}" placeholder="Keterangan">
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Copot -->
    <div class="modal" id="modalcopot" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pengembalian Ban</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ url('copot-ban') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="idban" value="{{ $data->id_ban }}">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <span class="text-danger">*</span>
                            <input name="tanggal" type="date"
                                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>KM</label>
                            <span class="text-danger">*</span>
                            <input name="km" type="text" class="form-control @error('km') is-invalid @enderror"
                                value="{{ old('km') }}" placeholder="KM Saat Pengembalian">
                            @error('km')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jarak</label>
                            <span class="text-danger">*</span>
                            <input name="jarak" type="text"
                                class="form-control @error('jarak') is-invalid @enderror" value="{{ old('jarak') }}"
                                placeholder="Jarak KM">
                            @error('jarak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <span class="text-danger">*</span>
                            <select class="select2-single form-control @error('kondisi') is-invalid @enderror"
                                name="kondisi" id="kondisi" autofocus>
                                <option value="">Pilih Kondisi</option>
                                @foreach ($copot as $id_kondisi => $kondisi)
                                    <option value="{{ $id_kondisi }}"
                                        {{ old('kondisi') == $id_kondisi ? 'selected' : '' }}>
                                        {{ $kondisi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mobil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <span class="text-danger">*</span>
                            <input name="keterangan" type="text"
                                class="form-control @error('keterangan') is-invalid @enderror"
                                value="{{ old('keterangan') }}" placeholder="Keterangan">
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $('#mobil').select2({
            dropdownParent: $('#modalpasang')
        });
        $('#kondisi').select2({
            dropdownParent: $('#modalcopot')
        });
    </script>
@endsection

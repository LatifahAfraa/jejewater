@extends('template.master')
@section('title', 'PT. Indomex Dwijaya Lestari - Home')
@section('content')
    <style>
        .table-responsive-sm {
            min-width: 0rem !important;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
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
                <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group mb-3 input-primary-o">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                        <input type="search" name="search" id="search" class="form-control"
                                            placeholder="Search Here" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th><strong>No Seri Ban</strong></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="alldata">
                                                @foreach ($data as $no => $a)
                                                    <tr>
                                                        <td class="font-weight-bold">
                                                            <div class="media-body">
                                                                <h5 class="mb-1">
                                                                    <a class="text-black"
                                                                        href="{{ url('/ban/detail/' . $a->id_ban) }}">
                                                                        {{ $a->nama_type }} [{{ $a->no_seri_ban }}]
                                                                    </a>
                                                                </h5>
                                                                <p class="d-block mb-0">
                                                                    <i class="fa fa-truck ml-1"></i>
                                                                    <a href="{{ url('/ban/detail/' . $a->id_ban) }}">
                                                                        {{ $a->status }}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="text-center" width="5%">
                                                            <div class="dropdown ml-auto text-right">
                                                                <a href="{{ url('/ban/detail/' . $a->id_ban) }}">
                                                                    <div class="btn-link">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px"
                                                                            viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                                fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0"
                                                                                    width="24" height="24">
                                                                                </rect>
                                                                                <circle fill="#000000" cx="12"
                                                                                    cy="5" r="2">
                                                                                </circle>
                                                                                <circle fill="#000000" cx="12"
                                                                                    cy="12" r="2">
                                                                                </circle>
                                                                                <circle fill="#000000" cx="12"
                                                                                    cy="19" r="2">
                                                                                </circle>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody id="content" class="searchdata"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                                    fill="white" fill-opacity="0.18">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                                    fill="#2130B8">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">Baru</p>
                                            <h3 class="mb-0 text-black font-w600">
                                                {{ $baru != null ? $baru : 0 }} Ban
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                                    fill="white" fill-opacity="0.18">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                                    fill="#2130B8">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">Vulkanisir 1</p>
                                            <h3 class="mb-0 text-black font-w600">
                                                {{ $v1 != null ? $v1 : 0 }} Ban
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                                    fill="white" fill-opacity="0.18">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                                    fill="#2130B8">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">Vulkanisir 2</p>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0 mr-3 text-black font-w600">
                                                    {{ $v2 != null ? $v2 : 0 }} Ban
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                                    fill="white" fill-opacity="0.18">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                                    fill="#2130B8">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">Other</p>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0 mr-3 text-black font-w600">
                                                    {{ $other != null ? $other : 0 }} Ban
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Baru Terpakai</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $baruP != null ? $baruP : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Vulkanisir 1 Terpakai</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $v1P != null ? $v1P : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Vulkanisir 2 Terpakai</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $v2P != null ? $v2P : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Other Terpakai</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $otherP != null ? $otherP : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Baru Tersedia</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $baruS != null ? $baruS : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Vulkanisir 1 Tersedia</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $v1S != null ? $v1S : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Vulkanisir 2 Tersedia</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $v2S != null ? $v2S : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-3">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Other Tersedia</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $otherS != null ? $otherS : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Total Ban</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $total != null ? $total : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Terpakai</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $terpakai != null ? $terpakai : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <svg class="primary-icon" width="51" height="52" viewBox="0 0 51 52"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.5 43C34.8888 43 42.5 35.3888 42.5 26C42.5 16.6112 34.8888 9 25.5 9C16.1112 9 8.5 16.6112 8.5 26C8.5 35.3888 16.1112 43 25.5 43ZM25.5 51.5C39.5833 51.5 51 40.0833 51 26C51 11.9167 39.5833 0.5 25.5 0.5C11.4167 0.5 0 11.9167 0 26C0 40.0833 11.4167 51.5 25.5 51.5Z"
                                            fill="white" fill-opacity="0.18">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.9997 1.95836C31.2809 0.997147 28.4073 0.5 25.4997 0.5V8.86605C28.5687 8.86605 31.5815 9.6904 34.223 11.253C36.8645 12.8155 39.0379 15.0589 40.5159 17.7486C41.9939 20.4384 42.7223 23.4757 42.625 26.5433C42.5277 29.6108 41.6082 32.5959 39.9627 35.1866C38.3172 37.7772 36.006 39.8783 33.2707 41.2703C30.5355 42.6623 27.4766 43.294 24.4136 43.0995C21.3507 42.905 18.3963 41.8913 15.8591 40.1645C13.3219 38.4376 11.2952 36.061 9.99062 33.283L2.41797 36.8391C3.65388 39.4709 5.32535 41.8607 7.35106 43.9131C8.50759 45.0848 9.77958 46.1466 11.1519 47.0806C14.9279 49.6506 19.3249 51.1592 23.8834 51.4487C28.4418 51.7382 32.9943 50.798 37.0652 48.7264C41.136 46.6548 44.5756 43.5277 47.0246 39.6721C49.4736 35.8165 50.842 31.3739 50.9868 26.8085C51.1317 22.2432 50.0476 17.7228 47.8479 13.7197C45.6482 9.71663 42.4137 6.37787 38.4824 4.05236C37.0536 3.2072 35.5519 2.50715 33.9997 1.95836Z"
                                            fill="#2130B8">
                                        </path>
                                    </svg>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Tersedia</p>
                                    <div class="d-flex align-items-center">
                                        <h3 class="mb-0 mr-3 text-black font-w600">
                                            {{ $tersedia != null ? $tersedia : 0 }} Ban
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
@push('page-scripts')
    <script src="{{ asset('base/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('base/js/plugins-init/datatables.init.js') }}"></script>
@endpush
@push('after-scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }
            $.ajax({
                type: 'GET',
                url: '{{ url('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#content').html(data);
                }
            })
        });
    </script>
@endpush

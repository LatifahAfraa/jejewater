<div class="nav-header">
    <a href="#" class="brand-logo">
        <img src="{{ asset('assets/img/logo1.png') }}" class="logo-abbr" alt="Image Not Found" style="max-width:100%">
        {{-- <svg class="logo-abbr" width="48" height="36" viewBox="0 0 48 36" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path class="svg-logo-path"
                d="M18.281 14.25C18.281 13.2145 19.1204 12.375 20.156 12.375H35.3438C36.3794 12.375 37.2188 13.2145 37.2188 14.25C37.2188 15.2856 36.3794 16.125 35.3438 16.125H20.156C19.1204 16.125 18.281 15.2856 18.281 14.25ZM44.25 14.25C44.25 15.2839 45.0911 16.125 46.125 16.125C47.1606 16.125 48 16.9645 48 18V26.2461C48 27.2817 47.1606 28.1211 46.125 28.1211H32.2766L25.3258 35.072C24.5935 35.8043 23.4063 35.8041 22.6742 35.072L15.7234 28.1211H1.875C0.839437 28.1211 0 27.2817 0 26.2461V18C0 16.9645 0.839437 16.125 1.875 16.125C2.90887 16.125 3.75 15.2839 3.75 14.25C3.75 13.2162 2.90887 12.375 1.875 12.375C0.839437 12.375 0 11.5356 0 10.5V2.25397C0 1.2184 0.839437 0.378967 1.875 0.378967H46.125C47.1606 0.378967 48 1.2184 48 2.25397V10.5C48 11.5356 47.1606 12.375 46.125 12.375C45.0911 12.375 44.25 13.2162 44.25 14.25ZM11.2498 4.12897H3.75V8.94631C5.93259 9.72022 7.5 11.8055 7.5 14.25C7.5 16.6946 5.93259 18.7798 3.75 19.5537V24.3711H11.2498V4.12897ZM44.25 4.12897H14.9998V24.3711H16.5C16.9972 24.3711 17.4743 24.5686 17.8258 24.9202L24 31.0945L30.1742 24.9203C30.5257 24.5687 31.0028 24.3712 31.5 24.3712H44.25V19.5538C42.0674 18.7799 40.5 16.6947 40.5 14.2501C40.5 11.8056 42.0674 9.72031 44.25 8.9464V4.12897Z"
                fill="#2130B8" />
        </svg> --}}
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left" style="margin-right: 0px">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    {{-- <li class="nav-item dropdown notification_dropdown">
                        <div class="search_bar dropdown show">
                            <div class="dropdown-menu p-0 m-0 show">
                                <form>
                                    <input class="form-control typeahead" type="search" placeholder="Search Here"
                                        aria-label="Search">
                                </form>
                            </div>
                            <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.7871 22.7761L17.9548 16.9437C19.5193 15.145 20.4665 12.7982 20.4665 10.2333C20.4665 4.58714 15.8741 0 10.2333 0C4.58714 0 0 4.59246 0 10.2333C0 15.8741 4.59246 20.4665 10.2333 20.4665C12.7982 20.4665 15.145 19.5193 16.9437 17.9548L22.7761 23.7871C22.9144 23.9255 23.1007 24 23.2816 24C23.4625 24 23.6488 23.9308 23.7871 23.7871C24.0639 23.5104 24.0639 23.0528 23.7871 22.7761ZM1.43149 10.2333C1.43149 5.38004 5.38004 1.43681 10.2279 1.43681C15.0812 1.43681 19.0244 5.38537 19.0244 10.2333C19.0244 15.0812 15.0812 19.035 10.2279 19.035C5.38004 19.035 1.43149 15.0865 1.43149 10.2333Z"
                                        fill="#A4A4A4">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="{{ asset('base/images/profile/user.png') }}" width="20" alt="" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                    width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

{{-- <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source: function(terms, process) {
            return $.get(path, {
                term: terms
            }, function(data) {
                return process(data);
                // console.log(data);
            });
        }
    })
</script> --}}

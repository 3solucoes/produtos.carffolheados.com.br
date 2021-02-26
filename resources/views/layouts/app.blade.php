<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Painel') }}</title>

        <!-- Site favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/icon-font.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/style.css') }}">

        @livewireStyles

        
    </head>
    <body >
        <div class="pre-loader">
            <div class="pre-loader-box">
                <div class="loader-logo"><img src="https://www.carffolheados.com.br/wp-content/themes/carf/img/carf.webp" style="width:50%" alt=""></div>
                <div class='loader-progress' id="progress_div">
                    <div class='bar' id='bar1'></div>
                </div>
                <div class='percent' id='percent1'>0%</div>
                <div class="loading-text">
                    Carregando...
                </div>
            </div>
        </div>
        
        @livewire('navigation-menu')

        <!-- Page Heading -->
       
        <header class="header">
              
            <div class="header-left">
                <div class="menu-icon dw dw-menu"></div>
                    <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
                    
                </div>
                <div class="header-right">
                    <div class="dashboard-setting user-notification">
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                                <i class="dw dw-settings2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="user-notification">
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="icon-copy dw dw-notification"></i>
                                <span class="badge notification-active"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="notification-list mx-h-350 customscroll">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('/images/img.jpg')}}" alt="">
                                                <h3>John Doe</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="user-info-dropdown">
                        
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <span class="user-icon">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}                               
                                            </button>
                                        </span>
                                    @endif
                                </span>               
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="dw dw-user1"></i> {{ __('Perfil') }}</a>                
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <a class="dropdown-item"  href="{{ route('api-tokens.index') }}"><i class="dw dw-help"></i> {{ __('API Tokens') }}</a>
                                @endif
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                    <a  class="dropdown-item" 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="dw dw-logout"></i> {{ __('Sair') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-sidebar">
                    <div class="sidebar-title">
                        <h3 class="weight-600 font-16 text-blue">
                            Layout Settings
                            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
                        </h3>
                        <div class="close-sidebar" data-toggle="right-sidebar-close">
                            <i class="icon-copy ion-close-round"></i>
                        </div>
                    </div>
                        <div class="right-sidebar-body customscroll">
                            <div class="right-sidebar-body-content">
                                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                                <div class="sidebar-btn-group pb-30 mb-10">
                                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                                </div>

                                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                                <div class="sidebar-btn-group pb-30 mb-10">
                                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                                </div>

                                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                                <div class="sidebar-radio-group pb-10 mb-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                                    </div>
                                </div>

                                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                                <div class="sidebar-radio-group pb-30 mb-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                                    </div>
                                </div>

                                <div class="reset-options pt-30 text-center">
                                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                  
        </header>
        
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts
        <!-- js -->
        <script src="{{ asset('scripts/core.js') }}"></script>
        <script src="{{ asset('scripts/script.min.js') }}"></script>
        <script src="{{ asset('scripts/process.js') }}"></script>
        <script src="{{ asset('scripts/layout-settings.js') }}"></script>
        <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('scripts/dashboard.js') }}"></script>
    </body>
</html>

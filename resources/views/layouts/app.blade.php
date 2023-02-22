<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Laravel</title>
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }
    </style> 

    <script src="{{ asset('/js/createBook.js') }}"></script>
    <script src="{{ asset('/js/deleteBook.js') }}"></script>
    <script src="{{ asset('/js/editBook.js') }}"></script>
    <script src="{{ asset('/js/getThumbnail.js') }}"></script>
    <script src="{{ asset('/js/createRecipe.js') }}"></script>
    <script src="{{ asset('/js/deleteRecipe.js') }}"></script>
    <script src="{{ asset('/js/getRecipeData.js') }}"></script>
    <script src="{{ asset('/js/editRecipe.js') }}"></script>
    <script src="{{ asset('/js/search.js') }}"></script>
    <script src="{{ asset('/js/editProfile.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="{{ asset('/js/deleteUser.js') }}"></script>

    <script src="https://kit.fontawesome.com/096fe42ada.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/recipe.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark py-3">
            <div class="container-fluid">
              <a class="navbar-brand ps-lg-5" href="{{ url('/home') }}"><i class="fa-solid fa-utensils mx-2"></i>Cookshelf</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#linkMenu" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="linkMenu">
                <ul class="navbar-nav me-auto ms-lg-5 mb-2 mb-lg-0">
                  <li class="nav-item dropdown px-lg-2 mx-lg-2">
                    <a class="nav-link dropdown-toggle active" id="LibraryLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      ライブラリ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="LibraryLink">
                      <li><a class="dropdown-item" href="{{ url('/library') }}">レシピ本を見る</a></li>
                      <li><a class="dropdown-item" href="{{ route('myRecipe', ['sort'=>'all']) }}">保存したレシピ</a></li>
                    </ul>
                  </li>
                  <li class="nav-item px-lg-2 mx-lg-2">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle active" id="SearchLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            レシピを探す
                        </a>
                          <ul class="dropdown-menu" aria-labelledby="SearchLink">
                            <li><a class="dropdown-item" href="{{ route('allRecipes', ['sort'=>'all']) }}">みんなのレシピ</a></li>
                            <li><a class="dropdown-item" href="{{ route('allVideos', ['sort'=>'all']) }}">動画から探す</a></li>
                          </ul>
                        </li>
                      </ul>
                  </li>         
                </ul>
                <ul class="navbar-nav mr-auto pe-5 mb-2 mb-lg-0 d-lg-show">
                  <div class="dropdown">
                    <a class="nav-dot" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
                      <img src="storage/images/{{ Auth::user()->image }}" class="rounded-circle border border-white" width="40" height="40">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="{{ url('/setting') }}">アカウントの設定</a>
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">ログアウト</a>
                    </div>
                  </div>
                </ul>
            </div>
            </div>
        </nav>

          {{-- container --}}
          <div class="container-fluid">
            <div class="row px-lg-4 py-3 mx-lg-5 my-3">
                <div class="col-3 d-lg-block" style="display: none;">

                    {{-- sidebar --}}
                    <div class="p-3 bg-white border rounded-3 d-lg-block" style="width: 280px; height: auto; display: none;">
                        <div class="border-bottom">
                          <div class="profile text-center my-2">
                            <img src="storage/images/{{ Auth::user()->image }}" class="thumbnail-image rounded-circle img-thumbnail" width="80" height="80">
                            <div class="p-2">{{ Auth::user()->name }}</div>
                          </div>
                        </div>
                        <ul class="list-unstyled ps-0">
                          <li class="my-3">
                            <a href="" class="bt-home mx-4 align-items-center rounded" style="text-decoration: none; color: #212529;">ホーム</a>
                          </li>
                          <li class="my-1 px-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                              ライブラリ
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="pt-4 pb-2 ps-4"><a class="nav-arrow-link" href="{{ url('/library') }}" class="link-dark rounded">レシピ本を見る</a></li>
                                <li class="py-3 ps-4"><a class="nav-arrow-link" href="{{ route('myRecipe', ['sort'=>'all']) }}" class="link-dark rounded">保存したレシピ</a></li>
                              </ul>
                            </div>
                          </li>
                          <li class="mb-1 px-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                              レシピを探す
                            </button>
                            <div class="collapse" id="orders-collapse">
                              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="pt-4 pb-2 ps-4"><a href="{{ route('allRecipes', ['sort'=>'all']) }}" class="link-dark rounded">みんなのレシピ</a></li>
                                <li class="py-3 ps-4"><a href="{{ route('allVideos', ['sort'=>'all']) }}" class="link-dark rounded">動画から探す</a></li>
                              </ul>
                            </div>
                          </li>
                          <li class="border-top my-3"></li>
                          <li class="mb-1 px-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                              アカウント
                            </button>
                            <div class="collapse" id="account-collapse">
                              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="pt-4 pb-2 ps-4"><a href="{{ url('/setting') }}" class="link-dark rounded">アカウントの設定</a></li>
                                <li class="py-3 ps-4"><a class="link-dark rounded" data-bs-toggle="modal" data-bs-target="#logoutModal">ログアウト</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                    </div>
                </div>

                <div class="col col-lg-9 mb-5">
                    <main class="">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>

        {{-- {# モーダル #} --}}
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">ログアウトしますか？</h5>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



{{-- original --}}





{{-- <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">





            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
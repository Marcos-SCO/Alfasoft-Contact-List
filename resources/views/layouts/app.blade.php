<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env("APP_NAME", "Alfasoft") }}</title>

  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
  @php

  use \App\Helpers\Classes\SvgHelper;

  @endphp
  <header class="page-header py-4 text-white bg-dark position-relative">

    <div class="container position-relative">

      <div class="session-controls-container d-flex justify-content-end align-items-center position-absolute top-0 end-0 mt-3 me-3">
        @auth
        
        <div class="auth-username me-3 d-flex align-center">
          <span>{!! SvgHelper::getSvg('user_icon', 'svg') !!}</span> <span>{{ auth()->user()->name }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-light btn-sm">{{ __('Logout') }}</button>
        </form>

        @else
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">{{ __('Login') }}</a>
        @endauth
      </div>

      <h1 class="text-center mb-4">{{ __('Alfasoft Contacts') }}</h1>

      <nav class="d-flex justify-content-center gap-3 pt-2">
        <a href="{{ route('contacts.index') }}" class="btn btn-light py-2 px-4">{{ __('List Contacts') }}</a>
        <a href="{{ route('contact.create') }}" class="btn btn-light py-2 px-4">+{{ __('Add Contact') }}</a>
      </nav>
    </div>
  </header>

  <main class="main-container container mt-4 mb-5">

    @yield('content')
  </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env("APP_NAME", "Alfasoft") }}</title>

  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

  <script src="https://unpkg.com/htmx.org@1.8.4" integrity="sha384-H6m3NUDF59KD7C93qC5VR6WhZq94bD6E4e6tvDCEkbCbTtZjNe3G89aSkcvZw2cz" crossorigin="anonymous"></script>
</head>

<body>
  @php

  use \App\Helpers\Classes\SvgHelper;

  @endphp
  <header class="page-header py-4 text-white bg-dark position-relative" hx-boost="true" hx-target="main" hx-select="main" hx-swap="outerHTML" hx-push-url="true">

    <div class="container position-relative">

      <div class="session-controls-container d-flex justify-content-end align-items-center position-absolute top-0 end-0 mt-3 me-3">
        @auth

        <div class="auth-username me-3 d-flex align-center">
          <span>{!! SvgHelper::getSvg('user_icon', 'svg') !!}</span> <span>{{ auth()->user()->name }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="d-inline" hx-boost="false">
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

    <div data-js="loader" class="loader">{{ __('Loading') }}...</div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" data-js="success-alert">
      {{ session('success') }}
      <button type="button" class="btn-close" aria-label="Close"></button>
    </div>

    <script>
      function successMessage() {

        const alertBox = document.querySelector('[data-js="success-alert"]');
        if (!alertBox) return;

        const closeButton = alertBox.querySelector('.btn-close');

        closeButton.addEventListener('click', function() {
          alertBox.classList.add('hide-element');
        });
      }
      successMessage();
    </script>
    @endif

    @yield('content')
  </main>
</body>

</html>
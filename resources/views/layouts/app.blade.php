<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env("APP_NAME", "Alfasoft") }}</title>

  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
  <header class="page-header py-5 text-white">

    <h1 class="text-center">{{ __('Alfasoft Contacts') }}</h1>

    <nav class="text-center pt-3 pb-2">
      <a href="{{ route('contacts.index') }}" class="btn btn-light me-2 py-2 px-4">{{ __('List Contacts') }}</a>
      <a href="{{ route('contacts.create') }}" class="btn btn-light py-2 px-4">+{{ __('Add Contact') }}</a>
    </nav>
  </header>

  <main class="main-container container mt-4 mb-5">

    @yield('content')
  </main>
</body>

</html>
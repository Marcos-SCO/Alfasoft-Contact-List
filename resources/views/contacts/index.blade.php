@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="mb-4">{{ __("Contacts") }}</h1>

  <a href="{{ route('contact.create') }}" class="btn pink-button-color mb-4" title="{{ __('Add a new contact') }}">+ {{ __('new contact') }}</a>

  <div class="list-container">
    <ul class="list-group">

      <li class="list-title list-group-item d-flex justify-content-between align-items-center">

        <div class="w-100">

          <div class="item-info-container d-flex justify-content-between py-4">
            <div class="date"><b>{{ __('Insertion date') }}</b></div>

            <div class="name"><b>{{ __('Name') }}</b></div>

            <div class="email"><b>{{ __('Email') }}</b></div>

            <div class="contact"><b>{{ __('Contact') }}</b></div>

          </div>

        </div>

        <!-- <div class="list-action d-flex gap-2" style="min-width: 120px"></div> -->
      </li>

      @foreach ($contacts as $contact)
      <li class="list-body-item list-group-item d-flex justify-content-between align-items-center">

        <div class="w-100">

          <a href="{{ route('contacts.edit', $contact->id) }}" class="text-decoration-none" title="Edit">

            <div class="item-info-container d-flex justify-content-between py-4">

              <div class="date"><span><b>{{ \Carbon\Carbon::parse($contact->created_at)->format('m/d/Y') }}</b></span></div>

              <div class="name fw-bold text-success"><span><b>{{ $contact->name }}</b></span></div>

              <div class="email"><span><b>{{ $contact->email }}</b></span></div>

              <div class="contact"><span><b>{{ $contact->contact }}</b></span></div>

            </div>
          </a>
        </div>

        <div class="list-action d-flex gap-2">
          <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm d-flex align-items-center" title="{{ __('Edit') }}">{{ __('Edit') }}r</a>

          <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure, want to remove this contact?') }}');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove</button>
          </form>

        </div>
      </li>
      @endforeach
    </ul>
  </div>

  <div class="mt-5 d-flex justify-center pagination-container">
    {{ $contacts->links('pagination::bootstrap-4') }}
  </div>

</div>
@endsection
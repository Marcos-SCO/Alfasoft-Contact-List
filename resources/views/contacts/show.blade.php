@extends('layouts.app')

@section('content')

<div class="container mt-5 col-12 col-lg-8">

    <h3 class="mb-4">{{ __("Contact Information") }}</h3>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">{{ __("Name") }}:</label>
        <div class="col-sm-9 d-flex align-items-center">
            <p class="form-control-plaintext mb-0">{{ $contact->name }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">{{ __("Contact Number") }}:</label>
        <div class="col-sm-9 d-flex align-items-center">
            <p class="form-control-plaintext mb-0">{{ $contact->contact }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">{{ __("Email") }}:</label>
        <div class="col-sm-9 d-flex align-items-center">
            <p class="form-control-plaintext mb-0">{{ $contact->email }}</p>
        </div>
    </div>

    <div class="mt-4" hx-boost="true" hx-target="main" hx-select="main" hx-swap="outerHTML" hx-push-url="true">
        @auth
        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning me-2">{{ __("Edit Contact") }}</a>
        @endauth
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">{{ __("Back to List") }}</a>
    </div>

</div>

@endsection
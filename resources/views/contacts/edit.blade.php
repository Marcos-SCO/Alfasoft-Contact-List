@extends('layouts.app')

@section('content')

<div class="container mt-5 col-12 col-lg-8">
    <h3 class="mb-4">{{ __("Edit Contact") }}</h3>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mb-4 content-form" hx-post="{{ route('contacts.update', $contact->id) }}" hx-boost="true" hx-target="main" hx-select="main" hx-push-url="true">

        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">{{ __("Name") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name) }}">

                @error('name')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-sm-3 col-form-label">{{ __("Contact Number") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $contact->contact) }}">
             
                @error('contact')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
       
        <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">{{ __("Email") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}">
                @error('email')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn blue-button-color mt-4">{{ __("Save Changes") }}</button>
    </form>
</div>

@endsection
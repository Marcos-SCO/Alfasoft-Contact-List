@extends('layouts.app')

@section('content')

<div class="container mt-5 col-12 col-lg-8">

    <h3 class="mb-4">+ {{ __("New Contact") }}</h3>

    <form action="{{ route('contacts.store') }}" method="POST" class="mb-4 content-form">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">{{ __("Name") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

                @error('name')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-sm-3 col-form-label">{{ __("Contact Number") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="contact" id="contact" class="form-control" maxlength="9" value="{{ old('contact') }}">
             
                @error('contact')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">{{ __("Email") }}:</label>
            <div class="col-sm-9">
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn blue-button-color mt-4">+ {{ __("Save Contact") }}</button>
    </form>
</div>

@endsection
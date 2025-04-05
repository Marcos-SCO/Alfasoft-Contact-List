@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">{{ __("Edit Contact") }}</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mb-4 content-form">

        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">{{ __("Name") }}:</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name) }}">

                @error('name')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-sm-2 col-form-label">{{ __("Contact Number") }}:</label>
            <div class="col-sm-10">
                <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $contact->contact) }}">
             
                @error('contact')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
       
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">{{ __("Email") }}:</label>
            <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}">
                @error('email')
                <div class="text-danger pt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn pink-button-color mt-4">{{ __("Salve Changes") }}</button>
    </form>
</div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="add-contact-form" action="{{ route('contacts.update', $contact->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-12 d-flex flex-column align-items-center">
                    <img src="{{ '/storage/' . $contact->avatar }}" alt="Avatar"
                         style="width: 150px; height: 150px; border-radius: 100px">
                    <div class="form-group mt-3 w-100">
                        <label for="avatar">Avatar image</label>
                        <input name="avatar" type="file" class="form-control" id="avatar">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <label for="first-name">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Mohsen" id="first-name"
                               value="{{ old('name', $contact->name) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="example@gmail.com" id="email"
                               value="{{ old('email', $contact->email) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="phone-number">Phone Number</label>
                        <input name="phone" type="tel" class="form-control" placeholder="+989123456789"
                               id="phone-number" value="{{ old('phone', $contact->phone) }}">
                    </div>
                </div>
            </div>

            <label for="gender" class="mt-3">What is his/her gender?</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender"
                           value="male" {{ $contact->gender == 'male'? 'checked':'' }}> Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender"
                           value="female" {{ $contact->gender == 'female'? 'checked':'' }}> Female
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-5">Add to list</button>
        </form>
    </div>
@endsection

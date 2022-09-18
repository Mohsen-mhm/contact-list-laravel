@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form id="add-contact-form" action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <label for="avatar">Avatar image</label>
                        <input name="avatar" type="file" class="form-control" id="avatar">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <label for="first-name">First Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Mohsen" id="first-name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="example@gmail.com" id="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="phone-number">Phone Number</label>
                        <input name="phone" type="tel" class="form-control" placeholder="+989123456789" id="phone-number">
                    </div>
                </div>
            </div>

            <label for="gender" class="mt-3">What is his/her gender?</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="male" checked> Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender" value="female"> Female
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-5">Add to list</button>
        </form>
    </div>
@endsection

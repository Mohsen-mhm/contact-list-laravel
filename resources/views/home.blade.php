@extends('layouts.app')

@section('content')
    <main class="container-fluid">
        <h2 class="text-center mt-3 mb-3">All Contacts</h2>
        <div class="row mt-3 mb-3 d-flex justify-content-center align-items-center responsive-header">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <form action="" class="d-flex">
                    <input name="search" type="search" class="form-control w-75 filter-search"
                           placeholder="Search..." value="{{ request('search') }}"
                           style="border-radius: 8px 0 0 8px;">
                    <button type="submit" class="btn btn-secondary" style="border-radius: 0 8px 8px 0;"><i
                            class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="col-sm-3 col-lg-2 col-xl-3 text-center mt-3 w-50">Contacts
                    Number: <b
                        class="contact-number">{{ $contacts->count() }}</b></p>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <a href="{{ route('contacts.create') }}"
                   class="d-flex align-items-center btn btn-success add-contact-btn">Add
                    Contact <i class="fa fa-plus ms-2 mt-1"></i></a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
            <thead class="thead-dark">
            <tr>
                <th>Avatar</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody class="contact-list-body">
            @foreach($contacts as $contact)
                <tr>
                    <td><img src="{{ 'storage/' . $contact->avatar }}" alt="Avatar"
                             style="width: 50px; height: 50px; border-radius: 50px"></td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                        <button onclick="document.getElementById('delete-{{ $contact->id }}').submit()"
                                class="btn btn-danger">Delete
                        </button>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="post"
                              id="delete-{{ $contact->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    </main>
@endsection

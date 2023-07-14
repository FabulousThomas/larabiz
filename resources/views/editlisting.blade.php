@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Edit Listing') }}
                    <span><a href="/dashboard" class="btn btn-sm btn-light shadow-none border"><i
                                class="las la-arrow-backward"></i> Go Back</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <h3>Edit Listings</h3>

                    <form action="/listings/{{ $listing->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="name" class="m-0">Name</label>
                            <input type="text" class="form-control shadow-none border" name="name"
                                placeholder="Company Name" value="{{ $listing->name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="website" class="m-0">Website</label>
                            <input type="text" class="form-control shadow-none border" name="website"
                                placeholder="Company Website" value="{{ $listing->website }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="m-0">Email</label>
                            <input type="email" class="form-control shadow-none border" name="email"
                                placeholder="Contact Email" value="{{ $listing->email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone" class="m-0">Phone</label>
                            <input type="tel" class="form-control shadow-none border" name="phone"
                                placeholder="Contact Phone" value="{{ $listing->phone }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="address" class="m-0">Address</label>
                            <input type="text" class="form-control shadow-none border" name="address"
                                placeholder="Business Address" value="{{ $listing->address }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="bio" class="m-0">Bio</label>
                            <textarea class="form-control shadow-none border" name="bio" placeholder="About This Business">{{ $listing->name }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-none border" name="edit_listing">Update
                                Listing</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

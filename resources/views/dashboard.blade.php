@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Dashboard') }} <span><a
                            href="/listings/create" class="btn btn-sm btn-success shadow-none border">Add Listings</a></span>
                </div>

                <div class="card-body">

                    <h3>Your Listings</h3>
                    @if (count($listings))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            @foreach ($listings as $listing)
                                <tbody>
                                    <tr>
                                        <td>{{ $listing->name }}</td>
                                        <td></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-light dropdown-toggle shadow-none"
                                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item btn btn-sm text-success"
                                                            href="/listings/{{ $listing->id }}/edit">Edit</a></li>

                                                    <form action="/listings/{{ $listing->id }}" method="POST" onsubmit = 'return confirm("Are you sure to delete listing?")'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <li>
                                                            <button class="dropdown-item btn btn-sm text-danger">
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

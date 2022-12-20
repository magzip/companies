@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-success mb-2" href="{{url('/companies/create')}}" role="button">Create new company</a>
                    <div class="card">
                        <div class="card-header">Companies list</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($companies) > 0)
                                        @foreach($companies as $company)
                                            <tr>
                                                <td>{{$company->name}}</td>
                                                <td>{{$company->address}}</td>
                                                <td>{{$company->web}}</td>
                                                <td>{{$company->email}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{url('/companies')}}/{{$company->id}}/edit" role="button">Edit</a>
                                                    <form method="POST" action="{{url('/companies')}}/{{$company->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

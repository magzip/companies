@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employees') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-success mb-2" href="{{url('/employees/create')}}" role="button">Create new employee</a>
                        <div class="card">
                            <div class="card-header">Employees list</div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Company</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($employees) > 0)
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>{{$employee->firstName}}</td>
                                                <td>{{$employee->lastName}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->phone}}</td>
                                                <td>{{$employee->company->name}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{url('/employees')}}/{{$employee->id}}/edit" role="button">Edit</a>
                                                    <form method="POST" action="{{url('/employees')}}/{{$employee->id}}">
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
                                    {{ $employees->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

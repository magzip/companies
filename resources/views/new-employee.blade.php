@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Emlpoyee') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">New employee info</div>
                            <div class="card-body">
                                <form method="post" action="{{url('/employees')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="employeeEmail">Email</label>
                                        <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" value="{{ old('employeeEmail') }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="employeePhone">Phone</label>
                                        <input type="text" class="form-control" id="employeePhone" name="employeePhone" value="{{ old('employeePhone') }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="company">Company</label>
                                        <select type="text" class="form-control" id="company" name="company">
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Create employee</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


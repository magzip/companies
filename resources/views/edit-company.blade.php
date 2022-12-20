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
                        <div class="card">
                            <div class="card-header">Edit company info</div>
                            <div class="card-body">
                                <form method="post" action="{{ url('/companies') }}/{{ $company->id }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="companyName">Company Name</label>
                                        <input type="text" class="form-control" id="companyName" name="companyName" value="{{ $company->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="companyAddress">Address</label>
                                        <input type="text" class="form-control" id="companyAddress" name="companyAddress" value="{{ $company->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="companyEmail">Email</label>
                                        <input type="email" class="form-control" id="companyEmail" name="companyEmail" value="{{ $company->email }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="companyWeb">Website</label>
                                        <input type="text" class="form-control" id="companyWeb" name="companyWeb" value="{{ $company->web }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="companyLogo">Logo</label>
                                        <input type="file" class="form-control-file" id="companyLogo" name="companyLogo">
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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


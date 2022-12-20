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
                            <div class="card-header">New company info</div>
                            <div class="card-body">
                                <form method="post" action="{{url('/companies')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="companyName">Company Name</label>
                                        <input type="text" class="form-control" id="companyName" name="companyName" value="{{ old('companyName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="companyAddress">Address</label>
                                        <input type="text" class="form-control" id="companyAddress" name="companyAddress" value="{{ old('companyAddress') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="companyEmail">Email</label>
                                        <input type="email" class="form-control" id="companyEmail" name="companyEmail" value="{{ old('companyEmail') }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="companyWeb">Website</label>
                                        <input type="text" class="form-control" id="companyWeb" name="companyWeb" value="{{ old('companyWeb') }}">
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
                                    <button type="submit" class="btn btn-primary">Create company</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Register</h3>
                        <form method="POST" action="/register">
                            @csrf 
                            <div class="form-group">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" id="Name" name="name" value="{{ old('name') }}">
                            </div>
                            @error('firstName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{old ('email')}}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="password">Passowrd</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{old ('password')}}">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">Изпрати</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


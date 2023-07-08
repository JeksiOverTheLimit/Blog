@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>
                <form method="POST" action="/login">
                    @csrf 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

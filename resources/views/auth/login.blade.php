@extends('layouts.auth')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold">Amazing<span class="text-primary">News</span></h3>
                </div>

                <div class="card-body">
                    <div class="my-3">
                        <h3 class="text-center">Masuk Admin</h3>
                        <div class="line-primary" style="width: 180px; margin:auto"></div>
                    </div>
                   
                    <form method="POST" action="{{ route('login') }}" class="col-md-6 mx-auto">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="col-form-label text-md-end">Email</label>

                                <input placeholder="Masukan email..." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="text-md-end">Kata Sandi</label>

                                <input placeholder="Masukan kata sandi..." t id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    

                        <button type="submit" class="btn btn-primary w-100">
                            Masuk
                        </button>

                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

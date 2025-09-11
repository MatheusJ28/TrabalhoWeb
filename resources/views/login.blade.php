@extends('layouts.main_layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5" style="background: linear-gradient(to top, #f3309b, #0a0c33); border: 2px solid #8cfffb;">
                <div class="text-center p-3">
                    <img src="assets/images/logoo.png" height="150" width="150" alt="Logo">
                    <h1 style="color: #8cfffb;">LotusMangas</h1>
                </div>

                <!-- Form -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        {{-- <form action="/loginSubmit" method="post"> --}}
                        <form action="{{ route('login.submit') }}" method="POST" novalidate>
                        @csrf  
                        <div class="mb-3">
                            <label for="text_username" class="form-label" style="color: #8cfffb;">Username</label>
                            <input class="form-control" style="background-color: #1b263b; color: #00a8f3; border: 1px solid #00a8f3;" type="text" name="text_username" value="{{ old('text_username') }}">
                            @error('text_username')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="text_password" class="form-label" style="color: #8cfffb;">Password</label>
                            <input class="form-control" style="background-color: #1b263b; color: #00a8f3; border: 1px solid #00a8f3;" type="password" name="text_password" value="{{ old('text_password') }}">
                            @error('text_password')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn w-100" type="submit" style="background-color: #ff005d; color: #ffffff; font-weight: bold;">LOGIN</button>
                        </div>
                        </form>
                        @if(session('login_error'))
                            <div class="alert alert-warning text-center" style="background-color: #ffffff; color: #ff005d; font-weight: bold;">
                                {{ session('login_error') }}
                            </div>
                        @endif
                        {{-- @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ol class="m-0">
                                    @foreach ($errors->all() as $error )
                                        <li>{{ $error }} </li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif --}}
                    </div>
                </div>

                <div class="text-center" style="color: #add8e6;">
                    <small>&copy; <?= date('Y') ?> LotusMangas</small>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
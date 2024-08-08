@extends('layouts.app')
@section('title', 'Save Data Manually')
@section('colWidth','8')
@section('content')
    <div class="card bg-primary-subtle">
        <h1 class="card-header">Save Data Manually</h1>
        <div class="card-body p-3">
            <form action="{{ Route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md">
                        <label for="name" class="form-text">Enter Username</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="ABC">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span><br>
                        @endif
                    </div>
                    <div class="col-md">
                        <label for="email" class="form-text">Enter Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="abc@example.com">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span><br>
                        @endif
                    </div>
                    <div class="col-md">
                        <label for="password" class="form-text">Enter Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="***">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span><br>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        <a class="btn btn-dark mt-3" href="{{ Route('index') }}">
                            Back</a>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.footer')
    </div>
@endsection

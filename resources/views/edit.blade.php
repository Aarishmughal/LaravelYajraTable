@extends('layouts.app')
@section('title', 'Update Entry')
@section('colWidth','8')
@section('content')
    <div class="card bg-primary-subtle">
        <h1 class="card-header">Update Entry</h1>
        <div class="card-body p-3">
            <form action="{{ Route('update',["id"=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md">
                        <label for="name" class="form-text">Username</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="ABC" value="{{$user->name}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span><br>
                        @endif
                    </div>
                    <div class="col-md">
                        <label for="email" class="form-text">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="abc@example.com" value="{{$user->email}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span><br>
                        @endif
                    </div>
                    <div class="col-md">
                        <label for="password" class="form-text">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="***" value="" readonly disabled>
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span><br>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button class="btn btn-primary mt-3" type="submit">Update</button>
                        <a class="btn btn-dark mt-3" href="{{ Route('users') }}">
                            Back</a>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.footer')
    </div>
@endsection

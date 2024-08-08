@extends('layouts.app')
@section('title', 'User Details')
@section('colWidth', '8')
@section('content')
    <div class="card bg-primary-subtle">
        <h1 class="card-header">User Details</h1>
        <div class="card-body p-3">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label for="id" class="form-text">ID</label>
                    <input type="text" name="id" id="id"
                        class="form-control @error('id') is-invalid @enderror"
                        value="{{ $user->id }}" readonly>
                    @if ($errors->has('id'))
                        <span class="text-danger">
                            {{ $errors->first('id') }}
                        </span><br>
                    @endif
                </div>
                <div class="col-md">
                    <label for="name" class="form-text">Username</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ $user->name }}" readonly>
                    @if ($errors->has('name'))
                        <span class="text-danger">
                            {{ $errors->first('name') }}
                        </span><br>
                    @endif
                </div>
                <div class="col-md">
                    <label for="email" class="form-text">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ $user->email }}" readonly>
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            {{ $errors->first('email') }}
                        </span><br>
                    @endif
                </div>
                <div class="col-md">
                    <label for="created_at" class="form-text">Added At</label>
                    <input type="created_at" name="created_at" id="created_at"
                        class="form-control @error('created_at') is-invalid @enderror" placeholder="abc@example.com"
                        value="{{ $user->created_at }}" readonly>
                    @if ($errors->has('created_at'))
                        <span class="text-danger">
                            {{ $errors->first('created_at') }}
                        </span><br>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <a class="btn btn-dark mt-3" href="{{ Route('users') }}">
                        Back</a>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection

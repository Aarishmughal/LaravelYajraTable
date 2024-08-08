@extends('layouts.app')
@section('title', 'Compile Mail')
@section('colWidth','8')
@section('content')
    <div class="card bg-primary-subtle">
        <h1 class="card-header">Send an Email</h1>
        <div class="card-body p-3">
            <form action="{{ Route('sendMail',["id"=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md">
                        <label for="email" class="form-text">To</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="abc@example.com" value="{{ $user->email }}" readonly disabled>
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span><br>
                        @endif
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label for="subject" class="form-text">Subject</label>
                        <input type="subject" name="subject" id="subject"
                            class="form-control @error('subject') is-invalid @enderror" placeholder="Suggestion, Complaint, etc" value="{{ old('subject') }}">
                        @if ($errors->has('subject'))
                            <span class="text-danger">
                                {{ $errors->first('subject') }}
                            </span><br>
                        @endif
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label for="body" class="form-text">Body</label>
                        <textarea type="body" name="body" id="body"
                            class="form-control @error('body') is-invalid @enderror" placeholder="I hope this email finds you in best health..." value="{{ old('body') }}"></textarea>
                        @if ($errors->has('body'))
                            <span class="text-danger">
                                {{ $errors->first('body') }}
                            </span><br>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button class="btn btn-primary mt-3" type="submit">Send Mail</button>
                        <a class="btn btn-dark mt-3" href="{{ Route('show') }}">
                            Back</a>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.footer')
    </div>
@endsection

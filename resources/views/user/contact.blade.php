@extends('layouts.user')

@section('content')
     <!-- Post Content Column -->
     <div class="col-lg-8 mb-5">
        @if(session()->has('message') )
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif
        <!-- Title -->
        <h1 class="mt-4">Contact Us</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form method="POST" action="/contact">
        @csrf
         <div class="form-group">
          <label for="name">Name</label>
         <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required>
        </div>

        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" required>
        </div>

         <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" value="{{ old('phone')}}" name="phone">
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" value="{{ old('message')}}" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Send message</button>
      </form>

      </div>
@endsection
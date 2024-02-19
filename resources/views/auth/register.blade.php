@extends('layouts.auth')

@section("title")
    Register
@endsection



@section("main-section")
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-sm-4 align-items-center box-shadow p-3 rounded-3"  >
<form method="post" action="{{url("registeruser")}}">
    @csrf
    <h3>Login In</h3>
    @if (Session::has("failed"))
        <p class="bg-danger p-2 rounded-2 text-white">{{Session::get("failed")}}</p>
    @endif

    <div class="mb-3">
      <label for="exampleInputName1" class="form-label">Name:</label>
      <input type="name" value="{{old("name")}}" class="form-control" id="exampleInputName1" name="name" aria-describedby="nameHelp">
      @error("name")
        <p class="text-danger font-weight-bold">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" value="{{old("email")}}" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
      @error("email")
        <p class="text-danger font-weight-bold">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      @error("password")
      <p class="text-danger">{{$message}}</p>
    @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2">
        @error("cpassword")
        <p class="text-danger">{{$message}}</p>
      @enderror
      </div>
   
    <button  type="submit" class="btn btn-dark rounded-pill justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
      </svg> Sign Up</button>
  </form>
  <p class="mt-2 text-center">Already a user? <a href="{{url("login")}}" class="fw-bold">Sign In?</a></p>
</div>
</div>
@endsection
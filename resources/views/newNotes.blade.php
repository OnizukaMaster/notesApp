
@extends('layouts.main')

@section("title")
    Update
@endsection

@section("main-section")
<div class="p-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
          <li class="breadcrumb-item"><a class="head" style="text-decoration: none;color:black">Add Notes</a></li>
        </ol>
      </nav>
<form method="post" action="{{route("storenotes")}}" id="myForm" >
    @csrf
    <h3><span class="head">Add </span>Notes    </h3>
    {{-- <input type="hidden" name="id" id="id" > --}}
      <input placeholder="Enter title" type="text" class="form-control dis-btn" id="name" name="title" style="height: 50px" >
   
      <textarea placeholder="Enter description"  rows="4" style="height: 400px" id="desc" class="form-control dis-btn" name="desc"   ></textarea>
  
    <button type="submit" class="btn btn-dark rounded-pill mt-2">Add</button>
  </form>
</div>
@endsection



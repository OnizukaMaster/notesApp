{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{$title}}</h3>
    <form action="{{$route}}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Enter title" value="{{$updatenotes->title}}" id="">
        <input type="text" name="desc" placeholder="desc" value="{{$updatenotes->description}}" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html> --}}

@extends('layouts.main')

@section("title")
    Update
@endsection

@section("main-section")
<div class="p-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
          <li class="breadcrumb-item"><a class="head" style="text-decoration: none;color:black">View</a></li>
        </ol>
      </nav>
<form  id="myForm" >
  
    <h3><span class="head">View </span>Notes    <a href="javascript:void(0)" class="btn btn-outline-dark rounded-pill" style="font-size:10px" onclick="remove()">Edit</a></h3><p class="info"></p>
    <input type="hidden" name="id" id="id" value="{{$updatenotes->id}}">
      <input disabled type="text" class="form-control dis-btn" id="name" name="title"  value="{{$updatenotes->title}}" style="height: 50px" >
   
      <textarea disabled  rows="4" style="height: 400px" id="desc" class="form-control dis-btn" name="desc"   >{{$updatenotes->description}}</textarea>
  
    {{-- <button type="submit" class="btn btn-dark rounded-pill mt-2">Update</button> --}}
  </form>
</div>
@endsection

@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset("assets/js/retrieve.js")}}"></script>
@endsection

@extends('layouts.main')

@section('title')
    Home
@endsection

@section('main-section')
<div class="d-flex justify-content-between align-items-center px-3">
    <h3 class="mb-3">Hello, <span class="username"></span></h3>
    <a href="{{url("notes")}}" type="button" class="btn btn-dark rounded-pill" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg> New Notes
</a>
</div>
    <div class="container-fluid">

        {{-- response from server will render here --}}
        <div class="row" id="display-card"> 
        </div>
    </div>   
@endsection


@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset("assets/js/retrieve.js")}}">
    
</script>
@endsection
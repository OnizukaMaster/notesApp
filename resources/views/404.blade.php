@extends('layouts.main')

@section("title")
    Update
@endsection

@section("main-section")
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-4 text-center">
            <h1 style="font-size:100px"><b>404<b/></h1>
                <p style="font-size: 30px">Page not Found</p>
                <a href="{{url("/")}}" class="btn btn-dark rounded-pill">Back Home</a>
        </div>
    </div>
</div>

@endsection


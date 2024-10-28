@extends('inst-layout')
@section('title', 'Instructor Dashboard')
@section('content')
<!-- @session('status')
<div class="alert alert-success">
    {{ session()->get('status') }}
</div>
@endsession -->
@if (session()->has('status')) 
<div class="alert alert-success">
    {{ (session()->get('status')) }}
</div> 
@endif
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Dashboard</h5>
  </div>
  <div class="card-body">
    <div class="card-group">
        <a class="card" href="/instructor/course/menu">
            <img class="card-img-top" src="https://img.freepik.com/premium-photo/blank-blue-paper-texture-background_7190-1906.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">ITPE 6 - BSIT 4-2</h5>
            </div>
        </a>
        <a class="card" href="/instructor/course/menu">
            <img class="card-img-top" src="https://img.freepik.com/free-photo/abstract-luxury-soft-red-background-christmas-valentines-layout-design-studio-room-web-template-business-report-with-smooth-circle-gradient-color_1258-80151.jpg?semt=ais_hybrid" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">ITPE 6 - BSIT 4-1</h5>
            </div>
        </a>
        <a class="card" href="/instructor/course/menu">
            <img class="card-img-top" src="https://img.freepik.com/free-photo/abstract-blur-empty-green-gradient-studio-well-use-as-backgroundwebsite-templateframebusiness-report_1258-107708.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">ITPE3 - BSIT 3 - 1</h5>
            </div>
        </a>
    </div>
  </div>
</div>
@endsection
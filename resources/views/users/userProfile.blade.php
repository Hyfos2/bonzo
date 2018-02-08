@extends('master')

@section('content')
   @if(\Auth::user())
       @if(\Auth::user()->posititonId !=1)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li><a href="{{ url('register') }}">Register Users</a></li>
        <li><a href="{{ url('usersList') }}">Users List</a></li>
        <li class="active">User Profile</li>
    </ol>
       @endif
@endif
    <h4 class="page-title">User Profile</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">User Profile </h3>
    </div>

   <div class="block-area" id="responsiveTable">

       {{$userDetails->name}}
   </div>

@endsection




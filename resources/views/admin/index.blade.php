@if(Auth::user()->isAdmin == false)
    <script>window.location = "/home";</script>
@else
@endif

@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Administration</h1>
</div>
@endsection

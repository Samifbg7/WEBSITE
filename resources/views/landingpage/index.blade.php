@extends('layouts.index')
@section('title','Bec')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

<div id="app">

</div>
@endsection

@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-body">
        <h1>Halaman Datang <strong>{{ Auth::user()->name }}</strong></h1>
    </div>
  </div>




@endsection

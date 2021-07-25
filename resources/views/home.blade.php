@extends('layouts.app')


@section('navbar')
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-succes my-2 my-sm-0" type="submit">Search</button>
</form>

@endsection


@section('content')
    <div class="container">
        <disc-comp />
    </div>
@endsection

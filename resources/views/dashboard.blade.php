
@extends('layouts.app')

@section('content')
    teste passou
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection

@extends('layouts.skeleton')

@section('app')

    @include('layouts.components.navbar')

    <div class="app">
        @yield('content')
    </div>

@endsection

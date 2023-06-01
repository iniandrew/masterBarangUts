@extends('layouts.skeleton')

@push('styles')
    @vite('resources/css/style.css')
@endpush

@section('app')
    <section id="home">
        <div class="hero">
            <div class="hero-header">
                <p class="tagline text-success"># 1204200046</p>
                <div class="hero-title">
                    <h1>Chrisdion Andrew</h1>
                </div>
                <div class="hero-subtitle">
                    <p class="text-subtitle text-muted">A Web Developer with experience in building applications. Strong engineering professional skilled in
                        Web Development and PHP using a variety of frameworks, Back-End Web Development, as well as
                        other common programming languages such as Java, Kotlin, and Python. Also have basic knowledge
                        of the Linux OS. Have experience in working in remote team as well as communicating with clients or
                        customers.
                    </p>
                </div>
                <a href="{{ route('barang.index') }}" class="btn btn-dark rounded-4 px-4">Masuk ke Aplikasi</a>
            </div>
            <img src="{{ Vite::asset('resources/images/deon.jpg') }}" class="rounded-circle shadow-lg w-25 h-auto" alt="">
        </div>
        <div class="circle"></div>
        <!-- Hero -->
        </section>
@endsection

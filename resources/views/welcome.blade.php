@extends('layouts.skeleton')

@section('app')
    <div class="bg-light mt-5" id="main">
        <div class="container py-5 px-1">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <img
                        class="img-fluid shadow-lg rounded-3"
                        src="{{ Vite::asset('resources/images/deon.jpg') }}"
                    />
                </div>
                <div class="col-md-7 order-md-1">
                    <h1 class="mt-4 display-3">
                        Chrisdion Andrew
                    </h1>
                    <p class="text-muted"># 1204200046</p>
                    <p class="fs-5 mt-3">
                        A Web Developer with experience in building applications. Strong engineering professional skilled in
                        Web Development and PHP using a variety of frameworks, Back-End Web Development, as well as
                        other common programming languages such as Java, Kotlin, and Python. Also have basic knowledge
                        of the Linux OS. Have experience in working in remote team as well as communicating with clients or
                        customers.
                    </p>
                    <div class="row">
                        <div class="d-flex flex-column flex-md-row">
                            <a
                                href="{{ route('barang.index') }}"
                                type="button"
                                class="btn btn-dark text-white btn-lg mb-3 me-md-3 px-4 py-3"
                            >
                                Masuk ke Aplikasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ Vite::asset('resources/images/wave.svg') }}" class="img-fluid" alt="">
        </div>
    </div>
@endsection

@extends('layouts.skeleton')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('app')

    @include('layouts.components.navbar')

    <div class="app">
        @yield('content')
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>

    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    @if(@session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ @session('success') }}'
        })
    @endif

    @if($errors->any())
        Toast.fire({
            icon: 'error',
            title: '{{ @session('error') }}'
        })
    @endif
</script>
@endpush

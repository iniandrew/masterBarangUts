@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>My Profile</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <h5>1204200046</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <h5>Chrisdion Andrew</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="program_studi" class="form-label">Program Studi</label>
                        <h5>Sistem Informasi</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

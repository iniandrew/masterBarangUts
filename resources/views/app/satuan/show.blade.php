@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-white rounded-3 border col-xl-6">
                <div class="p-5 rounded-3">
                    <div class="mb-3 text-center">
                        <i class="bi-file-text-fill fs-1"></i>
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kode_barang" class="form-label">Kode Satuan</label>
                            <h5>{{ $satuan->kode_satuan }}</h5>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nama_barang" class="form-label">Nama Satuan</label>
                            <h5>{{ $satuan->nama_satuan }}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 d-grid">
                            <a href="{{ route('satuan.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

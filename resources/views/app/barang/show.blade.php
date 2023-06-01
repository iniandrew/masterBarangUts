@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="p-5 rounded-3">
                        <div class="mb-3 text-center">
                            <i class="bi-file-text-fill fs-1"></i>
                            <h4>{{ $pageTitle }}</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <h5>{{ $barang->kode_barang }}</h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <h5>{{ $barang->nama_barang }}</h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="harga_barang" class="form-label">Harga Barang</label>
                                <h5>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="stok_barang" class="form-label">Stok Barang</label>
                                <h5>{{ $barang->stok_barang }}</h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                <h5>{{ $barang->deskripsi_barang }}</h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="satuan" class="form-label">Satuan Barang</label>
                                <h5>{{ $barang->satuan->nama_satuan }}</h5>
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
        </div>
    </div>
@endsection

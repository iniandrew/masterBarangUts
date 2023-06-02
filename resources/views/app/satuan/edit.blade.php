@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="p-5 bg-white rounded-3 border col-xl-6">

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kode_satuan" class="form-label">Kode Satuan</label>
                            <input class="form-control @error('kode_satuan') is-invalid @enderror" type="text" name="kode_satuan" id="kode_satuan" value="{{ $satuan->kode_satuan }}" placeholder="Masukan kode satuan">
                            @error('kode_satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nama_satuan" class="form-label">Nama Satuan</label>
                            <input class="form-control @error('nama_satuan') is-invalid @enderror" type="text" name="nama_satuan" id="nama_satuan" value="{{ $satuan->nama_satuan }}" placeholder="Masukan nama satuan">
                            @error('nama_satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('satuan.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <div class="container-sm mt-5">
        <div class="row justify-content-center">
            <div class="card row justify-content-center bg-white rounded-4">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <i class="bi-file-text-fill fs-1"></i>
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <form action="{{ route('barang.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input class="form-control @error('kode_barang') is-invalid @enderror" type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" placeholder="Masukan Kode Barang" maxlength="20">
                                @error('kode_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukan Nama Barang">
                                @error('nama_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga_barang" class="form-label">Harga Barang</label>
                                <input class="form-control @error('harga_barang') is-invalid @enderror" type="text" name="harga_barang" id="harga_barang" value="{{ old('harga_barang') }}" placeholder="Masukan Harga Barang">
                                @error('harga_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stok_barang" class="form-label">Stok Barang</label>
                                <input class="form-control @error('stok_barang') is-invalid @enderror" type="number" name="stok_barang" id="stok_barang" value="{{ old('stok_barang') }}" placeholder="Masukan Stok Barang">
                                @error('stok_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                <textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control @error('deskripsi_barang') is-invalid @enderror" placeholder="Masukan Deskripsi Barang">{{ old('deskripsi_barang') }}</textarea>
                                @error('deskripsi_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="satuans" class="form-label">Satuan</label>
                                <select name="satuan_id" id="satuans" class="form-select @error('satuan_id') is-invalid @enderror">
                                    <option value="">Pilih Satuan Barang</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}" {{ old('satuan_id') == $satuan->id ? 'selected' : '' }}>{{ $satuan->nama_satuan }}</option>
                                    @endforeach
                                </select>
                                @error('satuan_id')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#harga_barang').mask('000.000.000.000', {reverse: true});
            $('#satuans').select2({
                placeholder: "Pilih Satuan Barang",
                theme: 'bootstrap-5'
            });
        });
    </script>

@endpush

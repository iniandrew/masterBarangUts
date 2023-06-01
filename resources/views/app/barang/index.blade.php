@extends('layouts.app')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-row justify-content-between mb-4">
            <h4>{{ $pageTitle }}</h4>
            <a href="{{ route('barang.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-lg"></i>
                Tambah Barang
            </a>
        </div>

        <div class="table-responsive border rounded-4 shadow-sm bg-white">
            <table class="table table-bordered table-hover table-striped mb-0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Deskripsi Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Ditambahkan pada</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                        <td>{{ Str::words($barang->deskripsi_barang, 20, '...') }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>{{ $barang->satuan->nama_satuan }}</td>
                        <td>{{ \Illuminate\Support\Carbon::make($barang->created_at)->format('d M Y h:i:s') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-file-text-fill"></i></a>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                <div>
                                    <button type="button" class="btn btn-outline-dark btn-sm me-2" id="btn-delete"><i class="bi-trash"></i></button>

{{--                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pt-3 px-3 pb-0">
                {{ $barangs->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                buttons: {
                    cancel: "Batal",
                    confirm: "Hapus",
                }
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('delete' + id).submit();
                    } else {
                        swal('Dibatalkan!', {
                            buttons: false,
                            timer: 500,
                        });
                    }
                });
        }
    </script>
@endpush
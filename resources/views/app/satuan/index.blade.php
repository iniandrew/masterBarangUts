@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-row justify-content-between mb-4">
            <h4>{{ $pageTitle }}</h4>
            <a href="{{ route('satuan.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-lg"></i>
                Tambah Satuan
            </a>
        </div>

        <div class="table-responsive border rounded-4 shadow-sm bg-white">
            <table class="table table-bordered table-hover table-striped mb-0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Satuan</th>
                    <th>Nama Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($satuans as $satuan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-25">{{ $satuan->kode_satuan }}</td>
                        <td class="w-50">{{ $satuan->nama_satuan }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('satuan.show', $satuan->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-file-text-fill"></i></a>
                                <a href="{{ route('satuan.edit', $satuan->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                <div>
                                    <form action="{{ route('satuan.destroy', $satuan->id) }}" class="formDelete" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pt-3 px-3 pb-0">
                {{ $satuans->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.formDelete').submit(function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data barang yang menggunakan satuan ini akan terhapus juga!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        });
    </script>
@endpush

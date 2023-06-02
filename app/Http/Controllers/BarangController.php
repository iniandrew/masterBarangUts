<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    protected array $data;

    public function __construct(Request $request)
    {
        $this->data = collect($request->except(['harga_barang']))->merge([
            'harga_barang' => str_replace('.', '', $request->input('harga_barang')),
        ])->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.barang.index', [
            'pageTitle' => 'Management Barang',
            'barangs' => Barang::query()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.barang.create', [
            'pageTitle' => 'Tambah Barang',
            'satuans' => Satuan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $filteredData = $this->validateData();

        if ($filteredData->fails()) {
            return redirect()->back()->withErrors($filteredData)->with('error', 'Barang gagal ditambahkan')->withInput();
        }

        Barang::query()->create($filteredData->getData());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('app.barang.show', [
            'pageTitle' => 'Detail Barang',
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('app.barang.edit', [
            'pageTitle' => 'Edit Barang',
            'barang' => $barang,
            'satuans' => Satuan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang): RedirectResponse
    {
        $filteredData = $this->validateData($barang);

        if ($filteredData->fails()) {
            return redirect()->back()->withErrors($filteredData)->with('error', 'Barang gagal diperbarui')->withInput();
        }

        $barang->update($filteredData->getData());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang): RedirectResponse
    {
        $command = $barang->delete();

        return $command
            ? redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus')
            : redirect()->back()->with('error', 'Barang gagal dihapus');
    }

    public function validateData(?Barang $barang = null)
    {
        return Validator::make($this->data, [
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,'.$barang?->id,
            'nama_barang' => 'required|max:255|string',
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'deskripsi_barang' => 'required|string',
            'satuan_id' => 'required|exists:satuans,id',
        ], [
            'satuan_id.required' => 'satuan tidak boleh kosong',
            '*.required' => ':attribute tidak boleh kosong',
            '*.unique' => ':attribute sudah digunakan',
            '*.integer' => ':attribute harus berupa angka',
            '*.exists' => ':attribute tidak ditemukan',
            '*.max' => ':attribute maksimal :max karakter',
        ]);
    }
}

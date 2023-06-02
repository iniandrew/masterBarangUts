<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.satuan.index', [
            'pageTitle' => 'Management Satuan',
            'satuans' => Satuan::query()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.satuan.create', [
            'pageTitle' => 'Tambah Satuan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $filteredData = $this->validateData();

        if ($filteredData->fails()) {
            return redirect()->back()->withErrors($filteredData)->with('error', 'Satuan gagal ditambahkan')->withInput();
        }

        Satuan::query()->create($filteredData->getData());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan');
     }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        return view('app.satuan.show', [
            'pageTitle' => 'Detail Satuan',
            'satuan' => $satuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('app.satuan.edit', [
            'pageTitle' => 'Edit Satuan',
            'satuan' => $satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan): RedirectResponse
    {
        $filteredData = $this->validateData($satuan);

        if ($filteredData->fails()) {
            return redirect()->back()->withErrors($filteredData)->with('error', 'Satuan gagal diupdate')->withInput();
        }

        $satuan->update($filteredData->getData());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan): RedirectResponse
    {
        $command = $satuan->delete();

        return $command
            ? redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus')
            : redirect()->route('satuan.index')->with('error', 'Satuan gagal dihapus');
    }

    public function validateData(?Satuan $satuan = null)
    {
        return Validator::make($this->request->all(), [
            'kode_satuan' => 'required|string|max:10|unique:satuans,kode_satuan,' .$satuan?->id,
            'nama_satuan' => 'required|string|max:255',
        ], [
            '*.required' => ':attribute tidak boleh kosong',
            '*.max' => ':attribute maksimal :max karakter',
            '*.unique' => ':attribute sudah digunakan',
        ]);
    }
}

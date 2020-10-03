<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class CrudController extends Controller
{
    public function index()
    {
        // $data_barang = DB::table('data_barang')->get();

        $data_barang = DB::table('data_barang')->orderBy('id', 'DESC')->simplepaginate(5);
        return view('crud', ['data_barang' => $data_barang]);
    }
    // untuk menampilkan form tambah data
    public function tambah()
    {
        return view('crud-tambah-data');
    }
    // simpan data
    public function simpan(Request $request)
    {
        $this->_validation($request);

        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        DB::table('data_barang')->insert(
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
        );
        // return redirect()->route('crud')->with('message', 'Data berhasil disimpan');
        return redirect()->route('crud')->with(['simpan' => 'Data barang berhasil ditambahkan']);
    }
    // edit data
    public function edit($id)
    {
        $data_barang =  DB::table('data_barang')->where('id', $id)->first();
        return view('crud-edit-data', ['data_barang' => $data_barang]);
    }
    // hapus data
    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();
        // return redirect()->back()->with('message', 'Data berhasil dihapus');
        return redirect()->route('crud')->with(['hapus' => 'Data barang berhasil dihapus']);
    }
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'kode_barang' => 'required|max:10|min:3',
                'nama_barang' => 'required|max:100|min:3'
            ],
            [
                'kode_barang.required' => 'Harus diisi !!',
                'kode_barang.min' => 'Digit minimal 3',
                'kode_barang.max' => 'Digit maximal 10',
                'nama_barang.required' => 'Harus diisi!!',
                'nama_barang.min' => 'Digit minimal 3',
                'nama_barang.max' => 'Digit maximal 100',
            ],
        );
    }
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        DB::table('data_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('crud')->with(['update' => 'Data berhasil diupdate']);
    }
}
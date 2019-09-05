<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use App\Buku;
use DataTables;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.jenis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_jenis' => 'required|max:50',
        ]);
        Jenis::create([
            'nama_jenis' => $request->nama_jenis, 
        ]);
        return redirect('/u/j/jenis')->with('msgSuccess', 'jenis Buku Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('pages.jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);
        $this->validate($request,[
            'nama_jenis' => 'required|max:50',
        ]);
        $jenis->update([
            'nama_jenis' => $request->nama_jenis, 
        ]);
        return redirect('/u/j/jenis')->with('msgSuccess', 'jenis Buku Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::where('jenis_id', '=', $id)->get();
        $jenis = Jenis::findOrFail($id);
        // dd(count($buku) == 0 ? 'ya' : 'no');
        // dd($buku);
        if (count($buku) !== 0) {
            return redirect()->back()->with('msgWarning', 'Jenis Terpakai Oleh Salah Satu Buku');
        }
        $jenis->delete();
        return redirect()->back()->with('msgSuccess', 'Jenis Buku Berhasil Dihapus');
    }

    public function jenisDatatables()
    {
        $jenis = Jenis::query();

        return DataTables::of($jenis)
            ->addColumn('action', function ($jenis) {
                return view('master.action_', [
                    'user' => $jenis,
                    // 'url_show' => route('kategori.show', $kategoris->id),
                    'url_edit' => route('jenis.edit', $jenis->id),
                    'url_destroy' => route('jenis.delete', $jenis->id)
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}

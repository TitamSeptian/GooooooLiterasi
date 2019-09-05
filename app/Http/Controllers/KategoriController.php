<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use DataTables;
use App\User;
use App\Buku;

class KategoriController extends Controller
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
        // $user = User::find(Auth::user()->id);
        return view('pages.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategori.create');
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
            'nama_kategori' => 'required|max:50',
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('u/k/kategori')->with('msgSuccess', 'Kategori Berhasil Ditambah');
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
        $kategori = Kategori::findOrFail($id);
        return view('pages.kategori.edit', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);
        $this->validate($request,[
            'nama_kategori' => 'required|max:50',
        ]);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori, 
        ]);
        return redirect('u/k/kategori')->with('msgSuccess', 'Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "igasjgashgd";
        // return redirect('/home');
        $buku = Buku::where('kategori_id', $id)->get();
        $kategori = Kategori::findOrFail($id);
        if (count($buku) !== 0) {
            return redirect()->back()->with('msgWarning', 'Kategori Terpakai Oleh Salah Satu Buku');
        }
        $kategori->delete();
        return redirect('u/k/kategori')->with('msgSuccess', 'Kategori Berhasil Dihapus');
    }

    public function KategoriDatatables()
    {
        $kategoris = Kategori::query();

        return DataTables::of($kategoris)
            ->addColumn('action', function ($kategoris) {
                return view('master.action_', [
                    'user' => $kategoris,
                    // 'url_show' => route('kategori.show', $kategoris->id),
                    'url_edit' => route('kategori.edit', $kategoris->id),
                    'url_destroy' => route('kategori.delete', $kategoris->id)
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Jenis;
use App\Kategori;
use DB;
use DataTables;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
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
        return view('pages.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        $kategori = Kategori::all();
        // dd($jenis[0]->nama_jenis);
        return view('pages.book.create', [
            'jenis' => $jenis,
            'kategori' => $kategori,
        ]);
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
            'judul' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,svg',
            'no_isbn' => 'required|unique:bukus|max:17',
            // 'no_isbn_digital' => 'unique:bukus',
            'penerbit' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'jumlah_halaman' => 'required|numeric',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'kategori' => 'required',
        ]);
        $image = $request->cover;
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('cvr'), $new_name);
        Buku::create([
            'judul' => $request->judul,
            'cover' => $new_name,
            'no_isbn' => $request->no_isbn,
            'no_isbn_digital' => $request->no_isbn_digital,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'harga' => $request->harga,
            'jenis_id' => $request->jenis,
            'kategori_id' => $request->kategori,
            'sinopsis' => $request->sinopsis,
        ]);

        // return redirect('/u/bk/buku')->with('msgSuccess', 'Buku Berhasil Ditambahkan');
        return redirect("u/bk/buku")->with('msgSuccess', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->join('jenis', 'bukus.jenis_id', '=', 'jenis.id')
            ->select('bukus.*', 'kategoris.nama_kategori', 'jenis.nama_jenis')
            ->where('bukus.id' ,$id)
            ->first();
        // dd($buku);
            return view('pages.book.show', ['buku' => $buku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $jenis = Jenis::all();
        $kategori = Kategori::all();
        return view('pages.book.edit', [
            'buku' => $buku,
            'jenis' => $jenis,
            'kategori' => $kategori,
        ]);
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
        // dd($request->jenis);

        $cover_old = $request->cover_hidden;
        $buku = Buku::findOrFail($id);
        if ($request->cover) {
            if ($buku->cover != null) {
                unlink(public_path('cvr/' . $buku->cover));
            }
            $images = $request->file('cover');
            $new_name_edit = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('cvr'), $new_name_edit);
        } else {
            $new_name_edit = $buku->cover;
        }

        $this->validate($request,[
            'judul' => 'required',
            // 'cover' => 'image|mimes:jpeg,png,jpg,svg',
            'no_isbn' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'jumlah_halaman' => 'required|numeric',
            'harga' => 'required|numeric',
            // 'jenis_id' => 'required',
            // 'kategori_id' => 'required',
        ]);
        $buku->update([
            'judul' => $request->judul,
            'cover' => $new_name_edit,
            'no_isbn' => $request->no_isbn,
            'no_isbn_digital' => $request->no_isbn_digital,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'harga' => $request->harga,
            'jenis_id' => $request->jenis,
            'kategori_id' => $request->kategori,
        ]);

        return redirect('/u/bk/buku')->with('msgSuccess', 'Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect('u/bk/buku')->with('msgSuccess', 'Buku Berhasil Dihapus');
    }

    public function bukuDatatables()
    {
        $buku = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->join('jenis', 'bukus.jenis_id', '=', 'jenis.id')
            ->select('bukus.*', 'kategoris.nama_kategori', 'jenis.nama_jenis')
            ->get();
        // $buku = Buku::query();
        // $buku = Buku::all();
        // foreach ($buku as $q) {
        //     dd(var_dump($q));
        // }
        return DataTables::of($buku)
            ->addColumn('action', function ($buku) {
                return view('master.action_buku', [
                    'user' => $buku,
                    'url_show' => route('buku.show', $buku->id),
                    'url_edit' => route('buku.edit', $buku->id),
                    'url_destroy' => route('buku.delete', $buku->id)
                ]);
            })
            ->addColumn('img', function ($buku){
                return view('master.img', [
                    'buku_img' => $buku->cover,
                ]);
            })->rawColumns(['img','action'])
            ->addIndexColumn()
            ->make(true);
    }
}

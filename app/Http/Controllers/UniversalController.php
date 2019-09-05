<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Jenis;
use App\Kategori;
use App\Permintaan;
use App\Buku;
use DB;
use PDF;

class UniversalController extends Controller
{
    use AuthenticatesUsers {
    logout as performLogout;
    }

    
    public function index()
    {
        $year = DB::table('requests')->whereYear('created_at', '2019')
                ->get();
        $month = DB::table('requests')
                ->whereMonth('created_at', '12')
                ->get();
    	return view('home');
    }

    public function login()
    {
    	return view('pages.user_login.login');
    }

    public function register()
    {
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    	return view('pages.user_login.register', ['bulan' => $bulan]);
    }

    public function pilih()
    {
        $jenis = Jenis::all();
        $kategori = Kategori::all();
    	return view('pages.pilih.pilih',[
            'jenis' => $jenis,
            'kategori' => $kategori,
        ]);
    }

    public function pilih_buku(Request $request)
    {
        $jenis = Jenis::all();
        $kategori = Kategori::all();

        $kategori_data = '';
        $kategori_res= '';
        $jenis_res= '';
        $kategori_wh ='';
        $f_kategori= [];
        $f_jenis= [];
        if(!empty($request->ck_k)){
            // Loop to store and display values of individual checked checkbox.
            foreach($request->ck_k as $q){
                $kategori_data = $kategori_data. "$q,";
            }
            $kategori_res = substr($kategori_data, 0, strlen($kategori_data) -1 );
            $f_kategori = explode(',', $kategori_res);
        }
        // dd($kategori_wh_res);

        $jenis_data = '';
        if(!empty($request->ck_j)){
            // Loop to store and display values of individual checked checkbox.
            foreach($request->ck_j as $q){
                $jenis_data = $jenis_data. "$q,";
            }
            $jenis_res = substr($jenis_data, 0, strlen($jenis_data) -1 );
            $f_jenis = explode(',', $jenis_res);
        }
        
        $buku = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->join('jenis', 'bukus.jenis_id', '=', 'jenis.id')
            ->select('bukus.*', 'kategoris.nama_kategori', 'jenis.nama_jenis')
            ->whereIn('nama_kategori', $f_kategori)
            ->WhereIn('nama_jenis', $f_jenis)
            ->whereBetween('jumlah_halaman', [$request->tebal_min, $request->tebal_max])
            ->orWhereBetween('tahun_terbit', [$request->tahun_awal, $request->tahun_akhir])
            ->orWhereBetween('harga', [$request->harga_awal, $request->harga_akhir])
            ->get();
            // dd($buku);
            // dd($request->harga_akhir);
        Permintaan::create([
                'kategori'=> $kategori_res,
                'jenis'=> $jenis_res,
                'tebal_min' => $request->tebal_min,
                'tebal_max' => $request->tebal_max,
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'harga_awal' => $request->harga_awal,
                'harga_akhir' => $request->harga_akhir,
        ]);

        // dd($jenis_res);
        // if ($buku != null){
            return view('pages.pilih.result',[
                        'buku' => $buku,
                    ]); 
        // }else{
        //     return view('pages.pilih.result', ['buku' => $buku == ['Ko']]);
        // }
        

    }

    public function detail($id)
    {
        $buku = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->join('jenis', 'bukus.jenis_id', '=', 'jenis.id')
            ->select('bukus.*', 'kategoris.nama_kategori', 'jenis.nama_jenis')
            ->where('bukus.id' ,$id)
            ->get();

        return view('pages.pilih.detail', compact('buku'));
    }

    public function lapPdf()
    {
        $req = Permintaan::all();
        $output = '';
        $i =1;
        $output .=
        '<h2>Semua Laporan</h2>
            <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Tebal Minimal</th>
                        <th>Tebal Maximal</th>
                        <th>Harga Minimal</th>
                        <th>Harga Maximal</th>
                        <th>Tahun Awal</th>
                        <th>Tahun Akhir</th>
                    </tr>
                </thead>
                <tbody>
                '
                    ;
        foreach ($req as $q) {
            $output .= "
                <tr>
                    <td>".$i++."</td>
                    <td>".$q['jenis']."</td>
                    <td>".$q['kategori']."</td>
                    <td>".$q['tebal_min']."</td>
                    <td>".$q['tebal_max']."</td>
                    <td>".$q['harga_awal']."</td>
                    <td>".$q['harga_akhir']."</td>
                    <td>".$q['tahun_awal']."</td>
                    <td>".$q['tahun_akhir']."</td>
                </tr>
            ";
        }

        $output .= '</tbody>
                </table>';
        return $output;
    }

    public function lapPdfResult()
    {
        $today = date('YdmGi');
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->lapPdf())->setPaper('a4', 'landscape');
        return $pdf->download('request_'.$today.'.pdf');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function custonLogout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('my.register');
    }
}

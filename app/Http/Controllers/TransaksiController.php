<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Barang;
use \App\Transaksi;
use \DB;
class TransaksiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $transaksi = Transaksi::getTransaksi();
        return view('transaksi', compact('transaksi'));
        //return response()->json($transaksi);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('tambah-transaksi', compact('barangs'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $id = DB::table('transaksi')->insertGetId(
	      ['kode_transaksi' => $request->kode_transaksi, 'tanggal' => $request->tgl_transaksi]
	    );
          for ($i=0; $i < count($request->barang) ; $i++) { 
          		DB::table('transaksi_barang')->insert(['barang_id'=> $request->barang[$i], 'transaksi_id'=> $id]);
          }
       

        return redirect('tambah-data-transaksi')->with('success','Data Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('edit-transaksi', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::getIdTransaksi($id);
        $barangs = Barang::all();
       
        return view('edit-transaksi', array('transaksi' => $transaksi[0], 'barangs' => $barangs));
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
        
        DB::table('transaksi')->where('id', $id)->update(['kode_transaksi' => $request->kode_transaksi, 'tanggal' => $request->tgl_transaksi]);
        $tredit = [];
        DB::table('transaksi_barang')->where('transaksi_id', $id)->delete();
          for ($i=0; $i < count($request->barang) ; $i++) { 
                
                DB::table('transaksi_barang')->insert(['barang_id'=> $request->barang[$i], 'transaksi_id'=> $id]);
                 //$tredit[] = $request->barang[$i]." ". $id;

          }
       
        return redirect('data-transaksi')->with('success', 'succees edit ');
        ///return response()->json($tredit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('transaksi')->where('id', $id)->delete();      
        DB::table('transaksi_barang')->where('transaksi_id', $id)->delete();

          
       
        return redirect('data-transaksi')->with('success', 'Berhasil Menghapus Data');    }

   
   
}

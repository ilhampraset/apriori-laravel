<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;
class Transaksi extends Model
{
    public static function getTransaksi() {
    	$transaksi= array();
        
        $trdata = DB::table('transaksi')->get();
        foreach ($trdata as $d) {
        	$arr['id'] = $d->id;
            $arr['kode_transaksi'] = $d->kode_transaksi;
        	$arr['tanggal'] = $d->tanggal;
        	$arr['barang'] = array();
        	$arr2 = array();
        	foreach (Transaksi::getDataTransaksiBarang($d->id) as  $value) {
        		$arr2 = array('nama_barang' => $value->nama_barang, 'kode_barang' => $value->kode_barang);
        		array_push($arr['barang'], $arr2);

        	}
        	array_push($transaksi, $arr );
        	
        }
     
        return $transaksi;
    }

     public static function getIdTransaksi($id) {
        $transaksi= array();
        
        $trdata = DB::table('transaksi')->where('id', $id)->get();
        foreach ($trdata as $d) {
            $arr['id'] = $d->id;
            $arr['kode_transaksi'] = $d->kode_transaksi;
            $arr['tanggal'] = $d->tanggal;
            $arr['barang'] = array();
            $arr2 = array();
            foreach (Transaksi::getDataTransaksiBarang($d->id) as  $value) {
                $arr2 = array('id_barang'=> $value->id_barang, 'nama_barang' => $value->nama_barang, 'kode_barang' => $value->kode_barang);
                array_push($arr['barang'], $arr2);

            }
            array_push($transaksi, $arr );
            
        }
     
        return $transaksi;
    }

    public static function getDataTransaksiBarang($id) {
    	$data = DB::table('transaksi')
        ->join('transaksi_barang', 'transaksi_barang.transaksi_id','=', 'transaksi.id')
        ->join('barang', 'transaksi_barang.barang_id', '=', 'barang.id')
        ->select('transaksi.id AS id_transaksi', 'transaksi.tanggal', 'transaksi.tanggal','transaksi.kode_transaksi','transaksi_barang.barang_id', 'transaksi_barang.id as id_transaksi_barang','barang.kode_barang', 'barang.nama_barang', 'barang.id as id_barang')->where('transaksi.id', '=', $id)->get();
       return $data;
    }

    public static function getNamaBarang($kode_barang) {
       $res =  DB::table('barang')->select('nama_barang')->where('kode_barang', $kode_barang)->first();
       return $res->nama_barang;
    }
}

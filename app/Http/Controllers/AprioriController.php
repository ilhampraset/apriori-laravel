<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use App\Transaksi;
use App\Setting;
use App\Libraries\Apriori as Apriori2;
class AprioriController extends Controller
{

    public function dashboard()
    {   
        $barang = count(DB::table('barang')->get());
        $transaksi = count(Transaksi::getTransaksi());
        //$result = $this->calculate();
       
        $assoc = count($this->resultApriori());
        $arr =$this->resultApriori();
         $result = array_splice($arr, 0,5);   
        return view('dashboard', compact('barang','transaksi','assoc', 'result'));     
    }
    public function index(Request $request)
    {   
        /*$barang = DB::table('barang')->get();
        $transaksi = Transaksi::getTransaksi();
        $result = $this->calculate();*/
       
        $result = $this->resultApriori();
            
        return view('home', compact('result'));     
    }

    public function filter(Request $request)
    {   
        /*$barang = DB::table('barang')->get();
        $transaksi = Transaksi::getTransaksi();
        $result = $this->calculate();*/
       
        $result = $this->testApriori($request->support, $request->confidence);
            
        return view('home', compact('result'));     
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
        $barang = Barang::find($id);
        return view('edit-barang', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $barang = Barang::find($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->update(); 
        return redirect('data-barang')->with('success',$barang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('data-barang')->with('success', 'Berhasil Menghapus Data');
    }


    public function calculate()
    {   
        
        $transaksi = Transaksi::getTransaksi();
        
        $result = [];
        $result2 = [] ;

        for($i = 0 ; $i < count($transaksi); $i++) {
            $result[] = $transaksi[$i]['barang']; 
        }
      
        return $result;
    }
    public function test($data) {
        $aa = [];
        $barang = Barang::all();
        for($a= 0; $a < count($barang);$a++)
        {  
            $cc= [];
             for($i=0; $i < count($data);$i++){
               if($data[$i]['kode_barang'] == $barang[$a]['kode_barang']){
                $cc[] = 1 /*$data[$i]['kode_barang'].'='.$barang[$a]['kode_barang'].'= 1 '*/;
               }else {
                $cc[] = 0;
               }
            }
            $aa[] = $cc;
        } 
       
        return $aa;
    }
    private function testApriori($support = 0.01, $confidence = 0.1) {
        
        $associator = new Apriori($support, $confidence);
        $dataset   = array();
        $barang = $this->calculate();
        $len = count($barang);
        for($i=0;$i < $len;$i++){
            $b = [];
            $num = count($barang[$i]);
            for($a=0;$a < $num ; $a++) {
                $b[] = $barang[$i][$a]['nama_barang'];      
            }
            $dataset[] = $b;
        }
        for($a=0;$a < 10 ; $a++) {
                $dataset2[] = $dataset[$a];      
        }
        
        $samples= $dataset2;
        $labels  = [];
        $associator->train($samples, $labels);
        $rules = $associator->getRules();
        $len= count($rules);
        $data = [];

        for($i=1; $i < $len; $i++){
            $in['rule'] = implode(',', $rules[$i]['antecedent']).' => '.implode(',', $rules[$i]['consequent']);
            $in['support'] =$rules[$i]['support'];
            $in['confidence'] =$rules[$i]['confidence'];
            $data[] = $in;
        }
       
        return $data; 
    } 
    
    public function resultApriori(){
       $Apriori = new Apriori2();
        $Apriori->setMaxScan(20);       //Scan 2, 3, ...
        $Apriori->setMinSup(Setting::minSup());         //Minimum support 1, 2, 3, ...
        $Apriori->setMinConf(Setting::minConf());       //Minimum confidence - Percent 1, 2, ..., 100
        $barang = $this->calculate();
        $len = count($barang);
        $dataset = [];
        for($i=0;$i < $len;$i++){
            $b = [];
            $num = count($barang[$i]);
            for($a=0;$a < $num ; $a++) {
                $b[] = $barang[$i][$a]['nama_barang'];    
            }
            $dataset[] = $b;
        }
        $Apriori->process($dataset); 
        return $Apriori->getAssociationRules();
    }

}

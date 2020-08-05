<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//include 'vendor/autoload.php';

use App\Barang;
use App\Transaksi;
//use App\Libraries\Apriori;
use Phpml\Association\Apriori;
use Phpml\NeuralNetwork\Layer;
use Phpml\NeuralNetwork\Node\Neuron;
use Phpml\NeuralNetwork\ActivationFunction\PReLU;
use Phpml\NeuralNetwork\ActivationFunction\Sigmoid;
use Phpml\Classification\MLPClassifier;

//Route::get('/', 'AprioriController@index');
Route::get('/', 'AprioriController@dashboard');
Route::get('home', 'AprioriController@dashboard');
Route::get('association-rule', 'AprioriController@index');
Route::get('tambah-data-barang', function() {
	return view('tambah-barang');
});


Route::get('data-barang', 'BarangController@index');
Route::post('barang', 'BarangController@store');
Route::get('barang/{id}', 'BarangController@show');
Route::put('barang/{id}/update', 'BarangController@update');
Route::get('barang/{id}/delete', 'BarangController@destroy');


Route::get('tambah-data-transaksi', 'TransaksiController@create');
//Route::get('data-transaksi', 'BarangController@index');
Route::post('transaksi', 'TransaksiController@store');
Route::get('association-rule/support/{support}/confidence/{confidence}', 'AprioriController@filter');
Route::get('barang/{id}', 'BarangController@show');
Route::put('barang/{id}/update', 'BarangController@update');
Route::delete('barang/{id}/delete', 'BarangController@destroy');
Route::get('data-transaksi', 'TransaksiController@index');
Route::get('transaksi/{id}', 'TransaksiController@edit');
Route::put('transaksi/{id}/update', 'TransaksiController@update');
Route::get('transaksi/{id}/delete', 'TransaksiController@destroy');
Route::get('setting', 'SettingController@index');
Route::post('setting', 'SettingController@update');
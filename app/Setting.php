<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';

    public $timestamps = false;

    public static function minSup() {
        return DB::table('setting')->select('minSup')->first()->minSup;
    }
    public static function minConf() {
        return DB::table('setting')->select('minConf')->first()->minConf;
    }
}

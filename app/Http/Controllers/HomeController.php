<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function getIndex(){
        return view('welcome');
    }

    public function import(Request $request){
        $new_file = array();
        $file = file_get_contents($request->file('file'));
        $file = preg_split('/\r\n/', $file);
        $file = array_filter($file);
        sort($file);
        foreach ($file as $key => $value) {
            $new_file[] = preg_split('/\t/', $value);
        }
        // dd($new_file);
        foreach ($new_file as $key => $value) {
            if(count($value) == 12){
                if(substr($value[11], 0, 2) == 'DK'){
                    DB::table('users')->insert([
                        'email' => $value[3],
                        'tanggal' => $value[0] .' '. $value[1],
                        'jam' => $value[2],
                        'H' => $value[4],
                        'IP' => $value[5],
                        'P' => $value[6],
                        'X' => $value[7],
                        'CV' => $value[8],
                        'PRX' => $value[9],
                        'S' => $value[10],
                        'DKIM' => $value[11],
                    ]);
                }
                else if(substr($value[11], 0, 2) == 'id'){
                    DB::table('users')->insert([
                        'email' => $value[3],
                        'tanggal' => $value[0] .' '. $value[1],
                        'jam' => $value[2],
                        'H' => $value[4],
                        'IP' => $value[5],
                        'P' => $value[6],
                        'X' => $value[7],
                        'CV' => $value[8],
                        'PRX' => $value[9],
                        'S' => $value[10],
                        'id' => $value[11],
                    ]);
                }
            }
            else if(count($value) == 11){
                DB::table('users')->insert([
                    'email' => $value[3],
                    'tanggal' => $value[0] .' '. $value[1],
                    'jam' => $value[2],
                    'H' => $value[4],
                    'IP' => $value[5],
                    'P' => $value[6],
                    'X' => $value[7],
                    'CV' => $value[8],
                    'PRX' => $value[9],
                    'S' => $value[10],
                ]);
            }
            else{
                DB::table('users')->insert([
                    'email' => $value[3],
                    'tanggal' => $value[0] .' '. $value[1],
                    'jam' => $value[2],
                    'H' => $value[4],
                    'IP' => $value[5],
                    'P' => $value[6],
                    'X' => $value[7],
                    'CV' => $value[8],
                    'PRX' => $value[9],
                    'S' => $value[10],
                    'DKIM' => $value[11],
                    'id' => $value[12],
                ]);
            }
        }
        return back()->withStatus('success');
    }

    public function export(){
        return Excel::download(new UserExport, 'livya.xlsx');
    }
}

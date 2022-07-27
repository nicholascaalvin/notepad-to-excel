<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user_data = DB::table('users')->select('tanggal', 'jam', 'email', 'H', 'IP','P', 'X', 'CV', 'PRX', 'S', 'DKIM', 'id')->get();
        return $user_data;
        // return User::all();
    }

    public function headings(): array{
        // return [];
        return ['tanggal', 'jam', 'email', 'H', 'IP','P', 'X', 'CV', 'PRX', 'S', 'DKIM', 'id'];
    }
}

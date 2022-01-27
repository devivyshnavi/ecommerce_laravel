<?php

namespace App\Exports;

use App\Models\User_order;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User_order::all();
    }
}

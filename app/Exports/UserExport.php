<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            'Id',
            'firstName',
            'lastname',
            'Email',
            'role',
            'status'
        ];
    }
}

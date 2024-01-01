<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Role',
            'Kelas',
            'Status',
        ];
    }

    public function collection()
    {
        return User::all();
    }

    public function map($users): array
    {
        return [
            $users->name,
            $users->email,
            $users->role,
            $users->kelas->nama_kelas,
            $users->status,
        ];
    }
}

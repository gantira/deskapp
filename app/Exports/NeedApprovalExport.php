<?php

namespace App\Exports;

use App\Models\Contractor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NeedApprovalExport implements FromCollection, WithHeadings, WithStyles
{
    public function headings(): array
    {
        return [
            'NIK',
            'DESKRIPSI ID',
            'NAMA',
            'EMAIL',
            'PASSWORD',
            'NO HP',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Contractor::query()
            ->where('status_approval', 1)
            ->orderBy('username', 'desc')
            ->get()->map(function ($value) {
                $strRan = Str::random(8);
                return [
                    'username' => $value->username,
                    'deskripsi' => $value->deskripsi,
                    'nama' => $value->nama,
                    'email' => $value->email,
                    'password' => Str::replace(substr($strRan, 0, 1), Str::upper(substr($strRan, 0, 1)), $strRan),
                    'telp' => $value->telp,
                ];
            });
    }
}

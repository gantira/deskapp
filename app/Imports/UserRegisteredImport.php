<?php

namespace App\Imports;

use App\Models\MailMessage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UserRegisteredImport implements ToModel, WithStartRow, WithCustomCsvSettings, WithBatchInserts
{
    public $batch;

    public function __construct($batch)
    {
        $this->batch = $batch;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MailMessage([
            'batch_id' => $this->batch->id,
            'nik'      => $row[0],
            'name'     => $row[1],
            'email'    => $row[2],
            'password' => $row[3],
            'flag_id' => 5,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}

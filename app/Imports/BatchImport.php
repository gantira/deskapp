<?php

namespace App\Imports;

use App\Models\Message;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BatchImport implements ToModel, WithStartRow, WithBatchInserts
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

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Message([
            'batch_id' => $this->batch->id,
            'nik'      => $row[0],
            'name'     => $row[1],
            'email'    => $row[2],
            'password' => $row[3],
            'subject'  => formattedText($this->batch->formatted_subject, $row),
            'body'     => formattedText($this->batch->formatted_body, $row),
            'flag_id'  => 5,
        ]);
    }
}

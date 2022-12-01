<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use App\Imports\BatchImport;
use App\Models\Batch;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class BatchList extends AdminComponent
{
    use WithFileUploads;

    public $fileUpload;
    public $perihal;
    public $formatted_subject = 'User ID [nik] sudah teregistrasi';
    public $formatted_body;

    protected $rules = [
        'perihal' => 'required|string',
        'formatted_subject' => 'required|string',
        'formatted_body' => 'required|string',
        'fileUpload' => 'required|file|mimes:xls|max:1024',
    ];

    public function createBatch()
    {
        $this->validate();

        $batch = Batch::create([
            'user_id' => auth()->user()->id,
            'perihal' => $this->perihal,
            'formatted_subject' => $this->formatted_subject,
            'formatted_body' => $this->formatted_body,
        ]);

        Excel::import(new BatchImport($batch), $this->fileUpload);

        session()->flash('success', 'New batch uploaded!');

        $this->reset();

        $this->dispatchBrowserEvent('hide-form');
    }

    public function render()
    {
        $batches = Batch::withCount(['messages as messages_sent' => function ($query) {
            $query->where('flag_id', 6);
        }])->orderBy('created_at', 'desc')->paginate($this->perPage);

        return view('livewire.emails.batch-list', [
            'batches' => $batches,
        ]);
    }
}

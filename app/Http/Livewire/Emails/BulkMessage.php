<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use App\Imports\UserRegisteredImport;
use App\Models\Batch;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class BulkMessage extends AdminComponent
{
    use WithFileUploads;

    public $fileUpload;
    public $perihal;

    protected $rules = [
        'perihal' => 'required|string',
        'fileUpload' => 'required|file|max:1024',
    ];

    protected $validationAttributes = [
        'fileUpload' => 'csv',
    ];


    public function createBatch()
    {
        $this->validate();

        $batch = Batch::create([
            'user_id' => auth()->user()->id,
            'perihal' => $this->perihal,
        ]);

        Excel::import(new UserRegisteredImport($batch), $this->fileUpload);

        session()->flash('success', 'New batch uploaded successfully!');

        return redirect()->route('email.bulk');
    }
    public function render()
    {
        $bathes = Batch::withCount('mailMessages')->orderBy('created_at', 'desc')->paginate($this->perPage);

        return view('livewire.emails.bulk-message', [
            'batches' => $bathes
        ]);
    }
}

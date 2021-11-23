<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use App\Mail\SendMessage;
use App\Models\Batch;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class BatchView extends AdminComponent
{
    public $batchId;
    public $batch;

    public function mount($batch)
    {
        $this->batchId = $batch;
    }

    public function sendAll()
    {
        Message::where('batch_id', $this->batchId)->get()->each(function ($message) {
            if ($message->flag_id != 6) {
                Mail::send(new SendMessage($message));

                $message->update(['flag_id' => 6]);

                // check for failures
                if (Mail::failures()) {
                    session()->flash('failure', 'Send Email Failure!');

                    return redirect()->back();
                }
            }
        });

        session()->flash('info', "Bulk messaging on batch {$this->batch->perihal}. <b>All Sent</b>!");
    }

    public function getCompleteProperty()
    {
        return $this->batch->messages_count == $this->batch->messages_sent;
    }

    public function render()
    {
        $this->batch = Batch::withCount(['messages as messages_sent' => function ($query) {
            return $query->where('flag_id', 6);
        }])->where('id', $this->batchId)->first();

        $messages = Message::where('batch_id', $this->batchId)->paginate($this->perPage);

        return view('livewire.emails.batch-view', [
            'messages' => $messages,
        ]);
    }
}

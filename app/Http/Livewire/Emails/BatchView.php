<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use App\Mail\SendMessage;
use App\Models\Batch;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class BatchView extends AdminComponent
{
    public $batch;

    public function mount(Batch $batch)
    {
        $this->batch = $batch;
    }

    public function sendAll()
    {
        Message::where('batch_id', $this->batch->id)->get()->each(function ($message) {
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

        return redirect()->back();
    }

    public function render()
    {
        $messages = Message::where('batch_id', $this->batch->id);
        $complete = $messages->where('flag_id', 6)->count() == $this->batch->messages_count;

        return view('livewire.emails.batch-view', [
            'messages' => $messages->paginate($this->perPage),
            'complete' => $complete,
        ]);
    }
}

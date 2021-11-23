<?php

namespace App\Http\Livewire\Emails;

use App\Mail\SendRawMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Compose extends Component
{
    public $message = [
        'email' => '',
        'subject' => '',
        'body' => '',
    ];

    protected $rules = [
        'message.email' => 'required|email',
        'message.subject' => 'required',
        'message.body' => 'nullable',
    ];

    protected $validationAttributes = [
        'message.email' => 'email',
        'message.subject' => 'subject',
    ];

    public function sendEmail()
    {
        $this->validate();

        Mail::send(new SendRawMessage($this->message));

        // check for failures
        if (Mail::failures()) {
            session()->flash('failure', 'Send Email Failure!');

            return redirect()->route('email.compose');
        }

        session()->flash('sent', 'Email sent!');

        return redirect()->route('email.compose');
    }

    public function render()
    {
        return view('livewire.emails.compose');
    }
}

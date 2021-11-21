<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Webklex\IMAP\Facades\Client;

class EmailList extends AdminComponent
{

    public $body;
    public $subject;
    public $from;
    public $to;
    public $date;

    public function getMessageByUid($uid)
    {
        $data = $this->folders->query()->getMessageByUid($uid);

        $this->body = $data->getHTMLBody();
        $this->subject = $data->getAttributes()['subject'][0];
        $this->from = $data->getAttributes()['fromaddress'][0];
        $this->to = $data->getAttributes()['toaddress'][0];
        $this->date = $data->getAttributes()['date'][0]->toArray()['formatted'];

        $this->dispatchBrowserEvent('show-form');
    }

    public function getClientProperty()
    {
        $client = Client::account('default');

        return $client->connect();
    }

    public function getFoldersProperty()
    {
        return $this->client->getFolder($this->menu);
    }

    public function render()
    {
        $messages = $this->folders->query()
            ->all()
            ->softFail()
            ->setFetchBody(false)
            ->setFetchFlags(false)
            ->paginate($this->perPage, $this->page, $this->pageName);

        return view('livewire.emails.email-list', [
            'messages' => $messages,
            'inboxCount' => $this->client->getFolder('INBOX')->query()->unseen()->count(),
        ]);
    }
}

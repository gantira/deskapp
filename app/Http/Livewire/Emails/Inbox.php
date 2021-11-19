<?php

namespace App\Http\Livewire\Emails;

use App\Http\Livewire\AdminComponent;
use Webklex\IMAP\Facades\Client;

class Inbox extends AdminComponent
{

    public function render()
    {
        $client = Client::account('default');
        $client->connect();

        $folders = $client->getFolder('INBOX');

        $messages = $folders->query()
            ->all()
            ->setFetchBody(false)
            ->paginate($this->perPage, $this->page, $this->pageName);

        return view('livewire.emails.inbox', [
            'messages' => $messages,
            'inboxCount' => $folders->query()->unseen()->count(),
            'sentCount' => '',
        ]);
    }
}

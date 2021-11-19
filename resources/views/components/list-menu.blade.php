@props(['inboxCount' => '', 'sentCount' => ''])

<button class="btn btn-primary btn-lg btn-block">Compose</button>
<div class="list-group mt-15">
    <a href="{{ route('email.inbox') }}" class="list-group-item list-group-item-action d-flex justify-content-between active">
        Inbox
        <span class="badge badge-primary badge-pill">{{ $inboxCount }}</span>
    </a>
    <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between">
        Sent
        <span class="badge badge-primary badge-pill">{{ $sentCount }}</span>
    </button>
    <button type="button" class="list-group-item list-group-item-action ">Junk</button>
    <button type="button" class="list-group-item list-group-item-action">Drafts</button>
    <button type="button" class="list-group-item list-group-item-action" disabled>Trash</button>
</div>

<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Email</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Email</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <button class="btn btn-primary btn-lg btn-block">Compose</button>
                        <div class="list-group mt-15">
                            <button wire:click="$set('menu', 'INBOX')"
                                class="list-group-item list-group-item-action d-flex justify-content-between {{ $menu == 'INBOX' ? 'active' : '' }}">
                                Inbox
                                <span class="badge badge-primary badge-pill">{{ $inboxCount }}</span>
                            </button>
                            <button wire:click="$set('menu', 'Sent')"
                                class="list-group-item list-group-item-action d-flex justify-content-between {{ $menu == 'Sent' ? 'active' : '' }}">
                                Sent
                            </button>
                            <button type="button" class="list-group-item list-group-item-action ">Junk</button>
                            <button type="button" class="list-group-item list-group-item-action">Drafts</button>
                            <button type="button" class="list-group-item list-group-item-action" disabled>Trash</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="d-flex justify-content-center">
                            <div wire:loading.delay>
                                <i class="fa fa-spinner fa-spin"></i>
                                Loading..
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless"
                                wire:loading.class="text-muted text-decoration-none">
                                <tbody>
                                    @forelse($messages as $message)
                                    <tr>
                                        <td>
                                            @if ($message->getFlags()->count())
                                            <i class="icon-copy fa fa-circle" aria-hidden="true"></i>
                                            @else
                                            <i class="icon-copy fa fa-circle text-orange-50" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:;"
                                                wire:click="getMessageByUid({{ $message->getUid() }})">
                                                <div class="d-flex justify-content-between">
                                                    <div class="font-12">
                                                        <small>
                                                            From: {{ $message->getFrom() }} To: {{ $message->getTo() }}
                                                        </small>
                                                    </div>
                                                    <small class="text-nowrap">{{ formattedDate($message->getDate())
                                                        }}</small>
                                                </div>
                                                @if ($message->getFlags()->count())
                                                {{ $message->getSubject() }}
                                                @else
                                                <span class="font-weight-bold">{{ $message->getSubject() }}</span>
                                                @endif

                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Messege</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>

                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div wire:ignore.self class="modal fade bs-example-modal-lg" id="form" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">{{ $subject }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <code>
                            From: {{ $from }} <br/>
                            To: {{ $to }} <br/>
                            Date: {{ formattedDate($date) }} <br/>
                        </code>
                        <p>{!! $body !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

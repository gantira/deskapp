@props(['messages' => []])

<div wire:loading.delay>
    Loading..
</div>

<div class="table-responsive">
    <table class="table table-hover table-borderless" wire:loading.class="text-muted text-decoration-none">
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
                    <a href="#">
                        <div class="d-flex justify-content-between">
                            <small>{{ $message->getFrom() }}</small>
                            <small>{{ formattedDate($message->getDate()) }}</small>
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

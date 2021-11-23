<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Bulk Message</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item " aria-current="page"><a href="{{ route('email.batch') }}">Bulk Message</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $batch->perihal }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-lg-12 mb-30">
                    <x-alert-message />

                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Perihal : {{ $batch->perihal }}</h4>
                            </div>
                            <div class="pull-right">
                                <a href="task-add" wire:click.prevent='sendAll'
                                    class="bg-light-blue btn text-blue weight-500"><i class="icon-copy dw dw-paper-plane"></i>
                                    Send All</a>
                            </div>
                        </div>

                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nik</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $index => $item)
                                <tr>
                                    <td>{{ $messages->firstItem() + $index }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->password }}</td>
                                    <td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">{{ $item->flag_name }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $messages->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

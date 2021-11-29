<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Approval</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Approval</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button wire:click="export" class="btn btn-secondary">Export csv</button>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-lg-12 mb-30">
                    <x-alert-message />

                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">NEED TO BE APPROVED</h4>
                            </div>
                            <div class="pull-right">
                                <input wire:model="search" type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($approvals as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $approvals->firstItem() + $index }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->status_approval }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-muted text-center">Data empty</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        {{ $approvals->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

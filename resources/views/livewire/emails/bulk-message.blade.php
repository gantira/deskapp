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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bulk Message</li>
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
                                <h4 class="text-blue h4"></h4>
                            </div>
                            <div class="pull-right">
                                <a href="task-add" data-toggle="modal" data-target="#task-add"
                                    class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i>
                                    Add</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Perihal</th>
                                    <th scope="col">Mail Message(s)</th>
                                    <th scope="col">Uploaded At</th>
                                    <th scope="col">Uploaded By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batches as $index => $item)
                                <tr>
                                    <th scope="row">{{ $batches->firstItem() + $index }}</th>
                                    <td>{{ $item->perihal }}</td>
                                    <td>{{ $item->mail_messages_count }}</td>
                                    <td>{{ $item->created_at->toFormattedDate() }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ route('email.batch.view', $item) }}"><i
                                                        class="dw dw-eye"></i>
                                                    View</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                    Delete</a>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $batches->links() }}
                    </div>
                </div>
            </div>

            @if ($batch)
            <div class="row clearfix">
                <div class="col-md-8 col-lg-12 mb-30">
                    <div class="faq-wrap">
                        <h4 class="mb-20 h4 text-blue" data-toggle="collapse" data-target="#faq1"></h4>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block" data-toggle="collapse" data-target="#batch">
                                        Batch : {{ $batch->perihal }}
                                    </button>
                                </div>
                                <div id="batch" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nik</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Flag</th>
                                                    <th class="datatable-nosort">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($batchMessages as $item)
                                                <tr>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->password }}</td>
                                                    <td>{{ $item->flag_name }}</td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a href="#" data-color="#265ed7"><i
                                                                    class="icon-copy dw dw-edit2"></i></a>
                                                            <a href="#" data-color="#e95959"><i
                                                                    class="icon-copy dw dw-delete-3"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">Data Empty</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $batchMessages->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent="createBatch">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Batch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-0">
                        <div class="task-list-form">
                            <ul>
                                <li>
                                    <div class="form-group row">
                                        <label class="col-md-4">Perihal</label>
                                        <div class="col-md-8">
                                            <input wire:model.defer='perihal' type="text"
                                                class="form-control @error('perihal') is-invalid @enderror">
                                            @error('perihal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Upload XLS</label>
                                        <div class="col-md-8">
                                            <input wire:model='fileUpload' type="file" accept=".xls"
                                                class="form-control @error('fileUpload') is-invalid @enderror">
                                            @error('fileUpload')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <i class="icon-copy dw dw-file-38"></i>
                                            <a href="{{ asset('template_batch.xls') }}"><small
                                                    class="font-italic weight-200">
                                                    download template csv</small></a>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-copy dw dw-upload2"></i>
                            Upload User CSV
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

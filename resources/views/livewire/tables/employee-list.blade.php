<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Employees</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employees</li>
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
                                <input wire:model="search" type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last Modified Password</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $employees->firstItem() + $index }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->last_pass_time }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-muted text-center">Data empty</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        {{ $employees->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

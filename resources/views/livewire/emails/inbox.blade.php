<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Inbox</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <x-list-menu :inboxCount="$inboxCount" :sentCount="$sentCount" />
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <x-table-message :messages="$messages"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

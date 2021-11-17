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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inbox</li>
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
                            <button type="button"
                                class="list-group-item list-group-item-action d-flex justify-content-between active">
                                Inbox
                                <span class="badge badge-primary badge-pill">14</span>
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Sent</button>
                            <button type="button" class="list-group-item list-group-item-action ">Important</button>
                            <button type="button" class="list-group-item list-group-item-action">Draft</button>
                            <button type="button" class="list-group-item list-group-item-action" disabled>Trash</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    @for ($i = 0; $i < 12; $i++) <tr>
                                        <td scope="row" class="d-flex justify-content-between align-items-center  border-bottom">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck{{ $i }}">
                                                    <label class="custom-control-label"
                                                        for="customCheck{{ $i }}"></label>
                                                </div>
                                                <span class="icon-copy fa fa-star-o fa-2x ml-2" style="cursor: pointer;"
                                                    aria-hidden="true"></span>
                                                <span class="d-inline-block text-truncate max-width-600 ml-3"
                                                    style="cursor: pointer;">Lorem ipsum
                                                    dolor sit amet consectetur adipisicing elit. Delectus repellat
                                                    voluptates totam sint, sit aut esse ducimus numquam laborum labore
                                                    aliquam ipsum quisquam autem! Fugit.</span>
                                            </div>
                                            <span>11:49 AM</span>
                                        </td>
                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
                    Hingarajiya</a>
            </div>
        </div>
    </div>
</div>

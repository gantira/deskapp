<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Compose</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Compose</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="{{ route('email.batch') }}">Bulk Message</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-md-8 col-lg-8 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <x-alert-message />

                        <form wire:submit.prevent="sendEmail">
                            <div class="form-group">
                                <label>From</label>
                                <input class="form-control" type="text" readonly
                                    value="Intranet Admin <iadmin@telkom.co.id>">
                            </div>
                            <div class="form-group">
                                <label>To</label>
                                <input wire:model.defer="message.email"
                                    class="form-control @error('message.email') is-invalid @enderror" type="text">
                                @error('message.email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input wire:model.defer="message.subject"
                                    class="form-control @error('message.subject') is-invalid @enderror"" type=" text">
                                @error('message.subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <div wire:ignore>
                                    <textarea class="textarea_editor form-control border-radius-0" id="body"
                                        placeholder="Enter text ..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Send" class="btn btn-primary">
                                    <i class="icon-copy fa fa-send" aria-hidden="true"></i>
                                    Send
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('js')
<script>
    $('form').submit(function() {
            @this.set('message.body', $('#body').val());
        })
</script>
@endpush

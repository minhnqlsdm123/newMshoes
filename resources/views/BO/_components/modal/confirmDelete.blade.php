@php

@endphp
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalTitle">{{ $title }}</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <p>{{ $content }}</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">{{ __('common.btn-back') }}</a>
                <a href="#" onclick="confirmDelete()" class="btn btn-primary">{{ __('common.btn-confirm') }}</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirmDelete() {
        var dataDelete = {
            '_token': $('meta[name=_token]').attr('content'),
            'code': window.actionFocusData
        };
        $.ajax({
            type: "POST",
            url: '{{ $urlDelete }}',
            data: dataDelete,
            success: function (response) {
                window.actionFocusData = '';
                $('#confirmModal').modal('hide');
                console.log(dataDelete);
                if (response.resultDelete == true) {
                    $('.alert-success').remove();
                    $('.show-messages').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        `+response.message+`
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                     </div>`)
                    setTimeout(() => {
                        $('.show-messages .alert-success').hide('slow')
                    }, 3000)
                    $('tr[data-code="' + dataDelete.code + '"]').remove()
                }
            },
        });


    }
</script>

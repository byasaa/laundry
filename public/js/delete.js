require(['jquery', 'sweetalert'], function ($, sweetalert) {
    $(document).ready(function () {

        $(document).on('click','.btn-delete', function(){
            formid = $(this).attr('data-id');
            swal({
                title: 'Anda yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan',
                dangerMode: true,
                buttons: {
                    cancel: true,
                    confirm: true,
                },
            }).then((result) => {
                if (result) {
                    $('#form-' + formid).submit();
                }
            })
        })

    });
});

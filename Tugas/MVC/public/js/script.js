$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#modalJudulLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('tambah data');

        $('#nama').val('');
                $('#nrp').val('');
                $('#email').val('');
                $('#jurusan').val('pilih');
    })

    $('.tampilModalUbah').on('click', function() {
        $('#modalJudulLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('ubah data');
    $('.modal-body form').attr('action', 'http://localhost/MVC/public/mahasiswa/ubah');

        const id = $(this).data('id');


        $.ajax({
            url: 'http://localhost/MVC/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);

            }

        })
    })
});
$(function() {

    // barang
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });

    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/gmpedia/public/barang/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/gmpedia/public/barang/getubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nm_barang);
                $('#type').val(data.kategori);
                $('#keterangan').val(data.keterangan);
                $('#stok').val(data.stok);
                $('#harga').val(data.harga);
                $('#id_barang').val(data.id_barang);

            }
        });
    });

    // end barang

    // user
    $('.tombolTambahUser').on('click', function() {
        $('#formModalLabel').html('Tambah User');
        $('.modal-footer button[type=submit]').html('Tambah User');
        $('.modal-body form')[0].reset();
    });

    $('.tampilUserUbah').on('click', function(){
        $('#formModalLabel').html('Ubah User');
        $('.modal-footer button[type=submit]').html('Ubah User');
        $('.modal-body form').attr('action', 'http://localhost/gmpedia/public/user/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/gmpedia/public/user/getubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#name').val(data.nama);
                $('#email').val(data.email);
                $('#role_id').val(data.role);
                $('#id').val(data.id);
            }
        });
    });

    // end barang

});

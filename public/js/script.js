$(function() {

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
                $('#type').val(data.type_barang);
                $('#keterangan').val(data.keterangan);
                $('#stok').val(data.stok);
                $('#harga').val(data.harga);
                $('#id_barang').val(data.id_barang);

            }
        });
    });

});

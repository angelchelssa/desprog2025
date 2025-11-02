$(document).ready(function(){
    $('#upload-form').submit(function(e){
        e.preventDefault();
        
        var formData = new FormData();
        var files = $('#files')[0].files;
        
        // Validasi: Cek apakah ada file yang dipilih
        if (files.length === 0) {
            $('#status').html('<div class="alert error"> Pilih minimal satu file gambar</div>');
            return;
        }
        
        // Tambahkan semua file ke FormData
        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }
        
        // Tampilkan loading
        $('#status').html('<div class="loading"> Mengupload ' + files.length + ' file...</div>');
        
        $.ajax({
            type: 'POST',
            url: 'upload_ajax_multi.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                $('#status').html(response);
            },
            error: function(xhr, status, error){
                $('#status').html('<div class="alert error"> Error: ' + error + '</div>');
            }
        });
    });
});
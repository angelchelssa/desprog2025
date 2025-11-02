$(document).ready(function() {
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'upload_ajax.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#status').html("<p style='color:green;'>Upload berhasil!</p>");
                $('#preview').html(response);
            },
            error: function() {
                $('#status').html("<p style='color:red;'>Terjadi kesalahan saat upload!</p>");
            }
        });
    });
});

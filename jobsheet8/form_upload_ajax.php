<!DOCTYPE html>
<html>
<head>
    <title>Multi Upload Gambar (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Upload Beberapa Gambar Sekaligus</h2>

    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="files[]" id="files" multiple accept="image/*">
        <input type="submit" value="Upload">
    </form>

    <div id="status"></div>
    <div id="preview"></div>

    <script src="upload.js"></script>
</body>
</html>

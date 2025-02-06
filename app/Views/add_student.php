<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>

<body>

    <body>
        <form method="post" action="<?= site_url('new_student') ?>">

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="" required><br><br>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="" required><br><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="" required><br><br>

            <button type="submit">Tambah Mahasiswa</button>
        </form>
    </body>
</body>

</html>
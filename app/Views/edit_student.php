<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>

<body>

    <body>
        <form method="post" action="<?= site_url('edited_student/' . $student->getNim()) ?>">

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?= esc($student->getNim()) ?>" required><br><br>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="<?= esc($student->getJurusan()) ?>" required><br><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= esc($student->getNama()) ?>" required><br><br>

            <button type="submit">Edit Mahasiswa</button>
        </form>
    </body>
</body>

</html>
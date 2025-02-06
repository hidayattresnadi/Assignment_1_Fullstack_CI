<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>

<body>

    <body>
        <p>Jurusan: <?= esc($student->getJurusan()) ?></p>
        <p>NIM: <?= esc($student->getNim()) ?></p>
        <p>Nama: <?= esc($student->getNama()) ?></p>
    </body>
</body>

</html>
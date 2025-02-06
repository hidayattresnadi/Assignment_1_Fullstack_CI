<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="<?= site_url('student_create/') ?>">Tambah Mahasiswa</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student->getNama() ?></td>
                    <td><?= $student->getNim() ?></td>
                    <td><?= $student->getJurusan() ?></td>
                    <td>
                        <a href="<?= site_url('student_detail/' . $student->getNim()) ?>">Detail</a> |
                        <a href="<?= site_url('student_edit/' . $student->getNim()) ?>">Edit</a> |
                        <a href="<?= site_url('student_delete/' . $student->getNim()) ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
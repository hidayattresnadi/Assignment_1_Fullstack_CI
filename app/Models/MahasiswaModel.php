<?php

namespace App\Models;

use App\Entities\Mahasiswa;

class MahasiswaModel
{
    private array $studentsData = [];
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'students.json';

        // Jika file tidak ada, buat file baru
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([], JSON_PRETTY_PRINT));
        }

        // Load data dari JSON dan konversi kembali ke objek Mahasiswa
        $this->studentsData = array_map(
            fn($data) => Mahasiswa::fromArray($data),
            json_decode(file_get_contents($this->filePath), true) ?? []
        );
    }

    private function saveData()
    {
        file_put_contents($this->filePath, json_encode(array_map(fn($s) => $s->toArray(), $this->studentsData), JSON_PRETTY_PRINT));
    }

    public function addStudent($nim, $nama, $jurusan): string
    {
        $newStudent = new \App\Entities\Mahasiswa($nama, $jurusan, $nim);
        $this->studentsData[] = $newStudent;
        $this->saveData();
        return "Add Student Success";
    }

    public function updateStudent($updatednim, $nama, $jurusan, $nim): string
    {
        foreach ($this->studentsData as $student) {
            if ($student->getNim() === $nim) {
                $student->setNim($updatednim);
                $student->setJurusan($jurusan);
                $student->setNama($nama);
                $this->saveData();
                return "Update Student Success";
            }
        }
        return null;
    }

    public function deleteStudent($nim): bool
    {
        foreach ($this->studentsData as $index => $student) {
            if ($student->getNim() === $nim) {
                unset($this->studentsData[$index]);
                $this->studentsData = array_values($this->studentsData);
                $this->saveData();
                return true;
            }
        }
        return false;
    }

    public function getAllStudents(): array
    {
        return $this->studentsData;
    }

    public function getStudentByNIM($nim): Mahasiswa
    {
        foreach ($this->studentsData as $student) {
            if ($student->getNim() === $nim) {
                return $student;
            }
        }
        return null;
    }
}

<?php

namespace App\Models;

use App\Entities\Mahasiswa;

class MahasiswaModel
{
    private array $studentsData = [];

    public function __construct()
    {
        $this->studentsData = [
            new \App\Entities\Mahasiswa('John Doe', 'Teknik Informatika', '12345'),
            new \App\Entities\Mahasiswa('Jane Doe', 'Sistem Informasi', '67890')
        ];
    }

    public function addStudent($nim, $nama, $jurusan): string
    {
        $newStudent = new \App\Entities\Mahasiswa($nama, $jurusan, $nim);
        $this->studentsData[] = $newStudent;
        return "Add Student Success";
    }

    public function updateStudent($updatednim, $nama, $jurusan, $nim): string
    {
        foreach ($this->studentsData as $student) {
            if ($student->getNim() === $nim) {
                $student->setNim($updatednim);
                $student->setJurusan($jurusan);
                $student->setNama($nama);
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

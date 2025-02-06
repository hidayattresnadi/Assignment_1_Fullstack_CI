<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    private MahasiswaModel $mahasiswaModel;


    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index(): string
    {
        $data['students'] = $this->mahasiswaModel->getAllStudents();
        return view('students_list', $data);
    }

    public function detail($nim): string
    {
        $data['student'] = $this->mahasiswaModel->getStudentByNIM($nim);
        return view('student_detail', $data);
    }

    public function addStudentForm(): string
    {
        return view('add_student');
    }

    public function create()
    {
        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $jurusan = $this->request->getPost('jurusan');

        $this->mahasiswaModel->addStudent($nim, $nama, $jurusan);
        // $data['students'] = $this->mahasiswaModel->getAllStudents();
        // return view('students_list', $data);
        return redirect()->to('/students')->with('success', 'Mahasiswa berhasil diadd');
    }

    public function updateStudentForm($nim): string
    {
        $data['student'] = $this->mahasiswaModel->getStudentByNIM($nim);
        return view('edit_student', $data);
    }

    public function update($nim)
    {
        $updatedNim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $jurusan = $this->request->getPost('jurusan');

        $this->mahasiswaModel->updateStudent($updatedNim, $nama, $jurusan, $nim);
        // $data['students'] = $this->mahasiswaModel->getAllStudents();
        // return view('students_list', $data);
        return redirect()->to('/students')->with('success', 'Mahasiswa berhasil diupdate');
    }

    public function delete($nim)
    {
        $this->mahasiswaModel->deleteStudent($nim);
        // $data['students'] = $this->mahasiswaModel->getAllStudents();
        // return view('students_list', $data);
        return redirect()->to('/students')->with('success', 'Mahasiswa berhasil dihapus');
    }
}

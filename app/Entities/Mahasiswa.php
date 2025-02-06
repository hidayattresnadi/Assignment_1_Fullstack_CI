<?php

namespace App\Entities;

class Mahasiswa
{
    private $nama;
    private $nim;
    private $jurusan;

    public function __construct($nama = "", $jurusan = "", $nim = "")
    {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->nim = $nim;
    }

    public function toArray(): array
    {
        return [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'jurusan' => $this->jurusan
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self($data['nama'], $data['jurusan'], $data['nim']);
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function setNim($nim)
    {
        $this->nim = $nim;
    }

    public function getJurusan(): string
    {
        return $this->jurusan;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function getFullInfo(): string
    {
        return "Nama: {$this->nama}, NIM: {$this->nim}, Jurusan: {$this->jurusan}";
    }
}

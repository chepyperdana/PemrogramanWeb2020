<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pwdb');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {

    return mysqli_fetch_assoc($result);
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{


  $conn = koneksi();

  $nama = $data['nama'];
  $nim = $data['nim'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $gambar = $data['gambar'];

  $quer = "INSERT INTO 
  mahasiswa(nama, nim, email, jurusan, gambar) 
  VALUES 
  ('$nama','$nim','$email','$jurusan','$gambar')";

  mysqli_query($conn, $quer);
}

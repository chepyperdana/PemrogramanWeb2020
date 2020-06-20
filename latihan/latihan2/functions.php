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

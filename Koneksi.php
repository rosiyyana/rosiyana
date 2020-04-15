<?php
try
{
  $con = new PDO("mysql:host=localhost;dbname=pwpb","root","");
  // echo "Database Berhasil Terhubung!!";
}
catch (PDOException $e)
{
  echo $e->getMessage();
}
?>

<?php
$conn = mysqli_connect("localhost:3307", "root", "", "pw2024_tubes_233040122");
$result = mysqli_query($conn, "SELECT * FROM berita");

?>
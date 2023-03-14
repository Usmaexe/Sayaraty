<?PHP
require("../PHP/Connexion_BD.php");
$name="couleur  .pdf";
$pdf_path="./coleur.pdf";
$sql = "INSERT INTO cours (data, name) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $sql);
$pdf_data = file_get_contents($pdf_path);
mysqli_stmt_bind_param($stmt, "bs", $pdf_data, $name);
mysqli_stmt_send_long_data($stmt, 0, $pdf_data);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>
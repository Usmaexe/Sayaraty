<?PHP
  require("../PHP/Connexion_BD.php");
// Connect to database

// Get ID parameter from URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve file data from database
    $sql = "SELECT data, name FROM cours WHERE id_cours = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $pdf_data, $pdf_name);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    // Set headers for PDF download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $pdf_name . '"');
    header('Content-Length: ' . strlen($pdf_data));
    
    // End script
    exit();
} else {
    // Handle the case where 'id' is not set
    echo 'Error: ID parameter is missing.';
}
?>

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_member = $_GET['id'];

    // Menghapus member berdasarkan ID
    $query = "DELETE FROM members WHERE id_member = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_member);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman data member setelah berhasil menghapus
        header("Location: index_members.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

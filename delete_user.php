<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id)) {
        $query = "DELETE FROM users WHERE id_users = ?";
        $stmt = $conn->prepare($query);
        
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: index_users.php?message=Data berhasil dihapus");
            exit();
        } else {
            echo "Terjadi kesalahan saat menghapus data.";
        }
    } else {
        echo "ID tidak valid.";
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>

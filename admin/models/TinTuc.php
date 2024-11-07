<?php
// ... (Your database connection code and defines) ...

function displayNews($conn) {
    try {
        $stmt = $conn->prepare("SELECT id_tin_tuc, tieu_de, noi_dung, trang_thai FROM tin_tuc"); // Add "id" to the select query
        $stmt->execute();
        $newsItems = $stmt->fetchAll();

        if ($newsItems) {
            echo '<table class="table table-striped table-bordered">'; // Styling classes
            echo '<thead>';
            echo '<tr>';
            echo '<th>Tiêu đề</th>';
            echo '<th>Nội dung</th>';
            echo '<th>Trạng thái</th>';
            echo '<th>Hành động</th>'; // New column header
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($newsItems as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row["tieu_de"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["noi_dung"]) . '</td>';

                $status = ($row["trang_thai"] == 1) ? "Xuất bản" : $row["trang_thai"]; //Simplified
                echo '<td>' . $status . '</td>';


                 // Add Edit and Delete buttons:
                echo '<td>';
                echo '<a href="sua_tin_tuc.php?id=' . $row['id_tin_tuc'] . '" class="btn btn-sm btn-primary me-2">Sửa</a>';
                echo '<a href="xoa_tin_tuc.php?id=' . $row['id_tin_tuc'] . '" class="btn btn-sm btn-danger">Xóa</a>';
                echo '</td>';


                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "Không có tin tức nào.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
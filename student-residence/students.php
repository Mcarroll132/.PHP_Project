<?php include('includes/auth.php'); include('includes/db.php'); ?>
<link rel="stylesheet" href="css/style.css">
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Student List</h2>
    <a href="add_student.php">Add New Student</a>
    <table>
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Room</th><th>Actions</th></tr>
        <?php
        $res = mysqli_query($conn, "SELECT s.*, r.room_number FROM students s LEFT JOIN rooms r ON s.room_id = r.id");
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['room_number']}</td>
                <td>
                    <a href='edit_student.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_student.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>

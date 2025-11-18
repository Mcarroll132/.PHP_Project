<?php include('includes/auth.php'); include('includes/db.php'); ?>
<?php
$id = $_GET['id'];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id=$id"));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_id = $_POST['room_id'];
    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', phone='$phone', room_id='$room_id' WHERE id=$id");
    header("Location: students.php");
}
?>
<link rel="stylesheet" href="css/style.css">
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Edit Student</h2>
    <form method="post">
        <input name="name" value="<?php echo $student['name']; ?>" />
        <input name="email" value="<?php echo $student['email']; ?>" />
        <input name="phone" value="<?php echo $student['phone']; ?>" />
        <select name="room_id">
            <?php
            $rooms = mysqli_query($conn, "SELECT * FROM rooms");
            while ($room = mysqli_fetch_assoc($rooms)) {
                $selected = $student['room_id'] == $room['id'] ? "selected" : "";
                echo "<option value='{$room['id']}' $selected>{$room['room_number']}</option>";
            }
            ?>
        </select>
        <button type="submit">Update</button>
    </form>
</div>

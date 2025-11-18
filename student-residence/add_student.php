<?php include('includes/auth.php'); include('includes/db.php'); ?>
<link rel="stylesheet" href="css/style.css">
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Add Student</h2>
    <form method="post">
        <input name="name" placeholder="Name" required />
        <input name="email" placeholder="Email" />
        <input name="phone" placeholder="Phone" />
        <select name="room_id">
            <option value="">Select Room</option>
            <?php
            $rooms = mysqli_query($conn, "SELECT * FROM rooms");
            while ($room = mysqli_fetch_assoc($rooms)) {
                echo "<option value='{$room['id']}'>{$room['room_number']}</option>";
            }
            ?>
        </select>
        <button type="submit">Add</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $room_id = $_POST['room_id'];
        mysqli_query($conn, "INSERT INTO students (name, email, phone, room_id) VALUES ('$name','$email','$phone','$room_id')");
        echo "Student added.";
    }
    ?>
</div>

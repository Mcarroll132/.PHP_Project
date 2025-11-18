<?php
include("includes/db.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $room = trim($_POST["room"]);
    $role_code = trim($_POST["role_code"]);

    $role = 'student'; // default

    // Role selection based on code
    if ($role_code === "1") {
        $role = 'manager';
    } elseif ($role_code === "2") {
        $role = 'admin';
    }

    if (!empty($username) && !empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone, room_number, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $hashed, $email, $phone, $room, $role);

        if ($stmt->execute()) {
            $message = "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <input type="email" name="email" placeholder="Email" /><br>
        <input type="text" name="phone" placeholder="Phone Number" /><br>
        <input type="text" name="room" placeholder="Room Number" /><br>
        <input type="text" name="role_code" placeholder="Enter Code for Manager/Admin (optional)" /><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Back to Login</a></p>
    <p><?php echo $message; ?></p>
</div>
</body>
</html>

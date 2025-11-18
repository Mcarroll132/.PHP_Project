<?php include('includes/auth.php'); include('includes/db.php'); ?>
<link rel="stylesheet" href="css/style.css">
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is your student residence management dashboard.</p>
</div>

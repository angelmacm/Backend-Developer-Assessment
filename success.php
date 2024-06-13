<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations!</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="congrats-container">
        <div class="congrats-message">
            <h1>Congratulations!</h1>
            <p>Thank you <?php echo $_SESSION['name'] ?> for registering. We are excited to have you with us!</p>
            <p>Check your email for more details.</p>
            <a href="./" class="button">Go to Homepage</a>
        </div>
    </div>
</body>
</html>

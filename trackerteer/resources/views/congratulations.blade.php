<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="congrats-container">
        <h1>Congratulations, {{ session('name') }}!</h1>
        <p>Thank you for registering.</p>
    </div>
</body>
</html>

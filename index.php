<?php
session_start();

try {
    $errorStatus = isset($_GET['error_status']);
    $name = $errorStatus ? $_SESSION['name'] : null;
    $email = $errorStatus ? $_SESSION['email'] : null;
    $tel = $errorStatus ? $_SESSION['tel'] : null;
    $address_1 = $errorStatus ? $_SESSION['address_1'] : null;
    $address_2 = $errorStatus ? $_SESSION['address_2'] : null;
    $city = $errorStatus ? $_SESSION['city'] : null;
    $state_user = $errorStatus ? $_SESSION['state'] : null;
    $zip_code = $errorStatus ? $_SESSION['zip_code'] : null;
    $username = $errorStatus ? $_SESSION['username'] : null;
    $password = $errorStatus ? $_SESSION['password'] : null;
    $confirm_password = $errorStatus ? $_SESSION['confirm_password'] : null;
    
    $email_error = false;
    $tel_error = false;
    $zip_error = false;
    $password_mismatch = false;

    if(isset($_GET['ev'])){
        if(!$_GET['ev']){
            $email_error = true;
        }
    }

    if(isset($_GET['tv'])){
        if(!$_GET['tv']){
            $tel_error = true;
        }
    }

    if(isset($_GET['zv'])){
        if(!$_GET['zv']){
            $zip_error = true;
        }
    }

    if(isset($_GET['pm'])){
        if(!$_GET['pm']){
            $password_mismatch = true;
        }
    }

} catch (Exception $e){
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Developer | PHP Programming Test | Angel Mac Macapagal</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="form-container">
        <form method="post" action="./register.php">
            <div class="input-container">
                <label for="user_name" class="form-label">Name: </label>
                <input type="text" 
                       class="form-input"
                       id="user_name" 
                       name="user_name" 
                       value="<?php echo htmlspecialchars($name); ?>"  
                       required/>
            </div>
        
            <div class="input-container">
                <label for="user_email" class="form-label">Email Address: </label>
                <input type="text" 
                       id="user_email" 
                       class="form-input<?php echo $email_error ?  " error" : ''; ?>"
                       name="user_email" 
                       value="<?php echo htmlspecialchars($email); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="user_tel" class="form-label">Telephone: </label>
                <input type="tel" 
                       id="user_tel" 
                       class="form-input<?php echo $tel_error ?  " error" : ''; ?>"
                       name="user_tel" 
                       value="<?php echo htmlspecialchars($tel); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="user_address_1" class="form-label">Address 1: </label>
                <input type="text" 
                       id="user_address_1" 
                       class="form-input"
                       name="user_address_1" 
                       value="<?php echo htmlspecialchars($address_1); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="user_address_2" class="form-label">Address 2: </label>
                <input type="text" 
                       id="user_address_2" 
                       class="form-input"
                       name="user_address_2" 
                       value="<?php echo htmlspecialchars($address_2); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="user_city" class="form-label">City: </label>
                <input type="text" 
                       id="user_city" 
                       class="form-input"
                       name="user_city" 
                       value="<?php echo htmlspecialchars($city); ?>" 
                       required/>
            </div>

            <div class="input-container">
                <label for="user_state" class="form-label">State / Province: </label>
                <input type="text" 
                       id="user_state" 
                       class="form-input"
                       name="user_state" 
                       value="<?php echo htmlspecialchars($state_user); ?>"
                       required/>
            </div>

            <div class="input-container">
                <label for="user_zip_code" class="form-label">Zip / Postal Code: </label>
                <input type="number" 
                       id="user_zip_code" 
                       class="form-input<?php echo $zip_error ?  " error" : ''; ?>"
                       name="user_zip_code" 
                       value="<?php echo htmlspecialchars($zip_code); ?>" 
                       required />
            </div>

            <div class="input-container">
                <label for="user_username" class="form-label">Username: </label>
                <input type="text" 
                       id="user_username" 
                       class="form-input"
                       name="user_username" 
                       value="<?php echo htmlspecialchars($username); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="user_password" class="form-label">Password: </label>
                <input type="password" 
                       id="user_password" 
                       class="form-input<?php echo $password_mismatch ?  " error" : ''; ?>"
                       name="user_password" 
                       value="<?php echo htmlspecialchars($password); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <label for="confirm_password" class="form-label">Confirm Password: </label>
                <input type="password" 
                       id="confirm_password" 
                       class="form-input<?php echo $password_mismatch ?  " error" : ''; ?>"
                       name="confirm_password" 
                       value="<?php echo htmlspecialchars($confirm_password); ?>"  
                       required/>
            </div>

            <div class="input-container">
                <input type="submit" class="form-submit"/>
            </div>

        </form>
    </div>
</body>
</html>

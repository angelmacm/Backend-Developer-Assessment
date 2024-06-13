<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-container">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-input" id="name" name="user_name" value="{{ old('user_name') }}" required>
                @error('user_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-input" id="email" name="user_email" value="{{ old('user_email') }}" required>
                @error('user_email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="telephone" class="form-label">Telephone:</label>
                <input type="text" class="form-input" id="telephone" name="user_telephone" value="{{ old('user_telephone') }}" required>
                @error('user_telephone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="address_1" class="form-label">Address 1:</label>
                <input type="text" class="form-input" id="address_1" name="user_addr1" value="{{ old('user_addr1') }}" required>
                @error('user_addr1')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="address_2" class="form-label">Address 2:</label>
                <input type="text" class="form-input" id="address_2" name="user_addr2" value="{{ old('user_addr2') }}">
                @error('user_addr2')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-input" id="city" name="user_city" value="{{ old('user_city') }}" required>
                @error('user_city')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="state" class="form-label">State / Province:</label>
                <input type="text" class="form-input" id="state" name="user_state" value="{{ old('user_state') }}" required>
                @error('user_state')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="zip_code" class="form-label">Zip / Postal Code:</label>
                <input type="text" class="form-input" id="zip_code" name="user_zip_code" value="{{ old('user_zip_code') }}" required>
                @error('user_zip_code')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-input" id="username" name="user_username" value="{{ old('user_username') }}" required>
                @error('user_username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-input" id="password" name="user_password" required>
                @error('user_password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-input" id="password_confirmation" name="confirm_password" required>
                @error('confirm_password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-container">
                <input type="submit" class="form-submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>

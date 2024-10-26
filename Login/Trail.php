<?php
session_start();
require_once 'config.php'; // Assuming $conn is your MySQLi connection

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if username or email already exists
        $query = "SELECT * FROM Users WHERE Username = '$username' OR Email = '$email'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $error = "Username or email already exists.";
        } else {
            // Handle file upload
            $profile_picture = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $filename = $_FILES['profile_picture']['name'];
                $filetype = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array(strtolower($filetype), $allowed)) {
                    $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
                } else {
                    $new_filename = uniqid() . "." . $filetype;
                    $upload_path = "uploads/profile_pictures/" . $new_filename;
                    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_path)) {
                        $profile_picture = $upload_path;
                    } else {
                        $error = "Failed to upload file.";
                    }
                }
            }

            if (empty($error)) {
                // Insert new user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO Users (Username, Email, Password, ProfilePicture, RegistrationDate) 
                          VALUES ('$username', '$email', '$hashed_password', '$profile_picture', NOW())";
                if (mysqli_query($conn, $query)) {
                    $success = "Registration successful! You can now login.";
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - YumYum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #111;
        }
        .square {
            position: relative;
            width: 700px;
            height: 700px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .square i {
            position: absolute;
            inset: 0;
            border: 2px solid #fff;
            transition: 0.5s;
        }
        .square i:nth-child(1) {
            border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
            animation: animate 6s linear infinite;
        }
        .square i:nth-child(2) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate 4s linear infinite;
        }
        .square i:nth-child(3) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate2 10s linear infinite;
        }
        .square:hover i {
            border: 6px solid var(--clr);
            filter: drop-shadow(0 0 20px var(--clr));
        }
        @keyframes animate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes animate2 {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }
        .register {
            position: absolute;
            width: 400px;
            padding: 40px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        }
        .register h2 {
            font-size: 2em;
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
        }
        .register .inputBx {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }
        .register .inputBx input,
        .register .inputBx input[type="file"] {
            width: 100%;
            padding: 10px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            box-shadow: none;
            outline: none;
        }
        .register .inputBx input::placeholder {
            color: rgba(255,255,255,0.5);
        }
        .register .inputBx input[type="submit"] {
            background: #0078ff;
            background: linear-gradient(45deg,#ff357a,#fff172);
            border: none;
            cursor: pointer;
            font-weight: 600;
            padding: 10px 20px;
        }
        .register .links {
            display: flex;
            justify-content: space-between;
        }
        .register .links a {
            color: #fff;
            text-decoration: none;
        }
        .error, .success {
            color: #ff357a;
            margin-top: 10px;
            text-align: center;
        }
        .success {
            color: #00ff0a;
        }
        .profile-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            display: block;
            background-color: #fff;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        .file-input-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-input-wrapper .btn-file-input {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        /* Notification styles */
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

        :root {
            --tr: all 0.5s ease 0s;
            --ch1: #05478a;
            --ch2: #0070e0;
            --cs1: #005e38;
            --cs2: #03a65a;
            --cw1: #c24914;
            --cw2: #fc8621;
            --ce1: #851d41;
            --ce2: #db3056;
        }

        .toast-panel {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .toast {
            background: #fff;
            color: #f5f5f5;
            padding: 1rem 2rem 1rem 3rem;
            text-align: center;
            border-radius: 1rem;
            position: relative;
            font-weight: 300;
            text-align: left;
            max-width: 16rem;
            transition: var(--tr);
            opacity: 1;
            border: 0.15rem solid #fff2;
            box-shadow: 0 0 1.5rem 0 #1a1f4360;
        }

        .toast:before {
            content: "";
            position: absolute;
            width: 0.5rem;
            height: calc(100% - 1.5rem);
            top: 0.75rem;
            left: 0.5rem;
            z-index: 0;
            border-radius: 1rem;
            background: var(--clr);
        }

        .toast h3 {
            font-size: 1.2rem;
            margin: 0;
            line-height: 1.35rem;
            font-weight: 600;
            position: relative;
            color: var(--clr);
        }

        .toast p {
            position: relative;
            font-size: 0.95rem;
            z-index: 1;
            margin: 0.25rem 0 0;
            color: #595959;
            line-height: 1.3rem;
        }

        .close {
            position: absolute;
            width: 1.35rem;
            height: 1.35rem;
            text-align: center;
            right: 1rem;
            cursor: pointer;
            border-radius: 100%;
        }

        .close:after {
            position: absolute;
            font-family: 'Varela Round', san-serif;
            width: 100%;
            height: 100%;
            left: 0;
            font-size: 1.8rem;
            content: "+";
            transform: rotate(-45deg);
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #595959;
            text-indent: 1px;
        }

        .close:hover:after {
            background: var(--clr);
            color: #fff;
        }

        .toast.success {
            --bg: var(--cs1);
            --clr: var(--cs2);
            --brd: var(--cs3);
        }

        .toast.error {
            --bg: var(--ce1);
            --clr: var(--ce2);
            --brd: var(--ce3);
        }
    </style>
</head>
<body>
    <div class="square">
        <i style="--clr: #00ff0a"></i>
        <i style="--clr: #ff0057"></i>
        <i style="--clr: #fffd44"></i>
        <div class="register">
            <h2>Register</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="registerForm">
                <img id="profile-preview" src="https://via.placeholder.com/100" alt="Profile Picture Preview" class="profile-preview">
                <div class="inputBx">
                    <div class="file-input-wrapper">
                        <button type="button" class="btn-file-input">Choose Profile Picture</button>
                        <input type="file" name="profile_picture" accept="image/*" id="profile_picture">
                    </div>
                </div>
                <div class="inputBx">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputBx">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="inputBx">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputBx">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <div class="inputBx">
                    <input type="submit" value="Register">
                </div>
                <div class="links">
                    <a href="login.php">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>

    <div class="toast-panel">
        <?php if (!empty($success)): ?>
        <div class="toast success">
            <label class="close"></label>
            <h3>Success!</h3>
            <p><?php echo htmlspecialchars($success); ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
        <div class="toast error">
            <label class="close"></label>
            <h3>Error!</h3>
            <p><?php echo htmlspecialchars($error); ?></p>
        </div>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("registerForm");
            const usernameInput = form.querySelector('input[name="username"]');
            const emailInput = form.querySelector('input[name="email"]');
            const passwordInput = form.querySelector('input[name="password"]');
            const confirmPasswordInput = form.querySelector('input[name="confirm_password"]');
            const profilePictureInput = document.getElementById('profile_picture');
            const profilePreview = document.getElementById('profile-preview');

            profilePictureInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePreview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Username validation
                if (usernameInput.value.trim() === "") {
                    isValid = false;
                    showError(usernameInput, "Please enter a username.");
                } else {
                    clearError(usernameInput);
                }

                // Email validation
                if (emailInput.value.trim() === "") {
                    isValid = false;
                    showError(emailInput, "Please enter an email address.");
                } else if (!isValidEmail(emailInput.value)) {
                    isValid = false;
                    showError(emailInput, "Please enter a valid email address.");
                } else {
                    clearError(emailInput);
                }

                // Password validation
                if (passwordInput.value.trim() === "") {
                    isValid = false;
                    showError(passwordInput, "Please enter a password.");
                } else if (passwordInput.value.length < 8) {
                    isValid = false;
                    showError(passwordInput, "Password must be at least 8 characters long.");
                } else {
                    clearError(passwordInput);
                }

                // Confirm password validation
                if (confirmPasswordInput.value !== passwordInput.value) {
                    isValid = false;
                    showError(confirmPasswordInput, "Passwords do not match.");
                } else {
                    clearError(confirmPasswordInput);
                }

                // Profile picture validation
                if (profilePictureInput.files.length > 0) {
                    const file = profilePictureInput.files[0];
                    const fileType = file.type.split('/')[1];
                    const allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!allowedTypes.includes(fileType)) {
                        isValid = false;
                        showError(profilePictureInput, "Only JPG, JPEG, PNG, and GIF files are allowed.");
                    } else {
                        clearError(profilePictureInput);
                    }
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            function showError(input, message) {
                clearError(input);
                const errorElement = document.createElement('div');
                errorElement.className = 'error-message';
                errorElement.textContent = message;
                errorElement.style.color = '#ff357a';
                errorElement.style.fontSize = '14px';
                errorElement.style.marginTop = '5px';
                input.parentElement.appendChild(errorElement);
                input.style.borderColor = '#ff357a';
            }

            function clearError(input) {
                const errorElement = input.parentElement.querySelector('.error-message');
                if (errorElement) {
                    errorElement.remove();
                }
                input.style.borderColor = 'rgba(255,255,255,0.5)';
            }

            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        });

            document.addEventListener('DOMContentLoaded', function() {
                var closeButtons = document.querySelectorAll('.toast .close');
                closeButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var toastItem = this.closest('.toast');
                        if (toastItem) {
                            toastItem.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
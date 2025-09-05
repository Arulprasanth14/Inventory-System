<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === "admin" && $_POST['password'] === "admin123") {
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "❌ Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Inventory System</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #004080, #0066cc);
        }

        .login-box {
            background: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease;
        }

        .login-box h2 {
            margin-bottom: 25px;
            color: #004080;
            font-size: 26px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"],
        .login-box button {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 15px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 6px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            border: 1px solid #ccc;
        }

        .login-box button {
            background: #004080;
            color: #fff;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background: #003060;
        }


        .error {
            margin-top: 15px;
            color: red;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login to Inventory</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="👤 Username" required>
            <input type="password" name="password" placeholder="🔒 Password" required>
            <button type="submit">Login</button>
            <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        </form>
    </div>
</body>
</html>

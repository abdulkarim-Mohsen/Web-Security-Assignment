<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $user_data = $stmt->fetch();

    if ($user_data && password_verify($pass, $user_data['password'])) {
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];
        header("Location: home.php");
    } else {
        echo '<script>alert("خطأ في اسم المستخدم او كلمة المرور");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>  تسجيل الدخول</h3>
            <input type="text" name="username" required placeholder="Username" class="box">
            <input type="password" name="password" required placeholder="Password" class="box">
            <input type="submit" name="submit" class="btn" value="Login">
            <p><a href="register.php">إنشاء حساب جديد</a></p>
        </form>
    </div>
</body>

</html>
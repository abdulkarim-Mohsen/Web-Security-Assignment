<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];

    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$user, $pass])) {
        echo '<script>alert("تم إنشاء الحساب بنجاح يمكنك العودة وتسجيل الدخول!");</script>';

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>
    <div class="form-container">
        <form action="" method="POST">
            <h3>إنشاء حساب جديد</h3>
            <input type="username" name="username" required placeholder="Username" class="box">
            <input type="password" name="password" required placeholder=" Password" class="box">
            <input type="submit" name="submit" class="btn" value="Create">
            <p><a href="login.php">تسجيل الدخول</a></p>
        </form>

    </div>

</body>

</html>
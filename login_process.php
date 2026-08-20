<?php
session_start();

// استدعاء ملف الاتصال بقاعدة البيانات
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // التأكد من استلام البيانات
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($email) && !empty($password)) {
        
        // تجهيز الاستعلام بحماية من SQL Injection
        $stmt = mysqli_prepare($conn, "SELECT id, full_name, password FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // التحقق من كلمة المرور (تستوعب المشفرة والعادية)
            if (password_verify($password, $row['password']) || $password === $row['password']) {
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['user_name'] = $row['full_name'];
                
                header("Location: dashbord.php");
                exit();
            }
        }
    }

    // في حالة وجود خطأ في البيانات
    header("Location: login.php?error=" . urlencode("بيانات الدخول غير صحيحة"));
    exit();
}
?>
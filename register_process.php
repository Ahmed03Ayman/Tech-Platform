<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $raw_pass = trim($_POST['password']); // استلام الباسورد بدون تشفير الأول
    $phone    = trim($_POST['phone'] ?? '');
    $dob      = trim($_POST['dob'] ?? '');
    $gender   = trim($_POST['gender'] ?? '');

    // 1. التأكد إن الحقول مش فاضية (استخدمنا الباسورد الخام)
    if (empty($fullname) || empty($email) || empty($raw_pass)) {
        header("Location: register.php?error=" . urlencode("يرجى ملء جميع الحقول الأساسية"));
        exit();
    }

    // 2. التأكد من صيغة الإيميل
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=" . urlencode("البريد الإلكتروني غير صالح"));
        exit();
    }

    // 3. التشفير بعد التأكد إنه مش فاضي
    $password = password_hash($raw_pass, PASSWORD_DEFAULT);

    // تجهيز القيم الاختيارية (بما فيهم الـ gender)
    $phone  = $phone !== '' ? $phone : null;
    $dob    = $dob !== '' ? $dob : null;
    $gender = $gender !== '' ? $gender : null;

    // معالجة رفع الصورة الشخصية
    $img_url = 'default_avatar.png';

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type     = mime_content_type($_FILES['profile_image']['tmp_name']);
        $max_size      = 2 * 1024 * 1024; // 2 ميجا

        if (in_array($file_type, $allowed_types) && $_FILES['profile_image']['size'] <= $max_size) {
            $upload_dir = 'uploads/avatars/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $extension    = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('avatar_', true) . '.' . $extension;
            $destination  = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $destination)) {
                $img_url = $destination;
            }
        }
    }

    // التحقق من وجود الإيميل مسبقاً
    $check_stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        mysqli_stmt_close($check_stmt); // قفل الاتصال
        header("Location: register.php?error=" . urlencode("البريد الإلكتروني مسجل بالفعل"));
        exit();
    }
    mysqli_stmt_close($check_stmt); // قفل الاتصال

    // إضافة المستخدم الجديد
    $insert_stmt = mysqli_prepare($conn, "INSERT INTO users (full_name, email, password, phone, dob, gender, img_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($insert_stmt, "sssssss", $fullname, $email, $password, $phone, $dob, $gender, $img_url);

    if (mysqli_stmt_execute($insert_stmt)) {
        $_SESSION['user_id']   = mysqli_insert_id($conn);
        $_SESSION['user_name'] = $fullname;
        
        mysqli_stmt_close($insert_stmt); // قفل الاتصال
        header("Location: dashbord.php");
        exit();
    } else {
        mysqli_stmt_close($insert_stmt); // قفل الاتصال
        header("Location: register.php?error=" . urlencode("حدث خطأ أثناء إنشاء الحساب"));
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?>
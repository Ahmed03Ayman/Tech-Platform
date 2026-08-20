<?php
session_start();
require_once 'connection.php';

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email        = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);

    if (empty($email) || empty($new_password)) {
        $error = "يرجى تقديم البريد الإلكتروني وكلمة المرور الجديدة";
    } else {
        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($result)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = mysqli_prepare($conn, "UPDATE users SET password = ? WHERE email = ?");
            mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $email);
            
            if (mysqli_stmt_execute($update_stmt)) {
                $message = "تم تحديث كلمة المرور بنجاح! <a href='login.php' class='fw-bold text-decoration-none' style='color: #5346E0;'>تسجيل الدخول</a>";
            } else {
                $error = "حدث خطأ أثناء التحديث";
            }
        } else {
            $error = "البريد الإلكتروني غير مسجل لدينا";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تغيير كلمة المرور</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .auth-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }
        .title-color {
            color: #5346E0;
        }
        .btn-custom {
            background-color: #5346E0;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            transition: background-color 0.2s ease;
        }
        .btn-custom:hover {
            background-color: #4335ca;
            color: #ffffff;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e2e8f0;
            background-color: #ffffff;
        }
        .form-control:focus {
            border-color: #5346E0;
            box-shadow: 0 0 0 3px rgba(83, 70, 224, 0.1);
        }
        .form-label {
            color: #334155;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .link-custom {
            color: #5346E0;
            font-weight: 700;
            text-decoration: none;
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <div class="card auth-card p-4 p-sm-5">
                    
                    <!-- العنوان الرئيسي -->
                    <h3 class="text-center fw-bold title-color mb-4 fs-2">إعادة تعيين كلمة المرور</h3>

                    <?php if(!empty($message)): ?>
                        <div class="alert alert-success text-center p-2 mb-3" style="border-radius: 10px;">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($error)): ?>
                        <div class="alert alert-danger text-center p-2 mb-3" style="border-radius: 10px; background-color: #fee2e2; border: none; color: #991b1b;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="forgot_password.php">
                        
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" name="new_password" class="form-control" placeholder="********" required>
                        </div>

                        <button type="submit" class="btn btn-custom w-100">تحديث كلمة المرور</button>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">تذكرت كلمة المرور؟ <a href="login.php" class="link-custom">تسجيل الدخول</a></small>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
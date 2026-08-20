<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashbord.php");
    exit();
}
require_once 'connection.php';
$error = isset($_GET['error']) ? $_GET['error'] : "";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - TEC</title>
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
        .btn-custom {
            background-color: #5346E0;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 700;
            font-size: 1.05rem;
        }
        .btn-custom:hover {
            background-color: #4335ca;
            color: #ffffff;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            border-color: #5346E0;
            box-shadow: 0 0 0 3px rgba(83, 70, 224, 0.1);
        }
        .forgot-link {
            color: #5346E0;
            font-size: 0.9rem;
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="text-center mb-4">
                    <h2 class="fw-bold fs-1" style="color: #1e1b4b;">تسجيل الدخول</h2>
                    <p class="text-muted small mt-2">أهلاً بك مجدداً في منصة TEC، ابدأ التعلم الآن</p>
                </div>

                <div class="card auth-card p-4">
                    
                    <?php if(!empty($error)): ?>
                        <div class="alert alert-danger text-center p-2 mb-3" style="border-radius: 10px; background-color: #fee2e2; border: none; color: #991b1b;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="login_process.php">
                        
                        <div class="mb-3">
                            <label class="form-label font-weight-bold fw-semibold">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold fw-semibold">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check m-0">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label text-muted" for="remember" style="font-size: 0.9rem;">تذكرني</label>
                            </div>
                            <div>
                                <a href="forgot_password.php" class="text-decoration-none fw-semibold forgot-link">نسيت كلمة المرور؟</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-custom w-100">تسجيل الدخول</button>
                    </form>

                    <hr class="my-4" style="color: #e2e8f0;">

                    <div class="text-center">
                        <small class="text-muted">ليس لديك حساب؟ <a href="register.php" class="fw-bold text-decoration-none" style="color: #5346E0;">إنشاء حساب جديد</a></small>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
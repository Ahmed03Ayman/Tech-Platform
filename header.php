<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEC - منصة تعليمية</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Cairo", sans-serif;
        }

        body {
            background: #f7f8fc;
            color: #202333;
        }

        a {
            text-decoration: none;
        }

        nav {
            height: 75px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: #4f46e5;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .logo h2 {
            color: #4f46e5;
            font-size: 25px;
        }

        .logo span {
            display: block;
            color: #22a98f;
            font-size: 10px;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        nav ul li a {
            color: #555;
            font-size: 15px;
            font-weight: 600;
            display: inline-block; /* ضروري عشان الـ transform يشتغل صح */
            transition: all 0.3s ease-in-out;
        }

        /* تأثير الـ Hover الجديد (Scale + Shadow + Color) */
        nav ul li a:hover {
            color: #4f46e5;
            transform: translateY(-3px) scale(1.05);
            text-shadow: 0 4px 10px rgba(79, 70, 229, 0.25);
        }

        .btn-nav {
            padding: 9px 22px;
            border-radius: 9px;
            cursor: pointer;
            font-family: inherit;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-login {
            background: #4f46e5;
            color: white;
        }

        .btn-login:hover {
            background: #3730a3;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-account {
            background: #f0f4ff; 
            color: #4f46e5;
            border-color: #f0f4ff;
        }

        .btn-account:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-logout {
            background: #fff1f2; 
            color: #e11d48;
            border-color: #fff1f2;
        }

        .btn-logout:hover {
            background: #e11d48;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(225, 29, 72, 0.2);
        }

        @media (max-width: 800px) {
            nav ul {
                display: none;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <div class="logo-icon">&lt;/&gt;</div>
            <div>
                <h2>TEC</h2><span>منصة تعليمية</span>
            </div>
        </div>
        
        <!-- القائمة الجديدة -->
        <ul>
            <li><a href="home.php">الرئيسية</a></li>
            <li><a href="courses.php">الكورسات</a></li>
            <li><a href="home.php#about">من نحن</a></li>
            <li><a href="course-details.php#team">فريق العمل</a></li>
        </ul>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div style="display: flex; gap: 10px;">
                <a href="dashbord.php">
                    <button class="btn-nav btn-account">حسابي</button>
                </a>
                <a href="logout.php">
                    <button class="btn-nav btn-logout">خروج</button>
                </a>
            </div>
        <?php else: ?>
            <a href="login.php">
                <button class="btn-nav btn-login">تسجيل الدخول</button>
            </a>
        <?php endif; ?>
    </nav>
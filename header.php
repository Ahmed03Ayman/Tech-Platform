<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEC - منصة تعليمية</title>

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
            font-size: 14px;
            font-weight: 600;
        }

        nav ul li a:hover {
            color: #4f46e5;
        }

        .login {
            border: none;
            background: #4f46e5;
            color: white;
            padding: 10px 22px;
            border-radius: 9px;
            cursor: pointer;
            font-family: inherit;
        }

        .login:hover {
            background: #3730a3;
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

        <div class="logo-icon">
            &lt;/&gt;
        </div>

        <div>
            <h2>TEC</h2>
            <span>منصة تعليمية</span>
        </div>

    </div>

    <ul>

        <li>
            <a href="home.php">الرئيسية</a>
        </li>

        <li>
            <a href="courses.php">المراحل</a>
        </li>

        <li>
            <a href="courses.php">الكورسات</a>
        </li>

        <li>
            <a href="achievements.php">الإنجازات</a>
        </li>

    </ul>

    <button class="login">
        تسجيل الدخول
    </button>

</nav>
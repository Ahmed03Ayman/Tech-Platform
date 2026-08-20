<footer class="tec-footer">
    <style>
        .tec-footer {
            background-color: #ffffff;
            padding: 60px 7% 20px;
            border-top: 1px solid #eaeaea;
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            margin-top: 50px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .footer-col h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: #777;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }

        .footer-col ul li a:hover {
            color: #4f46e5;
            transform: translateX(-5px); /* حركة خفيفة لليسار عند الوقوف عليها */
        }

        /* تنسيق عمود اللوجو */
        .brand-col .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .brand-col .logo-icon {
            width: 40px;
            height: 40px;
            background: #4f46e5;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
        }

        .brand-col .logo h2 {
            color: #4f46e5;
            font-size: 24px;
            margin: 0;
            font-weight: 800;
        }

        .made-with {
            color: #777;
            font-size: 14px;
        }

        /* تنسيق أيقونات السوشيال ميديا */
        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: #f7f8fc;
            color: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-icons a:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.2);
        }

        /* حقوق الملكية */
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eaeaea;
            color: #999;
            font-size: 14px;
        }

        /* التجاوب مع الشاشات (Responsive) */
        @media (max-width: 900px) {
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .brand-col .logo, .social-icons {
                justify-content: center;
            }
            .footer-col ul li a:hover {
                transform: translateY(-3px); /* تغيير الحركة في الموبايل */
            }
        }
    </style>

    <div class="footer-container">
        <!-- العمود الأول: اللوجو والوصف -->
        <div class="footer-col brand-col">
            <div class="logo">
                <div class="logo-icon">&lt;/&gt;</div>
                <h2>TEC</h2>
            </div>
            <p class="made-with">صُنع بـ 💛 للعقول الفضولية</p>
        </div>

        <!-- العمود الثاني: روابط سريعة -->
        <div class="footer-col">
            <h3>روابط سريعة</h3>
            <ul>
                <li><a href="home.php">الرئيسية</a></li>
                <li><a href="courses.php">الدورات</a></li>
                <li><a href="dashbord.php">لوحة التحكم</a></li>
            </ul>
        </div>

        <!-- العمود الثالث: قانوني -->
        <div class="footer-col">
            <h3>قانوني</h3>
            <ul>
                <li><a href="terms.php">الشروط والأحكام</a></li>
                <li><a href="contact.php">اتصل بنا</a></li>
            </ul>
        </div>

        <!-- العمود الرابع: السوشيال ميديا -->
        <div class="footer-col">
            <h3>تابعنا</h3>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>TEC. All rights reserved 2026 ©</p>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
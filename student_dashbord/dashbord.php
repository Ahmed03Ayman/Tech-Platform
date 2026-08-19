<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- السيدبار المطور -->
    <aside class="sidebar">
        <div class="sidebar-header-mobile">
            <div class="sidebar-logo">
                <div class="Logo">
                     &lt;/&gt;
                       </div>
                <span>TEC</span>
                 
            </div>
            
            <!-- زر الثلاث شرط السحري والمظبوط بالكامل -->
            <input type="checkbox" id="menu-toggle" class="menu-checkbox">
            <label for="menu-toggle" class="hamburger-btn">
                <span></span>
                <span></span>
                <span></span>
            </label>
            
            <div class="sidebar-menu">
                <a href="home.php" class="menu-link active"> الرئيسية</a>
                <a href="courses.php"  class="menu-link"> موادي الدراسية</a>
                <a href="#"  class="menu-link"> الامتحانات الكويزات</a>
                <a href="#"  class="menu-link"> الملف الشخصي</a>
                <hr class="divider d-mobile-only">
                <a href="#" class="logout d-mobile-only"> تسجيل الخروج</a>
            </div>
        </div>

         <hr class="divider d-desktop-only">
         <a href="#" class="logout d-desktop-only"> تسجيل الخروج</a>
    </aside>

    <!-- المحتوي الاساسي -->
    <main class="main-content">

        <!--navbar -->
        <header class="top-navbar">
            <div class="welcome-text">
               <h5>أهلاً بك في نظام الإعداد التكنولوجي المستقبلي 👋</h5>
            </div>
            
            <div class="user-profile">
                <span>مرحباً: أحمد محمد (طالب بالصف الأول الثانوي)</span>
            </div>
        </header>

        <!-- عنوان القسم -->
        <div class="section-header">
            <h2>لوحة متابعة الطالب الدراسية</h2>
            <p>تابع دروسك المشاهدة، حصص البث المباشر، والتقييمات الخاصة بصفك الدراسي الحالي.</p>
        </div>

        <!--  الكروت  -->
        <div class="tech-grid">
            <!-- كارت المشاريع البرمجيه -->
            <div  class="tech-card border-blue">
                <div  class="card-info">
                        <span>مشاريع مطلوبة منك</span>
                        <h3>2 مشروع GitHub</h3>
                 </div>
            </div>

            <!-- كارت الدروس المنجزة -->
            <div class="tech-card border-green">
                <div class="card-info">
                        <span>الدروس التي أنجزتها</span>
                        <h3>شاهدت 15 درسًا</h3>
                </div>
            </div>

            <!-- كارت الامتحانات -->
            <div class="tech-card border-orange">
                <div class="card-info">
                         <span>الاختبارات والكويزات</span>
                        <h3>حللت 8 امتحانات</h3>
                </div>
            </div>

            <!-- كارت التقييم -->
            <div class="tech-card border-purple">
                <div class="card-body">
                        <span>تقييم المحاضرين لأكوادك</span>
                        <h3>ممتاز (9.5 / 10)</h3>
                </div>
            </div>
        </div>

        <!-- الجدول -->
        <div class="table-card">
            <!-- العنوان -->
            <div class="table-header">
                <h4>جدول ورش البث المباشر والمراجعات الحية(الصف الاول الثانوي)</h4>
                <span class="status-badge">جدول هذا الاسبوع </span>
            </div>

            <div class="table-responsive">
                <table class="tech-table">
                    <thead>
                        <tr>
                            <th>اليوم</th>
                            <th>المادة التكنولوجية/الورش المقررة</th>
                            <th>المهندس المحاضر </th>
                            <th>التوقيت </th>
                            <th>غرف البث المباشر</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>الاحد</strong></td>
                            <td><span class="tech-badge badge-blue">أساسيات لغات البرمجة والـ Logic</span></td>
                            <td class="instructor-name">م. وفاء</td>
                             <td>04:00 مساءً</td>
                             <td style="text-align: center;"><a href="#" class="btn-action"> دخول البث</a></td>
                        </tr>
                        <tr>
                            <td><strong>الإثنين</strong></td>
                            <td><span class="tech-badge badge-purple">مقدمة في بناء الخوارزميات (Algorithms)</span></td>
                            <td class="instructor-name">م. عبد الرحمن</td>
                            <td>06:00 مساءً</td>
                            <td style="text-align: center;"><a href="#" class="btn-action"> دخول البث</a></td>
                        </tr>
                          <tr>
                            <td><strong>الثلاثاء</strong></td>
                            <td><span class="tech-badge badge-blue">مناهج تكنولوجيا المعلومات والذكاء الاصطناعي</span></td>
                            <td class="instructor-name">م. آيات</td>
                            <td>05:00 مساءً</td>
                            <td style="text-align: center;"><a href="#" class="btn-action"> دخول البث</a></td>
                        </tr>
                          <tr>
                            <td><strong>الأربعاء</strong></td>
                            <td><span class="tech-badge badge-purple">حل مشكلات البرمجة (Problem Solving)</span></td>
                            <td class="instructor-name">م. أحمد أيمن</td>
                            <td>08:00 مساءً</td>
                            <td style="text-align: center;"><a href="#" class="btn-action"> دخول البث</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>
    
</body>
</html>
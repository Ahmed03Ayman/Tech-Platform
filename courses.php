<?php include 'header.php'; ?>

<style>
    .courses-page {
        padding: 60px 7%;
    }

    .courses-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .courses-title h1 {
        font-size: 38px;
        margin: 15px 0 10px;
    }

    .courses-title p {
        color: #888;
    }

    .courses-container {
        max-width: 1100px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .course-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 22px;
        padding: 20px;
        transition: .3s;
    }

    .course-card:hover {
        transform: translateY(-6px);
        border-color: #4f46e5;
        box-shadow: 0 15px 35px rgba(79, 70, 229, .12);
    }

    .course-image {
        height: 160px;
        background: #eeedff;
        border-radius: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 55px;
        margin-bottom: 20px;
    }

    .course-card h2 {
        font-size: 19px;
        margin-bottom: 8px;
    }

    .subject {
        color: #4f46e5;
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .teacher {
        color: #777;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .course-info {
        color: #777;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;
        color: #888;
        font-size: 12px;
        margin-top: 15px;
        margin-bottom: 7px;
    }

    .progress {
        height: 8px;
        background: #eee;
        border-radius: 10px;
    }

    .progress-bar {
        height: 100%;
        background: #4f46e5;
        border-radius: 10px;
    }

    .course-btn {
        display: block;
        text-align: center;
        background: #4f46e5;
        color: white;
        padding: 11px;
        border-radius: 10px;
        margin-top: 20px;
        font-weight: bold;
        font-size: 13px;
        transition: .3s;
    }

    .course-btn:hover {
        background: #3730a3;
    }

    @media (max-width: 900px) {
        .courses-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .courses-container {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="courses-page">

    <div class="courses-title">

        <span class="tag">
            منصة TEC
        </span>

        <h1>
            اختار مرحلتك الدراسية
        </h1>

        <p>
            ابدأ التعلم واختر الكورس المناسب ليك.
        </p>

    </div>


    <div class="courses-container">


        <!-- First Preparatory -->
        <div class="course-card">
            <div class="course-image">💻</div>
            <h2>الصف الأول الإعدادي</h2>
            <div class="subject">التكنولوجيا</div>
            <div class="teacher">Eng. Abdelrahman</div>
            <div class="course-info">10 دروس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>60%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:60%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 1 -->
            <a href="course-details.php?course_id=1" class="course-btn">
                ابدأ التعلم
            </a>
        </div>


        <!-- Second Preparatory -->
        <div class="course-card">
            <div class="course-image">⚙️</div>
            <h2>الصف الثاني الإعدادي</h2>
            <div class="subject">التكنولوجيا</div>
            <div class="teacher">Eng. Ayat Matter</div>
            <div class="course-info">12 درس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>40%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:40%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 2 -->
            <a href="course-details.php?course_id=2" class="course-btn">
                ابدأ التعلم
            </a>
        </div>


        <!-- Third Preparatory -->
        <div class="course-card">
            <div class="course-image">🌐</div>
            <h2>الصف الثالث الإعدادي</h2>
            <div class="subject">التكنولوجيا</div>
            <div class="teacher">Eng. Ahmed Ayman</div>
            <div class="course-info">15 درس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>20%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:20%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 3 -->
            <a href="course-details.php?course_id=3" class="course-btn">
                ابدأ التعلم
            </a>
        </div>


        <!-- First Secondary -->
        <div class="course-card">
            <div class="course-image">💻</div>
            <h2>الصف الأول الثانوي</h2>
            <div class="subject">البرمجة</div>
            <div class="teacher">Eng. Wafaa</div>
            <div class="course-info">20 درس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>30%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:30%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 4 -->
            <a href="course-details.php?course_id=4" class="course-btn">
                ابدأ التعلم
            </a>
        </div>


        <!-- Second Secondary -->
        <div class="course-card">
            <div class="course-image">⌨️</div>
            <h2>الصف الثاني الثانوي</h2>
            <div class="subject">البرمجة</div>
            <div class="teacher">Eng. Ganna</div>
            <div class="course-info">20 درس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>10%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:10%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 5 -->
            <a href="course-details.php?course_id=5" class="course-btn">
                ابدأ التعلم
            </a>
        </div>


        <!-- Third Secondary -->
        <div class="course-card">
            <div class="course-image">🚀</div>
            <h2>الصف الثالث الثانوي</h2>
            <div class="subject">البرمجة</div>
            <div class="teacher">Eng. Ahmed</div>
            <div class="course-info">25 درس</div>
            <div class="progress-info">
                <span>التقدم</span>
                <span>0%</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width:0%"></div>
            </div>
            <!-- تم تعديل الرابط هنا بإضافة ID = 6 -->
            <a href="course-details.php?course_id=6" class="course-btn">
                ابدأ التعلم
            </a>
        </div>

    </div>

</div>


<?php include 'footer.php'; ?>
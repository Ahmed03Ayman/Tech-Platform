<?php include 'header.php'; ?>

<style>

    .details-page {
        max-width: 1100px;
        margin: auto;
        padding: 55px 7%;
    }

    .back {
        color: #4f46e5;
        font-weight: bold;
        display: inline-block;
        margin-bottom: 25px;
    }

    .course-header {
        background: white;
        border-radius: 25px;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 5px 25px rgba(0,0,0,.06);
        margin-bottom: 45px;
    }

    .course-header h1 {
        font-size: 35px;
        margin: 15px 0;
    }

    .course-header p {
        color: #888;
        margin-top: 6px;
    }

    .tag {
        display: inline-block;
        background: #eeedff;
        color: #4f46e5;
        padding: 7px 15px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: bold;
    }

    .circle {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: conic-gradient(
            #4f46e5 0% 60%,
            #ddd 60% 100%
        );
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circle-inner {
        width: 115px;
        height: 115px;
        background: white;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .circle-inner strong {
        color: #4f46e5;
        font-size: 25px;
    }

    .circle-inner span {
        color: #888;
        font-size: 12px;
    }

    .lessons-title {
        margin-bottom: 20px;
    }

    .lesson {
        background: white;
        border: 1px solid #eee;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: .3s;
    }

    .lesson:hover {
        border-color: #4f46e5;
        box-shadow: 0 8px 20px rgba(79,70,229,.08);
    }

    .lesson-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .lesson-number {
        width: 42px;
        height: 42px;
        background: #eeedff;
        color: #4f46e5;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .lesson h3 {
        font-size: 16px;
    }

    .lesson p {
        color: #999;
        font-size: 12px;
        margin-top: 4px;
    }

    .completed {
        color: #22a98f;
        font-size: 13px;
        font-weight: bold;
    }

    .locked {
        color: #aaa;
        font-size: 13px;
    }

    /* Team Section */

    .team-section {
        margin-top: 60px;
    }

    .team-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .team-title h2 {
        font-size: 30px;
        margin-bottom: 8px;
    }

    .team-title p {
        color: #888;
        font-size: 14px;
    }

    .team-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .team-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 25px 15px;
        text-align: center;
        transition: .3s;
    }

    .team-card:hover {
        transform: translateY(-5px);
        border-color: #4f46e5;
        box-shadow: 0 12px 30px rgba(79,70,229,.10);
    }

    .team-icon {
        width: 65px;
        height: 65px;
        margin: auto;
        margin-bottom: 15px;
        border-radius: 50%;
        background: #eeedff;
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
    }

    .team-card h3 {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .team-card p {
        color: #888;
        font-size: 12px;
    }

    @media (max-width: 800px) {

        .course-header {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }

        .team-container {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 500px) {

        .team-container {
            grid-template-columns: 1fr;
        }

    }

</style>


<div class="details-page">

    <a href="courses.php" class="back">
        ← العودة للكورسات
    </a>


    <!-- Course Information -->

    <div class="course-header">

        <div>

            <span class="tag">
                منصة TEC
            </span>

            <h1>
                الصف الثالث الإعدادي
            </h1>

            <p>
                مادة التكنولوجيا
            </p>

            <p>
                15 درس
            </p>

        </div>


        <div class="circle">

            <div class="circle-inner">

                <strong>60%</strong>

                <span>مكتمل</span>

            </div>

        </div>

    </div>


    <!-- Lessons -->

    <h2 class="lessons-title">
        الدروس
    </h2>


    <div class="lesson">

        <div class="lesson-info">

            <div class="lesson-number">
                ✓
            </div>

            <div>

                <h3>
                    مقدمة في التكنولوجيا
                </h3>

                <p>
                    09:20 دقيقة
                </p>

            </div>

        </div>

        <span class="completed">
            مكتمل
        </span>

    </div>


    <div class="lesson">

        <div class="lesson-info">

            <div class="lesson-number">
                02
            </div>

            <div>

                <h3>
                    أساسيات التفكير البرمجي
                </h3>

                <p>
                    13:35 دقيقة
                </p>

            </div>

        </div>

        <span class="completed">
            مشاهدة
        </span>

    </div>


    <div class="lesson">

        <div class="lesson-info">

            <div class="lesson-number">
                03
            </div>

            <div>

                <h3>
                    مقدمة في البرمجة
                </h3>

                <p>
                    15:10 دقيقة
                </p>

            </div>

        </div>

        <span class="locked">
            🔒 مقفول
        </span>

    </div>


    <div class="lesson">

        <div class="lesson-info">

            <div class="lesson-number">
                04
            </div>

            <div>

                <h3>
                    أساسيات الخوارزميات
                </h3>

                <p>
                    18:25 دقيقة
                </p>

            </div>

        </div>

        <span class="locked">
            🔒 مقفول
        </span>

    </div>


    <!-- Team -->

    <section class="team-section">

        <div class="team-title">

            <span class="tag">
                TEC Team
            </span>

            <h2>
                فريق المدرسين
            </h2>

            <p>
                تعرف على فريق TEC المسؤول عن المحتوى التعليمي
            </p>

        </div>


        <div class="team-container">


            <div class="team-card">

                <div class="team-icon">
                    A
                </div>

                <h3>
                    Eng. Abdelrahman
                </h3>

                <p>
                    Technology Instructor
                </p>

            </div>


            <div class="team-card">

                <div class="team-icon">
                    A
                </div>

                <h3>
                    Eng. Ayat Matar
                </h3>

                <p>
                    Technology Instructor
                </p>

            </div>


            <div class="team-card">

                <div class="team-icon">
                    A
                </div>

                <h3>
                    Eng. Ahmed Ayman
                </h3>

                <p>
                    Technology Instructor
                </p>

            </div>


            <div class="team-card">

                <div class="team-icon">
                    W
                </div>

                <h3>
                    Eng. Wafaa
                </h3>

                <p>
                    Programming Instructor
                </p>

            </div>


            <div class="team-card">

                <div class="team-icon">
                    G
                </div>

                <h3>
                    Eng. Ganna
                </h3>

                <p>
                    Programming Instructor
                </p>

            </div>


            <div class="team-card">

                <div class="team-icon">
                    A
                </div>

                <h3>
                    Eng. Ahmed
                </h3>

                <p>
                    Programming Instructor
                </p>

            </div>


        </div>

    </section>

</div>


<?php include 'footer.php'; ?>
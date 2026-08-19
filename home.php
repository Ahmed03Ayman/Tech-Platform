<?php include 'header.php'; ?>

<style>

    .hero {
        max-width: 1150px;
        min-height: 550px;
        margin: auto;
        padding: 70px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }

    .hero-text {
        flex: 1;
    }

    .tag {
        display: inline-block;
        background: #eeedff;
        color: #4f46e5;
        padding: 7px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: bold;
    }

    .hero h1 {
        font-size: 48px;
        line-height: 1.5;
        margin: 20px 0;
    }

    .hero h1 span {
        color: #4f46e5;
    }

    .hero p {
        color: #777;
        line-height: 2;
        margin-bottom: 25px;
    }

    .start-btn {
        background: #4f46e5;
        color: white;
        border: none;
        padding: 13px 28px;
        border-radius: 10px;
        font-family: inherit;
        font-weight: bold;
        cursor: pointer;
    }

    .start-btn:hover {
        background: #3730a3;
    }

    .hero-image {
        width: 430px;
        height: 350px;
        background: #eeedff;
        border-radius: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .laptop {
        width: 280px;
        height: 180px;
        background: #222;
        border-radius: 15px;
        padding: 15px;
    }

    .screen {
        background: #111;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        padding: 25px;
    }

    .code {
        height: 8px;
        width: 80%;
        background: #4f46e5;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .code:nth-child(2) {
        width: 60%;
        background: #22a98f;
    }

    .code:nth-child(3) {
        width: 75%;
    }

    .floating {
        position: absolute;
        background: white;
        padding: 13px 17px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,.1);
        font-size: 13px;
        font-weight: bold;
    }

    .floating.one {
        top: 30px;
        right: 15px;
        color: #4f46e5;
    }

    .floating.two {
        bottom: 30px;
        left: 15px;
        color: #22a98f;
    }

    .section {
        padding: 70px 7%;
        background: white;
    }

    .section-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-title h2 {
        font-size: 30px;
        margin: 12px 0;
    }

    .section-title p {
        color: #888;
    }

    .cards {
        max-width: 1100px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .card {
        background: #fafaff;
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 25px;
        transition: .3s;
    }

    .card:hover {
        transform: translateY(-5px);
        border-color: #4f46e5;
        box-shadow: 0 15px 35px rgba(79,70,229,.12);
    }

    .icon {
        width: 55px;
        height: 55px;
        background: #eeedff;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        margin-bottom: 15px;
    }

    .card h3 {
        font-size: 17px;
    }

    .card p {
        color: #888;
        font-size: 13px;
        margin-top: 7px;
    }

    @media (max-width: 800px) {

        .hero {
            flex-direction: column;
            text-align: center;
        }

        .hero-image {
            width: 100%;
        }

        .cards {
            grid-template-columns: 1fr;
        }

        .hero h1 {
            font-size: 36px;
        }
    }

</style>


<section class="hero">

    <div class="hero-text">

        <span class="tag">
            منصة TEC التعليمية
        </span>

        <h1>
            اتعلم التكنولوجيا
            <br>
            <span>بطريقة أبسط</span>
        </h1>

        <p>
            منصة TEC تساعدك على تعلم التكنولوجيا والبرمجة
            من خلال دروس مبسطة واختبارات تفاعلية ومتابعة تقدمك.
        </p>

        <a href="courses.php">
            <button class="start-btn">
                ابدأ رحلتك الآن
            </button>
        </a>

    </div>


    <div class="hero-image">

        <div class="floating one">
            &lt;/&gt; Coding
        </div>

        <div class="laptop">

            <div class="screen">

                <div class="code"></div>
                <div class="code"></div>
                <div class="code"></div>

            </div>

        </div>

        <div class="floating two">
            ✓ اختبار ناجح
        </div>

    </div>

</section>


<section class="section">

    <div class="section-title">

        <span class="tag">
            لماذا TEC؟
        </span>

        <h2>
            كل اللي تحتاجه في مكان واحد
        </h2>

        <p>
            تعلم بطريقة سهلة ومنظمة.
        </p>

    </div>


    <div class="cards">

        <div class="card">

            <div class="icon">
                📚
            </div>

            <h3>
                دروس مبسطة
            </h3>

            <p>
                محتوى تعليمي مناسب لكل مرحلة.
            </p>

        </div>


        <div class="card">

            <div class="icon">
                ✓
            </div>

            <h3>
                اختبارات تفاعلية
            </h3>

            <p>
                اختبر نفسك بعد كل درس.
            </p>

        </div>


        <div class="card">

            <div class="icon">
                🏆
            </div>

            <h3>
                الإنجازات
            </h3>

            <p>
                تابع تقدمك واحصل على الإنجازات.
            </p>

        </div>

    </div>

</section>


<?php include 'footer.php'; ?>
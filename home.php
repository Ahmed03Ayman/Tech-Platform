<?php include 'header.php'; ?>

<style>
    /* ========================================= */
    /*           الإعدادات العامة للسكاشن          */
    /* ========================================= */
    
    /* كبرنا الـ Padding هنا عشان السكاشن تبقى أطول ومريحة للعين */
    .section {
        padding: 100px 7%; 
        background: white;
    }

    .bg-light {
        background: #f7f9fc;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 34px;
        margin: 15px 0;
        color: #202333;
    }

    .section-title p {
        color: #777;
        font-size: 16px;
    }

    .tag {
        display: inline-block;
        background: #eeedff;
        color: #4f46e5;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: bold;
    }

    /* ========================================= */
    /*              سكشن 1: Hero                 */
    /* ========================================= */
    .hero {
        max-width: 1150px;
        min-height: 600px;
        margin: auto;
        padding: 80px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }

    .hero-text {
        flex: 1;
    }

    .hero h1 {
        font-size: 52px;
        line-height: 1.5;
        margin: 20px 0;
        color: #202333;
    }

    .hero h1 span {
        color: #4f46e5;
    }

    .hero p {
        color: #666;
        line-height: 2;
        font-size: 17px;
        margin-bottom: 30px;
    }

    .start-btn {
        background: #4f46e5;
        color: white;
        border: none;
        padding: 15px 32px;
        border-radius: 12px;
        font-family: inherit;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: .3s;
        box-shadow: 0 10px 20px rgba(79,70,229,.2);
    }

    .start-btn:hover {
        background: #3730a3;
        transform: translateY(-3px);
    }

    .hero-image {
        width: 480px;
        height: 380px;
        background: #eeedff;
        border-radius: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .laptop {
        width: 300px;
        height: 200px;
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
        padding: 15px 20px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,.1);
        font-size: 14px;
        font-weight: bold;
    }

    .floating.one { top: 40px; right: -20px; color: #4f46e5; }
    .floating.two { bottom: 40px; left: -20px; color: #22a98f; }

    /* ========================================= */
    /*        سكشن 2 & 3: الكروت والمسارات       */
    /* ========================================= */
    .cards {
        max-width: 1150px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .card, .track-card {
        background: white;
        border: 1px solid #eaeaea;
        border-radius: 20px;
        padding: 35px 25px;
        transition: .3s;
    }

    .card:hover, .track-card:hover {
        transform: translateY(-8px);
        border-color: #4f46e5;
        box-shadow: 0 15px 35px rgba(79,70,229,.1);
    }

    .track-card { text-align: center; }

    .icon, .track-icon {
        width: 65px;
        height: 65px;
        background: #eeedff;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin-bottom: 20px;
    }

    .track-icon { margin: 0 auto 20px; background: none; font-size: 45px; }

    .card h3, .track-card h3 {
        font-size: 20px;
        color: #202333;
        margin-bottom: 10px;
    }

    .card p, .track-card p {
        color: #777;
        font-size: 15px;
        line-height: 1.6;
    }

    /* ========================================= */
    /*           سكشن 4: خطوات التعلم           */
    /* ========================================= */
    .steps-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        max-width: 1150px;
        margin: auto;
    }

    .step-box {
        flex: 1;
        text-align: center;
        padding: 20px;
    }

    .step-number {
        width: 65px;
        height: 65px;
        background: #eeedff;
        color: #4f46e5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        font-weight: bold;
        margin: auto auto 25px;
        transition: .3s;
        border: 4px solid white;
        box-shadow: 0 5px 15px rgba(79,70,229,.15);
    }

    .step-box:hover .step-number {
        background: #4f46e5;
        color: white;
        transform: scale(1.1);
    }

    .step-box h3 { font-size: 19px; color: #202333; margin-bottom: 10px; }
    .step-box p { color: #777; font-size: 14px; line-height: 1.7; }

    /* ========================================= */
    /*      سكشن 5: إحصائيات المنصة (جديد)      */
    /* ========================================= */
    .stats-section {
        background: #4f46e5;
        padding: 80px 7%;
        color: white;
    }

    .stats-container {
        max-width: 1150px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        text-align: center;
    }

    .stat-box h3 {
        font-size: 45px;
        margin-bottom: 5px;
        font-weight: 800;
    }

    .stat-box p {
        color: #e0e7ff;
        font-size: 16px;
        font-weight: 600;
    }

    /* ========================================= */
    /*       سكشن 6: آراء الطلاب (جديد)         */
    /* ========================================= */
    .testimonials-container {
        max-width: 1150px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .testi-card {
        background: white;
        border: 1px solid #eaeaea;
        border-radius: 20px;
        padding: 35px 25px;
        box-shadow: 0 5px 25px rgba(0,0,0,.03);
    }

    .testi-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .testi-avatar {
        width: 55px;
        height: 55px;
        background: #f0f4ff;
        color: #4f46e5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
    }

    .testi-info h4 { font-size: 17px; color: #202333; margin-bottom: 3px; }
    .testi-info span { font-size: 13px; color: #888; }
    
    .stars { color: #fbbf24; font-size: 14px; margin-bottom: 15px; }
    .testi-card p { color: #666; font-size: 15px; line-height: 1.8; font-style: italic; }

    /* ========================================= */
    /*                  التجاوب                  */
    /* ========================================= */
    @media (max-width: 900px) {
        .hero { flex-direction: column; text-align: center; }
        .hero-image { width: 100%; }
        .floating { display: none; } /* إخفاء العناصر الطائرة في الموبايل لعدم الزحمة */
        .cards, .testimonials-container { grid-template-columns: repeat(2, 1fr); }
        .stats-container { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 600px) {
        .cards, .steps-container, .testimonials-container, .stats-container {
            grid-template-columns: 1fr;
            flex-direction: column;
        }
        .hero h1 { font-size: 38px; }
        .section { padding: 70px 5%; } /* تقليل الحواف في الموبايل */
    }
</style>

<!-- سكشن 1: البداية (Hero) -->
<section class="hero bg-light">
    <div class="hero-text">
        <span class="tag">منصة TEC التعليمية</span>
        <h1>
            اتعلم التكنولوجيا
            <br>
            <span>بطريقة أبسط</span>
        </h1>
        <p>
            منصة TEC بتوفرلك بيئة تعليمية متكاملة عشان تتعلم البرمجة والتكنولوجيا من الصفر للاحتراف، مع متابعة مستمرة وتقييم عملي لمشاريعك.
        </p>
        <a href="courses.php">
            <button class="start-btn">ابدأ رحلتك الآن</button>
        </a>
    </div>
    <div class="hero-image">
        <div class="floating one">&lt;/&gt; Coding</div>
        <div class="laptop">
            <div class="screen">
                <div class="code"></div>
                <div class="code"></div>
                <div class="code"></div>
            </div>
        </div>
        <div class="floating two">✓ اختبار ناجح</div>
    </div>
</section>

<!-- سكشن 2: الإحصائيات (جديد) -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-box">
            <h3>+5000</h3>
            <p>طالب مسجل</p>
        </div>
        <div class="stat-box">
            <h3>+50</h3>
            <p>كورس تعليمي</p>
        </div>
        <div class="stat-box">
            <h3>+100</h3>
            <p>بث مباشر</p>
        </div>
        <div class="stat-box">
            <h3>%98</h3>
            <p>نسبة النجاح</p>
        </div>
    </div>
</section>

<!-- سكشن 3: لماذا نحن -->
<section class="section" id="about">
    <div class="section-title">
        <span class="tag">لماذا TEC؟</span>
        <h2>كل اللي تحتاجه في مكان واحد</h2>
        <p>نظام تعليمي متكامل بيضمنلك تفاعل حقيقي مش مجرد فيديوهات.</p>
    </div>
    <div class="cards">
        <div class="card">
            <div class="icon">📚</div>
            <h3>مناهج مبسطة</h3>
            <p>محتوى تعليمي متدرج الصعوبة ومناسب لكل مرحلة دراسية عشان تضمن الفهم الكامل.</p>
        </div>
        <div class="card">
            <div class="icon">✓</div>
            <h3>اختبارات تفاعلية</h3>
            <p>اختبر نفسك بعد كل درس من خلال كويزات ذكية بتوضحلك نقط ضعفك وقوتك.</p>
        </div>
        <div class="card">
            <div class="icon">🏆</div>
            <h3>متابعة الإنجازات</h3>
            <p>تابع تقدمك خطوة بخطوة واحصل على شارات وتقييمات من المهندسين على مشاريعك.</p>
        </div>
    </div>
</section>

<!-- سكشن 4: المسارات التعليمية -->
<section class="section bg-light">
    <div class="section-title">
        <span class="tag">تصفح المحتوى</span>
        <h2>المسارات التعليمية المتاحة</h2>
        <p>اختر المجال اللي حابب تطور نفسك فيه وتبني فيه مشاريعك</p>
    </div>
    <div class="cards">
        <div class="track-card">
            <div class="track-icon">💻</div>
            <h3>البرمجة وتطوير الويب</h3>
            <p>تعلم لغات البرمجة الحديثة وابني مواقع ويب وتطبيقات متكاملة من الصفر.</p>
        </div>
        <div class="track-card">
            <div class="track-icon">🤖</div>
            <h3>تكنولوجيا المعلومات</h3>
            <p>افهم أساسيات التكنولوجيا، الذكاء الاصطناعي، وكيفية توظيفها في المستقبل.</p>
        </div>
        <div class="track-card">
            <div class="track-icon">📐</div>
            <h3>الرياضيات والمنطق</h3>
            <p>تأسيس قوي في الرياضيات لحل المشكلات المعقدة وتطوير التفكير البرمجي.</p>
        </div>
    </div>
</section>

<!-- سكشن 5: خطوات التعلم -->
<section class="section">
    <div class="section-title">
        <span class="tag">خطوات البداية</span>
        <h2>إزاي تبدأ رحلتك معانا؟</h2>
        <p>4 خطوات بسيطة تفصلك عن تطوير مهاراتك بشكل احترافي</p>
    </div>
    <div class="steps-container">
        <div class="step-box">
            <div class="step-number">1</div>
            <h3>إنشاء حساب</h3>
            <p>سجل بياناتك وانضم لآلاف الطلاب على المنصة في أقل من دقيقة.</p>
        </div>
        <div class="step-box">
            <div class="step-number">2</div>
            <h3>اختر مسارك</h3>
            <p>حدد مرحلتك الدراسية وابدأ في مشاهدة الدروس المخصصة ليك.</p>
        </div>
        <div class="step-box">
            <div class="step-number">3</div>
            <h3>التطبيق العملي</h3>
            <p>نفذ مشاريع برمجية حقيقية بايدك واختبر معلوماتك بالكويزات المستمرة.</p>
        </div>
        <div class="step-box">
            <div class="step-number">4</div>
            <h3>التقييم والشهادة</h3>
            <p>احصل على تقييم لأكوادك من المهندسين وشهادة إتمام معتمدة.</p>
        </div>
    </div>
</section>

<!-- سكشن 6: آراء الطلاب (جديد) -->
<section class="section bg-light">
    <div class="section-title">
        <span class="tag">قصص نجاح</span>
        <h2>رأي طلابنا في منصة TEC</h2>
        <p>اكتشف إزاي المنصة ساعدت آلاف الطلاب في تحسين مستواهم</p>
    </div>
    <div class="testimonials-container">
        <div class="testi-card">
            <div class="testi-header">
                <div class="testi-avatar">أ</div>
                <div class="testi-info">
                    <h4>أحمد محمود</h4>
                    <span>الصف الأول الثانوي</span>
                </div>
            </div>
            <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p>"الشرح مبسط جداً والمتابعة ممتازة، قدرت أعمل أول مشروع برمجي ليا بفضل توجيهات المهندسين هنا. شكراً TEC!"</p>
        </div>

        <div class="testi-card">
            <div class="testi-header">
                <div class="testi-avatar">س</div>
                <div class="testi-info">
                    <h4>سلمى طارق</h4>
                    <span>الصف الثالث الإعدادي</span>
                </div>
            </div>
            <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <p>"كنت بخاف من التكنولوجيا والبرمجة، بس طريقة الشرح والتطبيق العملي بعد كل درس خلتني أحب المجال جداً وأفهمه بسهولة."</p>
        </div>

        <div class="testi-card">
            <div class="testi-header">
                <div class="testi-avatar">ع</div>
                <div class="testi-info">
                    <h4>عمر خالد</h4>
                    <span>الصف الثاني الثانوي</span>
                </div>
            </div>
            <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p>"منصة أكثر من رائعة، ميزة الورش اللايف ساعدتني أسأل المهندسين براحتي وأصحح أخطائي البرمجية أول بأول."</p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
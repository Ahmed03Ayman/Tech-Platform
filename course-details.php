<?php 
require_once 'connection.php'; 

// 1. جلب رقم الكورس من الرابط، لو مفيش رقم نخليه 1 افتراضي
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 1;

// 2. استعلام لجلب بيانات الكورس واسم المهندس من الداتا بيز
$query = "SELECT courses.*, instructors.name AS instructor_name, categories.name AS category_name 
          FROM courses 
          LEFT JOIN instructors ON courses.instructor_id = instructors.id
          LEFT JOIN categories ON courses.category_id = categories.id
          WHERE courses.id = $course_id LIMIT 1";

$result = mysqli_query($conn, $query);

// 3. التحقق من وجود الكورس
if ($result && mysqli_num_rows($result) > 0) {
    $course = mysqli_fetch_assoc($result);
} else {
    // بيانات افتراضية لو الكورس لسه متضافش في قاعدة البيانات
    $course = [
        'title' => 'كورس تعليمي جديد',
        'grade_level' => 'المرحلة الدراسية غير محددة',
        'duration' => 'غير محدد',
        'instructor_name' => 'فريق TEC'
    ];
}

include 'header.php'; 
?>

<style>
    .details-page { max-width: 1100px; margin: auto; padding: 55px 7%; }
    .back { color: #4f46e5; font-weight: bold; display: inline-block; margin-bottom: 25px; }
    
    .course-header {
        background: white; border-radius: 25px; padding: 40px;
        display: flex; align-items: center; justify-content: space-between;
        box-shadow: 0 5px 25px rgba(0,0,0,.06); margin-bottom: 45px;
    }
    .course-header h1 { font-size: 35px; margin: 15px 0; color: #202333; }
    .course-header p { color: #555; margin-top: 6px; font-size: 15px; }
    
    .tag {
        display: inline-block; background: #eeedff; color: #4f46e5;
        padding: 7px 15px; border-radius: 30px; font-size: 13px; font-weight: bold;
    }
    
    .circle {
        width: 150px; height: 150px; border-radius: 50%;
        background: conic-gradient(#4f46e5 0% 0%, #ddd 0% 100%);
        display: flex; align-items: center; justify-content: center;
    }
    .circle-inner {
        width: 115px; height: 115px; background: white; border-radius: 50%;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .circle-inner strong { color: #4f46e5; font-size: 25px; }
    .circle-inner span { color: #888; font-size: 12px; }
    
    .lessons-title { margin-bottom: 20px; color: #202333;}
    
    .enroll-btn {
        display: inline-block; background: #4f46e5; color: white;
        padding: 13px 30px; border-radius: 10px; font-weight: bold; font-size: 14px;
        margin-bottom: 35px; transition: .3s;
    }
    .enroll-btn:hover { background: #3730a3; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(79,70,229,.2);}
    
    .lesson {
        background: white; border: 1px solid #eee; border-radius: 16px;
        padding: 20px; margin-bottom: 15px; display: flex;
        align-items: center; justify-content: space-between; transition: .3s; text-decoration: none;
    }
    .lesson:hover { border-color: #4f46e5; box-shadow: 0 8px 20px rgba(79,70,229,.08); }
    .lesson-info { display: flex; align-items: center; gap: 15px; }
    .lesson-number {
        width: 42px; height: 42px; background: #eeedff; color: #4f46e5;
        border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold;
    }
    .lesson h3 { font-size: 16px; color: #202333; }
    .lesson p { color: #999; font-size: 12px; margin-top: 4px; }
    .completed { color: #22a98f; font-size: 13px; font-weight: bold; }
    .locked { color: #aaa; font-size: 13px; }

    /* Team Section */
    .team-section { margin-top: 60px; }
    .team-title { text-align: center; margin-bottom: 30px; }
    .team-title h2 { font-size: 30px; margin-bottom: 8px; color: #202333;}
    .team-title p { color: #888; font-size: 14px; }
    .team-container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .team-card {
        background: white; border: 1px solid #eee; border-radius: 20px;
        padding: 25px 15px; text-align: center; transition: .3s;
    }
    .team-card:hover { transform: translateY(-5px); border-color: #4f46e5; box-shadow: 0 12px 30px rgba(79,70,229,.10); }
    .team-icon {
        width: 65px; height: 65px; margin: auto auto 15px; border-radius: 50%;
        background: #eeedff; color: #4f46e5; display: flex;
        align-items: center; justify-content: center; font-size: 24px; font-weight: bold;
    }
    .team-card h3 { font-size: 16px; margin-bottom: 5px; color: #202333;}
    .team-card p { color: #888; font-size: 12px; }

    @media (max-width: 800px) {
        .course-header { flex-direction: column; text-align: center; gap: 30px; }
        .team-container { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 500px) {
        .team-container { grid-template-columns: 1fr; }
    }
</style>

<div class="details-page">

    <a href="courses.php" class="back">← العودة للكورسات</a>

    <!-- Course Information -->
    <div class="course-header">
        <div>
            <span class="tag">منصة TEC</span>
            <!-- عرض بيانات الكورس من الداتا بيز -->
            <h1><?php echo htmlspecialchars($course['grade_level'] ?? 'مرحلة غير محددة'); ?></h1>
            <p><i class="fa-solid fa-book me-1"></i> <?php echo htmlspecialchars($course['title']); ?></p>
            <p><i class="fa-solid fa-clock me-1"></i> المدة: <?php echo htmlspecialchars($course['duration'] ?? 'غير محدد'); ?></p>
            <p><i class="fa-solid fa-user-tie me-1"></i> المهندس: <?php echo htmlspecialchars($course['instructor_name'] ?? 'فريق TEC'); ?></p>
        </div>

        <div class="circle">
            <div class="circle-inner">
                <strong>0%</strong>
                <span>مكتمل</span>
            </div>
        </div>
    </div>

    <!-- إرسال رقم الكورس لصفحة الدفع -->
    <a href="payment.php?course_id=<?php echo $course_id; ?>" class="enroll-btn">
        اشترك الآن
    </a>

    <!-- Lessons -->
    <h2 class="lessons-title">الدروس</h2>
    
    <!-- الدرس الأول: مفتوح -->
    <div class="lesson">
        <div class="lesson-info">
            <div class="lesson-number">✓</div>
            <div>
                <h3>مقدمة في الكورس</h3>
                <p>09:20 دقيقة</p>
            </div>
        </div>
        <span class="completed">متاح مجاناً</span>
    </div>

    <!-- الدرس الثاني: مفتوح -->
    <div class="lesson">
        <div class="lesson-info">
            <div class="lesson-number">02</div>
            <div>
                <h3>الدرس الأول: الأساسيات</h3>
                <p>13:35 دقيقة</p>
            </div>
        </div>
        <span class="completed">متاح مجاناً</span>
    </div>

    <!-- الدرس الثالث: مقفول (يودي للدفع) -->
    <a href="payment.php?course_id=<?php echo $course_id; ?>" class="lesson">
        <div class="lesson-info">
            <div class="lesson-number" style="background: #f8f9fa; color: #aaa;">03</div>
            <div>
                <h3>الدرس الثاني: التطبيق العملي</h3>
                <p>15:10 دقيقة</p>
            </div>
        </div>
        <span class="locked">🔒 اشترك للمشاهدة</span>
    </a>

    <!-- الدرس الرابع: مقفول (يودي للدفع) -->
    <a href="payment.php?course_id=<?php echo $course_id; ?>" class="lesson">
        <div class="lesson-info">
            <div class="lesson-number" style="background: #f8f9fa; color: #aaa;">04</div>
            <div>
                <h3>الدرس الثالث: بناء المشروع الأول</h3>
                <p>22:45 دقيقة</p>
            </div>
        </div>
        <span class="locked">🔒 اشترك للمشاهدة</span>
    </a>

    <!-- الدرس الخامس: مقفول (يودي للدفع) -->
    <a href="payment.php?course_id=<?php echo $course_id; ?>" class="lesson">
        <div class="lesson-info">
            <div class="lesson-number" style="background: #f8f9fa; color: #aaa;">05</div>
            <div>
                <h3>الدرس الرابع: مراجعة وتقييم</h3>
                <p>18:30 دقيقة</p>
            </div>
        </div>
        <span class="locked">🔒 اشترك للمشاهدة</span>
    </a>

    <!-- Team -->
    <section class="team-section">
        <div class="team-title">
            <span class="tag">TEC Team</span>
            <h2>فريق المدرسين</h2>
            <p>تعرف على فريق TEC المسؤول عن المحتوى التعليمي</p>
        </div>
        <div class="team-container" id="team">
            <div class="team-card">
                <div class="team-icon">A</div>
                <h3>Eng. Abdelrahman</h3>
                <p>Technology Instructor</p>
            </div>
            <div class="team-card">
                <div class="team-icon">A</div>
                <h3>Eng. Ayat Matar</h3>
                <p>Technology Instructor</p>
            </div>
            <div class="team-card">
                <div class="team-icon">A</div>
                <h3>Eng. Ahmed Ayman</h3>
                <p>Technology Instructor</p>
            </div>
            <div class="team-card">
                <div class="team-icon">W</div>
                <h3>Eng. Wafaa</h3>
                <p>Programming Instructor</p>
            </div>
            <div class="team-card">
                <div class="team-icon">G</div>
                <h3>Eng. Ganna</h3>
                <p>Programming Instructor</p>
            </div>
            <div class="team-card">
                <div class="team-icon">A</div>
                <h3>Eng. Ahmed</h3>
                <p>Programming Instructor</p>
            </div>
        </div>
    </section>

</div>

<?php include 'footer.php'; ?>
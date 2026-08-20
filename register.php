<?php
session_start();
include 'header.php';
?>

<div class="container my-5 d-flex justify-content-center">
    <div class="card p-4 shadow-sm" style="max-width: 450px; width: 100%; border-radius: 15px;">
        <h3 class="text-center mb-3 fw-bold" style="color: #4f46e5;">إنشاء حساب جديد</h3>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center p-2"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <form action="register_process.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label font-weight-bold">الاسم بالكامل</label>
                <input type="text" name="fullname" class="form-control" placeholder="أدخل اسمك الكامل" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label font-weight-bold">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">كلمة المرور</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" placeholder="01xxxxxxxxx">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">تاريخ الميلاد</label>
                <input type="date" name="dob" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">الجنس</label>
                <select name="gender" class="form-control">
                    <option value="">اختر الجنس</option>
                    <option value="ذكر">ذكر</option>
                    <option value="أنثى">أنثى</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">الصورة الشخصية</label>
                <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpeg, image/gif">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background: #4f46e5; border: none; border-radius: 8px;">تسجيل الحساب</button>
        </form>

        <div class="text-center mt-3">
            <small>لديك حساب بالفعل؟ <a href="login.php" style="color: #4f46e5; text-decoration: none;" class="fw-bold">تسجيل الدخول</a></small>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php
session_start();
include 'connection.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : (isset($_SESSION['id']) ? $_SESSION['id'] : 1);
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 1;

$is_already_enrolled = false;
$check_enroll_query = "SELECT * FROM user_course WHERE user_id = '$user_id' AND course_id = '$course_id'";
$check_enroll_result = mysqli_query($conn, $check_enroll_query);

if ($check_enroll_result && mysqli_num_rows($check_enroll_result) > 0) {
    $is_already_enrolled = true;
}

$course_query = "SELECT * FROM courses WHERE id = '$course_id'";
$course_result = mysqli_query($conn, $course_query);
$course_data = mysqli_fetch_assoc($course_result);
$course_name = isset($course_data['title']) ? $course_data['title'] : (isset($course_data['name']) ? $course_data['name'] : 'كورس البرمجة المتقدم');
$course_price = isset($course_data['price']) ? $course_data['price'] : 1500;
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الدفع - Tech Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: system-ui, -apple-system, sans-serif; }
        .payment-card { border: 2px solid #e0e0e0; border-radius: 10px; cursor: pointer; transition: all 0.3s; }
        .payment-card.active { border-color: #0d6efd; background-color: #f0f7ff; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-5">
            <div class="card p-4 shadow-sm border-0">
                <h4 class="mb-3">ملخص الطلب</h4>
                <p class="d-flex justify-content-between"><span>اسم الكورس:</span> <strong><?php echo htmlspecialchars($course_name); ?></strong></p>
                <p class="d-flex justify-content-between"><span>السعر:</span> <strong><?php echo $course_price; ?> ج.م</strong></p>
                <hr>
                <p class="d-flex justify-content-between fs-5 fw-bold"><span>الإجمالي:</span> <span class="text-primary"><?php echo $course_price; ?> ج.م</span></p>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4 shadow-sm border-0">
                <?php if ($is_already_enrolled): ?>
                    <div class="alert alert-success text-center fw-bold p-4 my-auto">
                        أنت مشترك في هذا الكورس بالفعل!
                    </div>
                <?php else: ?>
                    <h4 class="mb-4">اختر طريقة الدفع</h4>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="payment-card active p-3 text-center" id="card-option" onclick="selectMethod('card')">
                                <strong>بطاقة بنكية (Visa/MasterCard)</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="payment-card p-3 text-center" id="wallet-option" onclick="selectMethod('wallet')">
                                <strong>محفظة كاش</strong>
                            </div>
                        </div>
                    </div>

                    <form action="process_payment.php" method="POST">
                        <input type="hidden" name="payment_method" id="payment_method_input" value="card">
                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

                        <div id="card-section">
                            <div class="mb-3">
                                <label class="form-label">اسم صاحب البطاقة</label>
                                <input type="text" name="card_holder" class="form-control" placeholder="الاسم كما هو مكتوب على الكارت" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">رقم البطاقة (16 رقم أرقام فقط)</label>
                                <input type="text" name="card_number" class="form-control" placeholder="1234 5678 9101 1121" maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">تاريخ الانتهاء</label>
                                    <input type="text" name="expiry" class="form-control" placeholder="MM/YY" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">الرمز السري CVV</label>
                                    <input type="text" name="cvv" class="form-control" placeholder="123" maxlength="4" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                </div>
                            </div>
                        </div>

                        <div id="wallet-section" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">رقم المحفظة (فودافون / اتصالات / أورنج كاش)</label>
                                <input type="text" name="wallet_number" class="form-control" placeholder="01012345678" maxlength="11" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fs-5 mt-3">تأكيد ودفع الآن</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function selectMethod(type) {
        document.getElementById('payment_method_input').value = type;
        let cardSection = document.getElementById('card-section');
        let walletSection = document.getElementById('wallet-section');
        let cardOpt = document.getElementById('card-option');
        let walletOpt = document.getElementById('wallet-option');

        if (type === 'card') {
            cardSection.style.display = 'block';
            walletSection.style.display = 'none';
            cardOpt.classList.add('active');
            walletOpt.classList.remove('active');
        } else {
            cardSection.style.display = 'none';
            walletSection.style.display = 'block';
            walletOpt.classList.add('active');
            cardOpt.classList.remove('active');
        }
    }
</script>
</body>
</html>
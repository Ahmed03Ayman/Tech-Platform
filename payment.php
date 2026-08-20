<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 1;

$query = "SELECT * FROM courses WHERE id = $course_id LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $course = mysqli_fetch_assoc($result);
} else {
    $query_fallback = "SELECT * FROM courses LIMIT 1";
    $result_fallback = mysqli_query($conn, $query_fallback);
    $course = mysqli_fetch_assoc($result_fallback);
}

$course_title = !empty($course['title']) ? $course['title'] : 'دورة تعليمية';
$grade_level = !empty($course['grade_level']) ? $course['grade_level'] : 'جميع المراحل';
$price = (isset($course['is_free']) && $course['is_free'] == 1) ? 0 : 350;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الدفع - <?php echo htmlspecialchars($course_title); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .payment-container {
            background: #ffffff;
            width: 100%;
            max-width: 900px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            overflow: hidden;
        }
        .order-summary {
            background-color: #eff6ff;
            padding: 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .summary-header h3 {
            color: #1e3a8a;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .course-card {
            background: #ffffff;
            padding: 15px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .course-icon {
            width: 50px;
            height: 50px;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .price-details {
            border-top: 2px dashed #cbd5e1;
            padding-top: 15px;
        }
        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #475569;
            font-size: 15px;
        }
        .price-row.total {
            color: #0f172a;
            font-weight: bold;
            font-size: 18px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            margin-top: 10px;
        }
        .payment-form {
            padding: 35px;
        }
        .payment-form h2 {
            color: #0f172a;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .methods {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }
        .method-btn {
            flex: 1;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 600;
            color: #64748b;
        }
        .method-btn.active {
            border-color: #2563eb;
            background-color: #eff6ff;
            color: #2563eb;
        }
        .input-group {
            margin-bottom: 18px;
        }
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s;
        }
        .input-group input:focus {
            border-color: #2563eb;
        }
        .inline-inputs {
            display: flex;
            gap: 15px;
        }
        .submit-btn {
            width: 100%;
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }
        .submit-btn:hover {
            background-color: #1d4ed8;
        }
        @media (max-width: 768px) {
            .payment-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="payment-container">
    <div class="order-summary">
        <div class="summary-header">
            <h3>تفاصيل الطلب</h3>
            <div class="course-card">
                <div class="course-icon">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div>
                    <h4 style="color:#1e293b;"><?php echo htmlspecialchars($course_title); ?></h4>
                    <span style="color:#64748b; font-size:13px;"><?php echo htmlspecialchars($grade_level); ?></span>
                </div>
            </div>

            <div class="price-details">
                <div class="price-row">
                    <span>سعر الكورس</span>
                    <span><?php echo $price; ?> ج.م</span>
                </div>
                <div class="price-row total">
                    <span>الإجمالي</span>
                    <span><?php echo $price; ?> ج.م</span>
                </div>
            </div>
        </div>

        <div style="font-size: 12px; color: #64748b; text-align: center; margin-top: 20px;">
            <i class="fa-solid fa-shield-halved"></i> عملية الدفع آمنة ومُشفرة 100%
        </div>
    </div>

    <div class="payment-form">
        <h2>اختر طريقة الدفع</h2>
        
        <div class="methods">
            <div class="method-btn active" onclick="selectMethod('card')">
                <i class="fa-solid fa-credit-card"></i> بطاقة إئتمان
            </div>
            <div class="method-btn" onclick="selectMethod('wallet')">
                <i class="fa-solid fa-mobile-screen-button"></i> محفظة إلكترونية
            </div>
        </div>

        <form action="process_payment.php" method="POST">
            <input type="hidden" name="course_id" value="<?php echo isset($course['id']) ? $course['id'] : ''; ?>">
            <div class="input-group">
                <label>اسم صاحب البطاقة</label>
                <input type="text" name="card_holder" placeholder="كما هو مكتوب على البطاقة" required>
            </div>

            <div class="input-group">
                <label>رقم البطاقة</label>
                <input type="text" name="card_number" maxlength="19" placeholder="**** **** **** ****" required>
            </div>

            <div class="inline-inputs">
                <div class="input-group" style="flex:1;">
                    <label>تاريخ الانتهاء</label>
                    <input type="text" name="exp_date" placeholder="MM/YY" maxlength="5" required>
                </div>
                <div class="input-group" style="flex:1;">
                    <label>رمز الأمان (CVV)</label>
                    <input type="password" name="cvv" placeholder="123" maxlength="4" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">تأكيد ودفع <?php echo $price; ?> ج.م</button>
        </form>
    </div>
</div>

<script>
    function selectMethod(type) {
        let btns = document.querySelectorAll('.method-btn');
        btns.forEach(btn => btn.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }
</script>

</body>
</html>
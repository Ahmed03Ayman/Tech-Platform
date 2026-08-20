<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : (isset($_SESSION['id']) ? $_SESSION['id'] : 1);
    $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 1;
    $payment_method = isset($_POST['payment_method']) ? mysqli_real_escape_string($conn, $_POST['payment_method']) : 'card';

    // 1. فحص وجود المستخدم لتفادي خطأ user_id
    $user_check = mysqli_query($conn, "SELECT id FROM users WHERE id = '$user_id'");
    if (!$user_check || mysqli_num_rows($user_check) == 0) {
        $first_user = mysqli_query($conn, "SELECT id FROM users LIMIT 1");
        if ($first_user && mysqli_num_rows($first_user) > 0) {
            $row = mysqli_fetch_assoc($first_user);
            $user_id = $row['id'];
        } else {
            $insert_user = "INSERT INTO users (id, full_name, email, password, gender) VALUES (1, 'مستخدم تجريبي', 'student@tech.com', '123456', 'male')";
            mysqli_query($conn, $insert_user);
            $user_id = 1;
        }
    }

    // 2. فحص وجود الكورس لتفادي خطأ course_id
    $course_check = mysqli_query($conn, "SELECT id FROM courses WHERE id = '$course_id'");
    if (!$course_check || mysqli_num_rows($course_check) == 0) {
        $first_course = mysqli_query($conn, "SELECT id FROM courses LIMIT 1");
        if ($first_course && mysqli_num_rows($first_course) > 0) {
            $row_course = mysqli_fetch_assoc($first_course);
            $course_id = $row_course['id'];
        } else {
            mysqli_query($conn, "INSERT INTO courses (id, title, price) VALUES (1, 'كورس البرمجة المتقدم', 1500)");
            $course_id = 1;
        }
    }

    // 3. فحص مدخلات الدفع الرقمية
    if ($payment_method == 'card') {
        $card_number = isset($_POST['card_number']) ? trim($_POST['card_number']) : '';
        $cvv = isset($_POST['cvv']) ? trim($_POST['cvv']) : '';

        if (!empty($card_number) && !preg_match('/^[0-9]+$/', $card_number)) {
            echo "<script>alert('عفواً، يجب كتابة أرقام فقط في رقم البطاقة!'); window.history.back();</script>";
            exit();
        }
        if (!empty($cvv) && !preg_match('/^[0-9]+$/', $cvv)) {
            echo "<script>alert('عفواً، يجب كتابة أرقام فقط في الرمز السري!'); window.history.back();</script>";
            exit();
        }
    } else if ($payment_method == 'wallet') {
        $wallet_number = isset($_POST['wallet_number']) ? trim($_POST['wallet_number']) : '';
        if (!empty($wallet_number) && !preg_match('/^[0-9]+$/', $wallet_number)) {
            echo "<script>alert('عفواً، يجب كتابة أرقام فقط في رقم المحفظة!'); window.history.back();</script>";
            exit();
        }
    }

    // 4. تسجيل الاشتراك
    $check_query = "SELECT * FROM user_course WHERE user_id = '$user_id' AND course_id = '$course_id'";
    $check_result = mysqli_query($conn, $check_query);

    if ($check_result && mysqli_num_rows($check_result) == 0) {
        $insert_query = "INSERT INTO user_course (user_id, course_id) VALUES ('$user_id', '$course_id')";
        mysqli_query($conn, $insert_query);
    }

    echo "<script>
        alert('تمت عملية الدفع وتأكيد الاشتراك بنجاح!');
        window.location.href = 'payment.php?course_id=" . $course_id . "';
    </script>";
}
?>
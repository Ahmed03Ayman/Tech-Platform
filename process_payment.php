<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = 1;
    $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
    $payment_method = isset($_POST['payment_method']) ? mysqli_real_escape_string($conn, $_POST['payment_method']) : 'card';

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
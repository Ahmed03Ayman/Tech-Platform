<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
    
    $user_query = "SELECT id FROM users LIMIT 1";
    $user_result = mysqli_query($conn, $user_query);
    
    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user_data = mysqli_fetch_assoc($user_result);
        $user_id = $user_data['id'];
    } else {
        $user_id = 1;
    }

    if ($course_id > 0) {
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

        $check_query = "SELECT * FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            $insert_query = "INSERT INTO user_course (user_id, course_id) VALUES ($user_id, $course_id)";
            mysqli_query($conn, $insert_query);
        }

        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

        echo "<script>
            alert('تمت عملية الدفع والاشتراك في الكورس بنجاح!');
            window.location.href = 'payment.php?course_id=" . $course_id . "';
        </script>";
    } else {
        echo "<script>
            alert('حدث خطأ في تحديد الكورس!');
            window.history.back();
        </script>";
    }
} else {
    header("Location: payment.php");
    exit();
}
?>
<?php

include 'connection.php';

$errors  = [];
$success = false;

$full_name = "";
$email     = "";
$phone     = "";
$subject   = "";
$message   = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = trim($_POST['full_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $subject   = trim($_POST['subject'] ?? '');
    $message   = trim($_POST['message'] ?? '');

    if ($full_name === '') {
        $errors[] = "من فضلك اكتب الاسم بالكامل.";
    } elseif (mb_strlen($full_name) > 100) {
        $errors[] = "الاسم طويل جدًا (100 حرف كحد أقصى).";
    }

    if ($email === '') {
        $errors[] = "من فضلك اكتب البريد الإلكتروني.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "البريد الإلكتروني غير صحيح.";
    }

    if ($phone !== '' && !preg_match('/^[0-9+\s-]{7,20}$/', $phone)) {
        $errors[] = "رقم الهاتف غير صحيح.";
    }

    if ($subject === '') {
        $errors[] = "من فضلك اختر موضوع الرسالة.";
    }

    if ($message === '') {
        $errors[] = "من فضلك اكتب رسالتك.";
    } elseif (mb_strlen($message) < 10) {
        $errors[] = "الرسالة قصيرة جدًا (10 أحرف على الأقل).";
    }

    if (empty($errors)) {

        $sql = "INSERT INTO contacts (full_name, email, phone, subject, message)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "sssss", $full_name, $email, $phone, $subject, $message);

            if (mysqli_stmt_execute($stmt)) {

                $success = true;

                $full_name = "";
                $email     = "";
                $phone     = "";
                $subject   = "";
                $message   = "";

            } else {
                $errors[] = "حدث خطأ أثناء إرسال الرسالة، حاول مرة أخرى.";
            }

            mysqli_stmt_close($stmt);

        } else {
            $errors[] = "حدث خطأ أثناء إرسال الرسالة، حاول مرة أخرى.";
        }
    }
}

include 'header.php';
?>

<style>

    .contact-page {
        padding: 60px 7%;
    }

    .contact-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .contact-title h1 {
        font-size: 38px;
        margin: 15px 0 10px;
    }

    .contact-title p {
        color: #888;
    }

    .contact-container {
        max-width: 1100px;
        margin: auto;
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 25px;
        align-items: start;
    }

    .form-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 22px;
        padding: 35px;
        box-shadow: 0 5px 25px rgba(0,0,0,.06);
    }

    .form-card h2 {
        font-size: 22px;
        margin-bottom: 6px;
    }

    .form-card > p {
        color: #888;
        font-size: 13px;
        margin-bottom: 25px;
    }

    .field {
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .field input,
    .field select,
    .field textarea {
        width: 100%;
        background: #fafaff;
        border: 1px solid #e6e6f0;
        border-radius: 12px;
        padding: 13px 15px;
        font-family: inherit;
        font-size: 14px;
        color: #202333;
        outline: none;
        transition: .3s;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
        border-color: #4f46e5;
        background: white;
        box-shadow: 0 0 0 4px rgba(79,70,229,.10);
    }

    .field textarea {
        min-height: 140px;
        resize: vertical;
    }

    .field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .send-btn {
        width: 100%;
        background: #4f46e5;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 10px;
        font-family: inherit;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        transition: .3s;
    }

    .send-btn:hover {
        background: #3730a3;
    }

    .alert {
        border-radius: 14px;
        padding: 16px 18px;
        font-size: 13px;
        line-height: 1.9;
        margin-bottom: 22px;
    }

    .alert.ok {
        background: #e6f7f3;
        border: 1px solid #22a98f;
        color: #17765f;
        font-weight: bold;
    }

    .alert.error {
        background: #fdeced;
        border: 1px solid #e5645f;
        color: #a12f2b;
    }

    .alert ul {
        margin: 0;
        padding-right: 18px;
    }

    .info-side {
        display: grid;
        gap: 18px;
    }

    .info-card {
        background: #fafaff;
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 25px;
        transition: .3s;
    }

    .info-card:hover {
        transform: translateY(-5px);
        border-color: #4f46e5;
        box-shadow: 0 15px 35px rgba(79,70,229,.12);
    }

    .info-card .icon {
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

    .info-card h3 {
        font-size: 17px;
    }

    .info-card p {
        color: #888;
        font-size: 13px;
        margin-top: 7px;
    }

    .info-card .ltr {
        direction: ltr;
        text-align: right;
    }

    @media (max-width: 900px) {

        .contact-container {
            grid-template-columns: 1fr;
        }

        .field-row {
            grid-template-columns: 1fr;
        }

        .contact-title h1 {
            font-size: 30px;
        }
    }

</style>


<div class="contact-page">

    <div class="contact-title">

        <span class="tag">
            تواصل معنا
        </span>

        <h1>
            احنا هنا عشان نساعدك
        </h1>

        <p>
            عندك سؤال عن الكورسات أو الاشتراك؟ ابعتلنا رسالتك وهنرد عليك في أقرب وقت.
        </p>

    </div>


    <div class="contact-container">


        <!-- Contact Form -->

        <div class="form-card">

            <h2>
                ابعتلنا رسالة
            </h2>

            <p>
                املأ البيانات التالية وهنتواصل معاك على البريد الإلكتروني.
            </p>


            <?php if ($success) { ?>

                <div class="alert ok">
                    ✓ تم إرسال رسالتك بنجاح، شكرًا لتواصلك مع منصة TEC.
                </div>

            <?php } ?>


            <?php if (!empty($errors)) { ?>

                <div class="alert error">

                    <ul>

                        <?php foreach ($errors as $error) { ?>

                            <li>
                                <?php echo htmlspecialchars($error); ?>
                            </li>

                        <?php } ?>

                    </ul>

                </div>

            <?php } ?>


            <form method="post" action="contact.php">

                <div class="field-row">

                    <div class="field">

                        <label for="full_name">
                            الاسم بالكامل
                        </label>

                        <input type="text" id="full_name" name="full_name"
                               placeholder="اكتب اسمك"
                               value="<?php echo htmlspecialchars($full_name); ?>">

                    </div>


                    <div class="field">

                        <label for="email">
                            البريد الإلكتروني
                        </label>

                        <input type="email" id="email" name="email"
                               placeholder="example@mail.com"
                               value="<?php echo htmlspecialchars($email); ?>">

                    </div>

                </div>


                <div class="field-row">

                    <div class="field">

                        <label for="phone">
                            رقم الهاتف (اختياري)
                        </label>

                        <input type="text" id="phone" name="phone"
                               placeholder="01xxxxxxxxx"
                               value="<?php echo htmlspecialchars($phone); ?>">

                    </div>


                    <div class="field">

                        <label for="subject">
                            موضوع الرسالة
                        </label>

                        <select id="subject" name="subject">

                            <option value="">اختر الموضوع</option>

                            <?php

                            $subjects = [
                                'استفسار عن الكورسات',
                                'مشكلة في الاشتراك',
                                'مشكلة تقنية',
                                'اقتراح أو شكوى',
                                'موضوع آخر'
                            ];

                            foreach ($subjects as $item) {

                                $selected = ($subject === $item) ? 'selected' : '';

                                echo '<option value="' . htmlspecialchars($item) . '" ' . $selected . '>'
                                    . htmlspecialchars($item) .
                                    '</option>';
                            }

                            ?>

                        </select>

                    </div>

                </div>


                <div class="field">

                    <label for="message">
                        رسالتك
                    </label>

                    <textarea id="message" name="message"
                              placeholder="اكتب تفاصيل رسالتك هنا..."><?php echo htmlspecialchars($message); ?></textarea>

                </div>


                <button type="submit" class="send-btn">
                    إرسال الرسالة
                </button>

            </form>

        </div>


        <!-- Contact Information -->

        <div class="info-side">

            <div class="info-card">

                <div class="icon">
                    📧
                </div>

                <h3>
                    البريد الإلكتروني
                </h3>

                <p class="ltr">
                    support@tec-platform.com
                </p>

            </div>


            <div class="info-card">

                <div class="icon">
                    📱
                </div>

                <h3>
                    رقم الهاتف
                </h3>

                <p class="ltr">
                    +20 100 123 4567
                </p>

            </div>


            <div class="info-card">

                <div class="icon">
                    ⏰
                </div>

                <h3>
                    مواعيد الدعم
                </h3>

                <p>
                    من السبت للخميس، من 10 صباحًا حتى 8 مساءً.
                </p>

            </div>

        </div>

    </div>

</div>


<?php include 'footer.php'; ?>

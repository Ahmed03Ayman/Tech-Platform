<?php include 'header.php'; ?>

<div class="custom-container py-5 px-3">
    <!-- Terms header-->
    <div class="text-center mb-5">
        <div class="icon-container shadow-sm mx-auto mb-3 bg-white d-flex align-items-center justify-content-center rounded-circle">
            <i class="fa-solid fa-scale-balanced fs-3 text-primary-dark"></i>
        </div>
        <h1 class="fw-bold text-primary-dark">الشروط والأحكام</h1>
        <p class="text-muted">يرجى قراءة هذه الشروط والأحكام بعناية قبل استخدام منصتنا.</p>
        <span class="badge rounded-pill px-3 py-2 fs-6 update-date-badge">آخر تحديث: أغسطس 2026</span>
    </div>
    
    <!-- Terms list-->
    <div class="terms-list">          
        <!-- Term 1-->
        <div class="term-card bg-white p-4 mb-4 rounded-4 shadow-sm d-flex flex-column flex-md-row gap-3">
            <div class="term-number flex-shrink-0 d-flex align-items-center justify-content-center fw-bold rounded-circle">1</div>
            <div>
                <h3 class="fw-bold fs-5 text-primary-dark">
                    <i class="fa-solid fa-check-circle text-primary-blue ms-2"></i>قبول الشروط
                </h3>
                <p class="text-muted mb-0">
                    من خلال الوصول إلى منصة TEC أو استخدام خدماتها التعليمية لطلاب المرحلة الإعدادية والثانوية، فإنك توافق على الالتزام الكامل بهذه الشروط...
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTerm1" class="text-primary-blue text-decoration-none fw-bold read-more-link">المزيد...</a>
                </p>
            </div>
        </div>
        <!-- Term 2-->
        <div class="term-card bg-white p-4 mb-4 rounded-4 shadow-sm d-flex flex-column flex-md-row gap-3">
            <div class="term-number flex-shrink-0 d-flex align-items-center justify-content-center fw-bold rounded-circle">2</div>
            <div>
                <h3 class="fw-bold fs-5 text-primary-dark">
                    <i class="fa-solid fa-users text-primary-blue ms-2"></i>سلوك المستخدم
                </h3>
                <p class="text-muted mb-0">
                    أنت توافق كطالب أو ولي أمر على عدم استخدام المنصة لأي غرض غير قانوني أو مسيء. ويجب الالتزام ببيئة تعليمية إيجابية، وعدم نقل أي برمجيات ضارة...
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTerm2" class="text-primary-blue text-decoration-none fw-bold read-more-link">المزيد...</a>
                </p>
            </div>
        </div>
        <!-- Term 3-->
        <div class="term-card bg-white p-4 mb-4 rounded-4 shadow-sm d-flex flex-column flex-md-row gap-3">
            <div class="term-number flex-shrink-0 d-flex align-items-center justify-content-center fw-bold rounded-circle">3</div>
            <div>
                <h3 class="fw-bold fs-5 text-primary-dark">
                    <i class="fa-solid fa-lightbulb text-primary-blue ms-2"></i>الملكية الفكرية
                </h3>
                <p class="text-muted mb-0">
                    تظل الخدمة ومحتواها التعليمي، بما في ذلك الفيديوهات، المذكرات، والاختبارات، هي الملكية الحصرية لمنصة TEC. يمنع نسخ أو توزيع المحتوى...
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTerm3" class="text-primary-blue text-decoration-none fw-bold read-more-link">المزيد...</a>
                </p>
            </div>
        </div>
        <!-- Term 4 -->
        <div class="term-card bg-white p-4 mb-4 rounded-4 shadow-sm d-flex flex-column flex-md-row gap-3">
            <div class="term-number flex-shrink-0 d-flex align-items-center justify-content-center fw-bold rounded-circle">4</div>
            <div>
                <h3 class="fw-bold fs-5 text-primary-dark">
                    <i class="fa-solid fa-ban text-primary-blue ms-2"></i>القيود
                </h3>
                <p class="text-muted mb-0">
                    لا يجوز بأي حال من الأحوال لمنصة TEC أو القائمين عليها أن تتحمل المسؤولية عن أي أضرار تقنية عرضية أو تبعية ناتجة عن سوء استخدام الموقع...
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTerm4" class="text-primary-blue text-decoration-none fw-bold read-more-link">المزيد...</a>
                </p>
            </div>
        </div>
        <!-- Term 5 -->
        <div class="term-card bg-white p-4 mb-4 rounded-4 shadow-sm d-flex flex-column flex-md-row gap-3">
            <div class="term-number flex-shrink-0 d-flex align-items-center justify-content-center fw-bold rounded-circle">5</div>
            <div>
                <h3 class="fw-bold fs-5 text-primary-dark">
                    <i class="fa-solid fa-gavel text-primary-blue ms-2"></i>القانون الحاكم
                </h3>
                <p class="text-muted mb-0">
                    تخضع هذه الشروط والأحكام وتُفسر وفقاً للقوانين المحلية والدولية المنظمة لحقوق المستخدمين والتعليم الإلكتروني، لضمان حقوق الطرفين بشكل عادل...
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTerm5" class="text-primary-blue text-decoration-none fw-bold read-more-link">المزيد...</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="modalTerm1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-primary-dark"><i class="fa-solid fa-check-circle text-primary-blue ms-2"></i>قبول الشروط</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted pt-3">
                من خلال تسجيل الدخول إلى منصة TEC أو استخدام أي من خدماتها التعليمية المخصصة لطلاب المرحلة الإعدادية والثانوية، فإنك بمثابة توقيع إلكتروني على الموافقة والالتزام الكامل بهذه الشروط. إذا كنت لا توافق على أي جزء من هذه البنود، يرجى عدم إنشاء حساب أو التوقف عن استخدام المنصة.
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTerm2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-primary-dark"><i class="fa-solid fa-users text-primary-blue ms-2"></i>سلوك المستخدم</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted pt-3">
                نهدف في TEC إلى توفير بيئة تعليمية احترافية وإيجابية لطلاب الإعدادي والثانوي. لذلك، أنت توافق كطالب أو ولي أمر على عدم استخدام المنصة لأي غرض يخالف القانون أو الآداب العامة. يُمنع منعاً باتاً نقل أي برمجيات خبيثة، فيروسات، أو شفرات مدمرة.
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTerm3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-primary-dark"><i class="fa-solid fa-lightbulb text-primary-blue ms-2"></i>الملكية الفكرية</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted pt-3">
                جميع المواد المتاحة على المنصة، بما في ذلك الدروس المصورة، المذكرات والملخصات، الاختبارات الإلكترونية، الأكواد البرمجية، التصميمات، والشعارات، هي ملكية فكرية حصرية لمنصة TEC ومرخصيها ومحمية بقوانين حقوق النشر.
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTerm4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-primary-dark"><i class="fa-solid fa-ban text-primary-blue ms-2"></i>القيود</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted pt-3">
                لا تتحمل منصة TEC، أو مطوريها، أو مديريها، أو أي من شركائها، أي مسؤولية قانونية تجاه أي أضرار غير مباشرة، عرضية، خاصة، أو تبعية قد تحدث نتيجة استخدام أو عدم القدرة على استخدام المنصة.
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTerm5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-primary-dark"><i class="fa-solid fa-gavel text-primary-blue ms-2"></i>القانون الحاكم</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted pt-3">
                تخضع هذه الشروط والأحكام وتُفسر وفقاً للقوانين المعمول بها والمنظمة للتجارة الإلكترونية وحماية المستهلك. أي نزاع قانوني قد ينشأ عن استخدام هذه المنصة سيتم محاولة حله ودياً في البداية عن طريق فريق الدعم الفني الخاص بنا.
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
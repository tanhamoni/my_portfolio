<!-- Favicons -->
<link href="{{ asset('assets/img/profile/girl.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;0,300;1,400;1,500;1,700;1,900&family=Open+Sans:wght@300;400;500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Vendor CSS -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">





<style>
    /* FAQ Section */
    .faq-section {
        margin-top: 40px;
        width: 100%;
    }

    .faq-item {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .faq-question {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 20px;
        cursor: pointer;
        font-weight: 600;
        color: #222;
    }

    .faq-question i {
        font-size: 22px;
        transition: transform 0.3s ease;
    }

    .faq-answer {
        display: none;
        padding: 0 20px 20px;
        color: #666;
        line-height: 1.7;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .faq-item.active .faq-question i {
        transform: rotate(45deg);
    }
</style>
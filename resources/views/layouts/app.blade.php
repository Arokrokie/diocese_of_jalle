<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @php
    $pageTitle = trim($__env->yieldContent('title'));
    $titleSuffix = 'Diocese of Jalle - Episcopal Church of South Sudan';
    if (Request::is('/') || empty($pageTitle) || $pageTitle === $titleSuffix) {
        $fullTitle = $titleSuffix;
    } else {
        $fullTitle = $pageTitle . ' - ' . $titleSuffix;
    }
  @endphp
  <title>{{ $fullTitle }}</title>
  <meta name="description" content="@yield('meta_description', 'Official web portal of the Diocese of Jalle, Jonglei Internal Province, Episcopal Church of South Sudan (ECSS).')">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <!-- Plugins Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/ion.rangeSlider.min.css') }}">

  <!-- Icon Fonts -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">

  <!-- Template Style sheet -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ @filemtime(public_path('assets/css/style.css')) ?: '1.0' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}?v={{ @filemtime(public_path('assets/css/responsive.css')) ?: '1.0' }}">
  <link id="mht-color-link" class="color-changing" href="{{ asset('assets/css/theme-colors/color1.css') }}" rel="stylesheet">

  <style>
    /* Footer bottom fix - prevent any logo from overlapping the copyright text */
    .sigma_footer-bottom .sigma_footer-logo {
      display: none !important;
    }
    .sigma_footer-bottom .container-fluid {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }
    .sigma_footer-bottom .sigma_footer-copyright p {
      color: rgba(255, 255, 255, 0.85);
      font-size: 14px;
      margin: 0;
      text-transform: none;
    }
  
    /* Inner pages: top bar links white (header sits on dark subheader) */
    .page-inner .sigma_header.header-4 .sigma_header-top a,
    .page-inner .sigma_header.header-4 .sigma_header-top i,
    .page-inner .sigma_header.header-4 .sigma_sm li a {
      color: #ffffff !important;
    }
    .page-inner .sigma_header.header-4 .desktop-toggler span {
      background-color: #ffffff !important;
    }

    /* ========================================================
       PREVENT LOGO AND NAVBAR COLLISION ACROSS ALL VIEWPORTS
       ======================================================== */
    .sigma_logo-wrapper {
      flex-shrink: 0 !important;
      display: flex !important;
      align-items: center !important;
      margin-right: 35px !important;
    }
    .navbar-brand {
      display: flex !important;
      align-items: center !important;
      white-space: nowrap !important;
    }
    .brand-title {
      font-size: 18px !important;
      line-height: 1.15 !important;
      font-weight: 700 !important;
      font-family: 'Poppins', sans-serif !important;
      letter-spacing: 0.5px !important;
      color: #002244 !important;
    }
    .brand-subtitle {
      font-size: 10px !important;
      line-height: 1.2 !important;
      letter-spacing: 0.6px !important;
      font-weight: 600 !important;
      text-transform: uppercase !important;
      color: #6c757d !important;
    }

    /* Darken Preloader */
    .sigma_preloader {
      background-color: #0b1a2c !important;
    }

    /* Hero Banner Zoom Transition (Ken Burns Effect) */
    .sigma_banner .sigma_banner-slider-inner {
      position: relative;
      overflow: hidden;
      background-size: cover;
      background-position: center;
      min-height: 600px;
    }
    .sigma_banner .sigma_banner-slider-inner::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: inherit;
      background-size: cover;
      background-position: center;
      transform: scale(1);
      transition: transform 6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      z-index: 0;
    }
    .sigma_banner .slick-active .sigma_banner-slider-inner::before,
    .sigma_banner .sigma_banner-slider-inner.slick-active::before {
      transform: scale(1.12);
    }
    .sigma_banner .sigma_banner-slider-inner::after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(to right, rgba(0, 20, 45, 0.85) 0%, rgba(0, 20, 45, 0.60) 55%, rgba(0, 20, 45, 0.35) 100%);
      z-index: 1;
    }
    .sigma_banner .sigma_banner-slider-inner .sigma_banner-text {
      position: relative;
      z-index: 2;
    }

    @media (min-width: 992px) and (max-width: 1399px) {
      .sigma_header.header-4 .navbar-nav > .menu-item > a {
        padding: 0 9px !important;
        font-size: 13.5px !important;
      }
      .brand-title {
        font-size: 16px !important;
      }
      .brand-subtitle {
        font-size: 9px !important;
      }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
      .sigma_header.header-4 .navbar-nav > .menu-item > a {
        padding: 0 6px !important;
        font-size: 13px !important;
      }
      .brand-title {
        font-size: 15px !important;
      }
      .brand-subtitle {
        font-size: 8.5px !important;
      }
      .sigma_header-controls .sigma_btn-custom {
        display: none !important; /* Hide button in tight desktop range to avoid any navbar collision */
      }
    }

    @media (max-width: 991px) {
      .sigma_logo-wrapper {
        max-width: calc(100% - 60px) !important;
      }
      .brand-title {
        font-size: 15px !important;
      }
      .brand-subtitle {
        font-size: 8.5px !important;
      }
    }

    @media (max-width: 480px) {
      .sigma_logo-wrapper {
        max-width: calc(100% - 50px) !important;
      }
      .navbar-brand img {
        height: 36px !important;
      }
      .brand-title {
        font-size: 13.5px !important;
      }
      .brand-subtitle {
        font-size: 7.5px !important;
      }
    }

    /* Universal Full Image Display (no empty balance space) */
    .img-full-display {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      object-position: center 25% !important;
      display: block !important;
    }

    /* Pastoral callout font size matching website */
    .sigma_cta p {
      font-size: 14.5px !important;
      line-height: 1.65 !important;
    }
    .sigma_cta span {
      font-size: 13px !important;
    }
    .sigma_cta h4, .sigma_cta h4 a {
      font-size: 19px !important;
    }
    /* Homepage: top bar links stay in original blue/navy (no override) */

  
    /* Ensure no horizontal scroll on mobile */
    body {
      overflow-x: hidden;
    }

  
    /* Mobile Drawer & Overlay Styles */
    .sigma_aside.sigma_aside-left {
      position: fixed !important;
      top: 0 !important;
      left: -320px !important;
      width: 300px !important;
      max-width: 85vw !important;
      height: 100vh !important;
      background-color: #ffffff !important;
      z-index: 99999 !important;
      transition: left 0.35s cubic-bezier(0.77, 0, 0.175, 1) !important;
      overflow-y: auto !important;
      display: block !important;
      box-shadow: 4px 0 25px rgba(0,0,0,0.25) !important;
      padding: 25px 20px !important;
    }
    .sigma_aside.sigma_aside-left.open {
      left: 0 !important;
    }
    .sigma_aside-overlay {
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      width: 100vw !important;
      height: 100vh !important;
      background: rgba(0, 0, 0, 0.65) !important;
      z-index: 99990 !important;
      opacity: 0 !important;
      visibility: hidden !important;
      transition: opacity 0.3s ease, visibility 0.3s ease !important;
    }
    .sigma_aside-overlay.active {
      opacity: 1 !important;
      visibility: visible !important;
    }
    @media (max-width: 991px) {
      .aside-toggler.style-2.aside-trigger-left {
        display: grid !important;
        cursor: pointer !important;
      }
      .aside-toggler.style-2.aside-trigger-left span {
        background-color: #022147 !important;
      }
      .page-inner .aside-toggler.style-2.aside-trigger-left span {
        background-color: #022147 !important;
      }
    }
    .aside-close-btn {
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      border: 1px solid #ddd;
      background: #f8f9fa;
      color: #333;
      cursor: pointer;
      font-size: 16px;
      line-height: 1;
      padding: 0;
    }
    .aside-close-btn:hover {
      background: #022147;
      color: #fff;
      border-color: #022147;
    }

  
    /* ========================================================
       COMPREHENSIVE RESPONSIVENESS & FULL IMAGE CONTAINER STYLES
       ======================================================== */
    
    /* 1. Full Image Container Premises */
    .img-frame-large {
      width: 100%;
      height: 280px;
      background-color: #f1f4f7;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .img-frame-small {
      width: 100%;
      height: 170px;
      background-color: #f1f4f7;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .img-full-display {
      max-width: 100% !important;
      max-height: 100% !important;
      width: auto !important;
      height: auto !important;
      object-fit: contain !important;
      display: block !important;
      margin: auto !important;
      transition: transform 0.35s ease;
    }
    .img-frame-large:hover .img-full-display,
    .img-frame-small:hover .img-full-display {
      transform: scale(1.02);
    }
    
    /* 2. Global Image Safety */
    img {
      max-width: 100%;
      height: auto;
    }

    /* 3. Subheader Responsive Padding & Heading Scale */
    @media (max-width: 991px) {
      .header-absolute + .sigma_subheader .sigma_subheader-inner {
        padding: 150px 0 60px !important;
      }
      .sigma_header.header-4 .sigma_header-top {
        display: none !important;
      }
      .sigma_header.header-4 .sigma_header-middle {
        margin-top: 5px !important;
      }
    }
    @media (max-width: 767px) {
      .img-frame-large {
        height: 220px !important;
      }
      .img-frame-small {
        height: 140px !important;
      }
      .header-absolute + .sigma_subheader .sigma_subheader-inner {
        padding: 125px 0 45px !important;
        flex-direction: column !important;
        text-align: center !important;
        align-items: center !important;
      }
      .sigma_subheader h1 {
        font-size: 28px !important;
        line-height: 1.25 !important;
      }
      .sigma_subheader .blockquote {
        font-size: 13px !important;
        margin: 10px auto !important;
      }
      .sigma_subheader .breadcrumb {
        margin-top: 15px !important;
        justify-content: center !important;
      }
      .section.section-padding {
        padding: 50px 0 !important;
      }
      .section-title .title {
        font-size: 24px !important;
        line-height: 1.3 !important;
      }
      .sigma_box {
        padding: 25px 20px !important;
      }
    }
    @media (max-width: 575px) {
      .img-frame-large {
        height: 190px !important;
      }
      .img-frame-small {
        height: 125px !important;
      }
      .sigma_banner .title {
        font-size: 24px !important;
        line-height: 1.25 !important;
      }
      .sigma_banner .blockquote {
        font-size: 13px !important;
      }
      /* Buttons remain side-by-side on mobile */
      .sigma_volunteers-thumb {
        height: 220px !important;
      }
    }

  
    /* ========================================================
       STICKY NAVBAR (PINNED TO TOP ON SCROLLING)
       ======================================================== */
    .sigma_header.header-4.sticky {
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      width: 100% !important;
      z-index: 9990 !important;
      background-color: #ffffff !important;
      box-shadow: 0 4px 20px rgba(0, 33, 71, 0.12) !important;
      animation: stickySlideDown 0.35s ease forwards !important;
      padding: 0 !important;
    }
    .sigma_header.header-4.sticky .sigma_header-top {
      display: none !important;
    }
    .sigma_header.header-4.sticky .sigma_header-middle {
      background-color: #ffffff !important;
      padding: 6px 0 !important;
      margin: 0 !important;
    }
    .sigma_header.header-4.sticky .navbar-brand img {
      max-height: 46px !important;
    }
    @keyframes stickySlideDown {
      0% { transform: translateY(-100%); }
      100% { transform: translateY(0); }
    }

    /* ========================================================
       REDUCED FONT SIZES & PROPORTIONAL COMPONENT TYPOGRAPHY
       ======================================================== */
    h1, .h1 { font-size: 2.1rem; }
    h2, .h2 { font-size: 1.75rem; }
    h3, .h3 { font-size: 1.45rem; }
    h4, .h4 { font-size: 1.25rem; }
    h5, .h5 { font-size: 1.08rem; }
    h6, .h6 { font-size: 0.92rem; }

    .section-title .title {
      font-size: 26px !important;
      line-height: 1.3 !important;
    }
    .section-title .subtitle {
      font-size: 13px !important;
      letter-spacing: 1px !important;
      margin-bottom: 6px !important;
    }
    .sigma_subheader h1 {
      font-size: 34px !important;
      line-height: 1.25 !important;
    }
    .sigma_subheader .blockquote {
      font-size: 14px !important;
    }
    .sigma_banner .title {
      font-size: 34px !important;
      line-height: 1.2 !important;
    }
    p, .blockquote {
      font-size: 14.5px;
      line-height: 1.65;
    }

    /* ========================================================
       UNIVERSAL RESPONSIVE TABLES
       ======================================================== */
    .table-responsive {
      width: 100% !important;
      overflow-x: auto !important;
      -webkit-overflow-scrolling: touch !important;
    }
    .table {
      margin-bottom: 0 !important;
    }
    .sigma_mass-timing {
      min-width: 600px !important;
    }
    .sigma_mass-timing th {
      padding: 12px 14px !important;
      font-size: 14px !important;
      text-transform: uppercase !important;
      letter-spacing: 0.5px !important;
    }
    .sigma_mass-timing td {
      padding: 12px 14px !important;
      vertical-align: middle !important;
    }
    .sigma_mass-timing .sigma-time-table p {
      display: flex !important;
      flex-direction: column !important;
      align-items: flex-start !important;
      font-size: 13.5px !important;
      line-height: 1.4 !important;
      margin: 0 !important;
    }
    .sigma_mass-timing .sigma-time-table p span {
      font-size: 12.5px !important;
      font-weight: 700 !important;
      margin-right: 0 !important;
      margin-bottom: 2px !important;
    }

    /* ========================================================
       RESPONSIVE FOOTER (2 COLUMNS IN ONE ROW ON MOBILE)
       ======================================================== */
    @media (max-width: 767px) {
      .footer-widget {
        margin-bottom: 25px !important;
      }
      .footer-widget .widget-title {
        font-size: 15px !important;
        margin-bottom: 12px !important;
      }
      .footer-widget ul li {
        margin-bottom: 6px !important;
      }
      .footer-widget ul li a,
      .footer-widget p {
        font-size: 12px !important;
        line-height: 1.5 !important;
      }
      .footer-widget .sigma_recent-post img {
        width: 45px !important;
        height: 45px !important;
        object-fit: cover !important;
      }
      .footer-widget .sigma_recent-post h6 a {
        font-size: 12px !important;
        line-height: 1.4 !important;
      }
      .section-title .title {
        font-size: 21px !important;
      }
      .sigma_banner .title {
        font-size: 22px !important;
      }
      .sigma_subheader h1 {
        font-size: 24px !important;
      }
    }

  
    /* ========================================================
       SIDE-BY-SIDE BUTTON PAIRS (SAME ROW ON ALL SCREENS)
       ======================================================== */
    .btn-pair,
    .section-button {
      display: flex !important;
      flex-direction: row !important;
      flex-wrap: nowrap !important;
      align-items: center !important;
      gap: 10px !important;
    }
    
    .btn-pair .sigma_btn-custom,
    .section-button .sigma_btn-custom {
      margin: 0 !important;
      padding: 9px 18px !important;
      font-size: 13px !important;
      white-space: nowrap !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      line-height: 1.3 !important;
    }

    .btn-pair .sigma_btn-custom i,
    .section-button .sigma_btn-custom i {
      font-size: 11px !important;
      margin-left: 6px !important;
    }

    @media (max-width: 768px) {
      .btn-pair,
      .section-button {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        gap: 8px !important;
      }
      .btn-pair .sigma_btn-custom,
      .section-button .sigma_btn-custom {
        padding: 7px 12px !important;
        font-size: 11.5px !important;
        flex: 0 1 auto !important;
      }
      .btn-pair .sigma_btn-custom i,
      .section-button .sigma_btn-custom i {
        font-size: 10px !important;
        margin-left: 4px !important;
      }
    }

    @media (max-width: 480px) {
      .btn-pair,
      .section-button {
        gap: 6px !important;
      }
      .btn-pair .sigma_btn-custom,
      .section-button .sigma_btn-custom {
        padding: 6px 9px !important;
        font-size: 10.5px !important;
        letter-spacing: 0 !important;
      }
      .btn-pair .sigma_btn-custom i,
      .section-button .sigma_btn-custom i {
        display: none !important; /* Hide small arrows on very narrow screens to ensure text stays in one row */
      }
    }

  
    /* ========================================================
       REFINED COMPACT RESPONSIVE TYPOGRAPHY FOR EPISCOPAL & WORSHIP SECTIONS
       ======================================================== */
    @media (max-width: 768px) {
      /* Section Titles & Subtitles */
      .section-title .title,
      h4.title {
        font-size: 19px !important;
        line-height: 1.35 !important;
      }
      .section-title .subtitle {
        font-size: 11.5px !important;
        letter-spacing: 0.5px !important;
        margin-bottom: 4px !important;
      }

      /* Blockquotes & Welcome Paragraphs */
      .blockquote {
        font-size: 13.5px !important;
        line-height: 1.55 !important;
        padding-left: 10px !important;
        margin-bottom: 12px !important;
      }
      p {
        font-size: 13.5px !important;
        line-height: 1.6 !important;
      }

      /* Gospel Outreach & Relief & Healing Icon Blocks */
      .sigma_icon-block.icon-block-3 {
        padding: 5px 0 !important;
      }
      .sigma_icon-block.icon-block-3 i {
        font-size: 36px !important;
        margin-right: 12px !important;
      }
      .sigma_icon-block.icon-block-3 h5 {
        font-size: 15px !important;
        margin-bottom: 3px !important;
      }
      .sigma_icon-block.icon-block-3 p {
        font-size: 12.5px !important;
        line-height: 1.4 !important;
        margin-bottom: 0 !important;
      }

      /* Pastoral Support & Secretariat CTA Callouts */
      .sigma_cta h4 {
        font-size: 16px !important;
        line-height: 1.3 !important;
        margin-bottom: 4px !important;
      }
      .sigma_cta span {
        font-size: 11.5px !important;
      }
      .sigma_cta p {
        font-size: 12px !important;
        line-height: 1.4 !important;
      }

      /* Weekly Worship & Prayer Timings Table */
      .sigma_mass-timing th {
        font-size: 12px !important;
        padding: 8px 10px !important;
      }
      .sigma_mass-timing td {
        font-size: 12px !important;
        padding: 8px 10px !important;
      }
      .sigma_mass-timing .sigma-time-table p {
        font-size: 12px !important;
        line-height: 1.35 !important;
      }
      .sigma_mass-timing .sigma-time-table p span {
        font-size: 11px !important;
        margin-bottom: 2px !important;
      }
    }

    @media (max-width: 480px) {
      .section-title .title,
      h4.title {
        font-size: 17.5px !important;
      }
      .blockquote {
        font-size: 13px !important;
      }
      p {
        font-size: 13px !important;
      }
      .sigma_icon-block.icon-block-3 i {
        font-size: 30px !important;
        margin-right: 10px !important;
      }
      .sigma_icon-block.icon-block-3 h5 {
        font-size: 14px !important;
      }
      .sigma_cta h4 {
        font-size: 15px !important;
      }
    }

  
    /* ========================================================
       SERVICES PAGE CARD STYLES & REFINED META ICONS
       ======================================================== */
    .service-item-card {
      background-color: #ffffff !important;
      border: 1px solid #e5e9f0 !important;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease !important;
    }
    .service-item-card:hover {
      background-color: #ffffff !important;
      border-color: #022147 !important;
      box-shadow: 0 10px 25px rgba(2, 33, 71, 0.08) !important;
      transform: translateY(-4px) !important;
    }
    .service-item-card:hover h5 {
      color: #022147 !important;
    }
    .service-item-card:hover p,
    .service-item-card:hover span,
    .service-item-card:hover strong {
      color: inherit;
    }
    .service-icon-box {
      width: 50px;
      height: 50px;
      background-color: #f1f4f8;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.25s ease;
    }
    .service-icon-box i {
      font-size: 26px !important;
      line-height: 1 !important;
      color: var(--mht-primary) !important;
      transition: color 0.25s ease;
    }
    .service-item-card:hover .service-icon-box {
      background-color: #022147 !important;
    }
    .service-item-card:hover .service-icon-box i {
      color: #ffffff !important;
    }
    .service-meta-info {
      font-size: 13px;
    }
    .service-meta-info li {
      display: flex !important;
      align-items: center !important;
      margin-bottom: 5px !important;
      font-size: 13px !important;
      color: #555 !important;
    }
    .service-meta-info li i {
      font-size: 12px !important;
      width: 16px !important;
      color: var(--mht-primary) !important;
      margin-right: 6px !important;
      text-align: center !important;
    }

  </style>
  @stack('styles')
</head>

<body class="{{ Request::is('/') ? 'page-home' : 'page-inner' }}">
  <a class="skip-link" href="#main-content">Skip to main content</a>

  <!-- Preloader Start -->
  <div class="sigma_preloader">
    <img loading="lazy" src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle" style="max-height: 80px;">
  </div>
  <!-- Preloader End -->

  

  <!-- Mobile Navigation -->
  <aside class="sigma_aside sigma_aside-left">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
      <a class="navbar-brand m-0 d-flex align-items-center text-decoration-none" href="{{ route('home') }}">
        <img loading="lazy" src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle Crest" style="height: 44px; width: auto; object-fit: contain;" class="me-2">
        <div class="d-flex flex-column text-start">
          <span class="fw-bold" style="font-size: 15px; line-height: 1.1; color: #002244; font-family: 'Poppins', sans-serif;">DIOCESE OF JALLE</span>
          <span style="font-size: 10px; color: #6c757d; font-weight: 600; text-transform: uppercase;">ECSS - Jonglei</span>
        </div>
      </a>
      <button type="button" class="aside-close-btn" aria-label="Close navigation menu">
        <i class="fal fa-times"></i>
      </button>
    </div>

    <ul>
      <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="menu-item menu-item-has-children">
        <a href="#">About</a>
        <ul class="sub-menu">
          <li class="menu-item"><a href="{{ route('about') }}">Our Diocese & Mission</a></li>
          <li class="menu-item"><a href="{{ route('churches') }}">Churches & Parishes</a></li>
          <li class="menu-item"><a href="{{ route('leadership') }}">Leadership & Clergy</a></li>
          <li class="menu-item"><a href="{{ route('bishop') }}">Bishop's Profile</a></li>
          <li class="menu-item"><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
        </ul>
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="#">Ministries</a>
        <ul class="sub-menu">
          <li class="menu-item"><a href="{{ route('ministries') }}">All Ministries</a></li>
          <li class="menu-item"><a href="{{ route('ministry.detail') }}">Mothers' Union (MU)</a></li>
          <li class="menu-item"><a href="{{ route('services') }}">Worship Services</a></li>
          <li class="menu-item"><a href="{{ route('service.detail') }}">Liturgy & Sacraments</a></li>
        </ul>
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="#">Word & Scripture</a>
        <ul class="sub-menu">
          <li class="menu-item"><a href="{{ route('sermons') }}">Sermons & Messages</a></li>
          <li class="menu-item"><a href="{{ route('gallery') }}">Photo Gallery</a></li>
        </ul>
      </li>
      <li class="menu-item"><a href="{{ route('events') }}">Events & Synods</a></li>
      <li class="menu-item"><a href="{{ route('news') }}">News & Updates</a></li>
      <li class="menu-item"><a href="{{ route('donation') }}">Giving & Donations</a></li>
      <li class="menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>
      @auth
        <li class="menu-item"><a href="{{ route('admin.dashboard') }}" class="text-primary"><i class="fas fa-cog me-1"></i> Admin Dashboard</a></li>
      @else
        <li class="menu-item"><a href="{{ route('login') }}"><i class="fas fa-lock me-1"></i> Staff Login</a></li>
      @endauth
    </ul>
  </aside>
  <div class="sigma_aside-overlay"></div>

  <!-- Header Start -->
  <!-- Header for Homepage (header-4) -->
    <header class="sigma_header header-4 can-sticky header-absolute">
      <div class="sigma_header-top">
        <div class="container-fluid">
          <div class="sigma_header-top-inner">
            <ul class="sigma_header-top-links">
              <li class="menu-item"> <a href="{{ route('contact') }}"><i class="fal fa-map-marker-alt"></i> Jalle Payam, Jonglei State, South Sudan</a> </li>
              <li class="menu-item"> <a href="mailto:info@dioceseofjalle.org"><i class="fal fa-envelope"></i> info@dioceseofjalle.org</a> </li>
            </ul>
            <div class="sigma_header-middle">
              <div class="navbar p-0 shadow-none bg-transparent">
                <ul class="navbar-nav">
                  <li class="menu-item"><a href="{{ route('about') }}">Our Diocese</a></li>
                  <li class="menu-item"><a href="{{ route('sermons') }}">Sermons</a></li>
                  <li class="menu-item"><a href="{{ route('events') }}">Events</a></li>
                  <li class="menu-item"><a href="{{ route('ministries') }}">Ministries</a></li>
                </ul>
              </div>
            </div>
            <ul class="sigma_sm">
              <li> <a href="https://www.facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a> </li>
              <li> <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a> </li>
              @auth
                <li> <a href="{{ route('admin.dashboard') }}" title="Admin Dashboard"><i class="fas fa-user-shield"></i></a> </li>
              @endauth
            </ul>
          </div>
        </div>
      </div>

      <div class="sigma_header-middle">
        <div class="container-fluid">
          <nav class="navbar">
            <div class="sigma_logo-wrapper">
              <a class="navbar-brand d-flex align-items-center text-decoration-none py-1" href="{{ route('home') }}">
                <img loading="lazy" src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle Crest" style="height: 52px; width: auto; object-fit: contain;" class="me-2">
                <div class="d-flex flex-column text-start">
                  <span class="brand-title">DIOCESE OF JALLE</span>
                  <span class="brand-subtitle">Episcopal Church of South Sudan</span>
                </div>
              </a>
            </div>

            <ul class="navbar-nav">
              <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="menu-item menu-item-has-children">
                <a href="{{ route('about') }}">About</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="{{ route('about') }}">Our Diocese & Mission</a></li>
                  <li class="menu-item"><a href="{{ route('churches') }}">Churches & Parishes</a></li>
                  <li class="menu-item"><a href="{{ route('leadership') }}">Leadership & Clergy</a></li>
                  <li class="menu-item"><a href="{{ route('bishop') }}">Bishop's Profile</a></li>
                  <li class="menu-item"><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children">
                <a href="{{ route('ministries') }}">Ministries</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="{{ route('ministries') }}">All Ministries</a></li>
                  <li class="menu-item"><a href="{{ route('ministry.detail') }}">Mothers' Union (MU)</a></li>
                  <li class="menu-item"><a href="{{ route('services') }}">Worship Services</a></li>
                  <li class="menu-item"><a href="{{ route('service.detail') }}">Liturgy & Sacraments</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children">
                <a href="{{ route('sermons') }}">Word & Media</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="{{ route('sermons') }}">Sermons & Messages</a></li>
                  <li class="menu-item"><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                </ul>
              </li>
              <li class="menu-item"><a href="{{ route('events') }}">Events</a></li>
              <li class="menu-item"><a href="{{ route('news') }}">News</a></li>
              <li class="menu-item"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <div class="sigma_header-controls style-2">
              <a href="{{ route('donation') }}" class="sigma_btn-custom d-none d-lg-block">Support Our Mission</a>
              <ul class="sigma_header-controls-inner">
                <li class="aside-toggler style-2 aside-trigger-left" aria-label="Open navigation menu">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
  <!-- Header End -->

  <main id="main-content">
    @yield('content')
  </main>

  <!-- Footer Start -->
  <footer class="sigma_footer footer-2 sigma_footer-dark">
    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6 col-6 footer-widget">
            <div class="sigma_footer-logo mb-3">
              <a class="d-flex align-items-center text-decoration-none" href="{{ route('home') }}">
                <img loading="lazy" src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle" style="height: 48px; width: auto;" class="me-2">
                <div class="d-flex flex-column text-start">
                  <span class="fw-bold text-white" style="font-size: 17px; line-height: 1.1; font-family: 'Poppins', sans-serif;">DIOCESE OF JALLE</span>
                  <span class="text-uppercase text-white-50" style="font-size: 10.5px; letter-spacing: 0.8px; font-weight: 500;">Episcopal Church of South Sudan</span>
                </div>
              </a>
            </div>
            <p class="m-0 text-white-50 fs-13">
              The Diocese of Jalle is an Episcopal Area Diocese within the Jonglei Internal Province of the Episcopal Church of South Sudan (ECSS). Proclaiming Christ, building sustainable peace, and empowering communities.
            </p>
            <div class="sigma_contact-links mt-3 text-white-50 fs-13">
              <p class="mb-1"><i class="fas fa-map-marker-alt text-white me-1"></i> Jalle Payam, Bor County, Jonglei State</p>
              <p class="mb-0"><i class="fas fa-envelope text-white me-1"></i> info@dioceseofjalle.org</p>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-6 footer-widget">
            <h5 class="widget-title fs-16">Quick Links</h5>
            <ul class="fs-13">
              <li> <a href="{{ route('home') }}">Home</a> </li>
              <li> <a href="{{ route('about') }}">Our Diocese</a> </li>
              <li> <a href="{{ route('leadership') }}">Leadership</a> </li>
              <li> <a href="{{ route('ministries') }}">Ministries</a> </li>
              <li> <a href="{{ route('sermons') }}">Sermons</a> </li>
              <li> <a href="{{ route('events') }}">Events</a> </li>
            </ul>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-6 footer-widget">
            <h5 class="widget-title fs-16">Ministries & Care</h5>
            <ul class="fs-13">
              <li> <a href="{{ route('ministry.detail') }}">Mothers' Union</a> </li>
              <li> <a href="{{ route('ministries') }}">Youth Ministry</a> </li>
              <li> <a href="{{ route('services') }}">Worship Services</a> </li>
              <li> <a href="{{ route('gallery') }}">Photo Gallery</a> </li>
              <li> <a href="{{ route('donation') }}">Support Mission</a> </li>
              <li> <a href="{{ route('contact') }}">Prayer Request</a> </li>
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-6 footer-widget widget-recent-posts">
            <h5 class="widget-title">Diocesan News</h5>
            <article class="sigma_recent-post">
              <a href="{{ route('news') }}"><img loading="lazy" src="{{ asset('assets/img/diocese/bishop-and-clergy.jpeg') }}" alt="Diocese post"></a>
              <div class="sigma_recent-post-body">
                <a href="{{ route('news') }}"> <i class="far fa-calendar"></i> May 28, 2026</a>
                <h6> <a href="{{ route('news') }}">Bishop Abraham Matiop leads Diocesan fellowship and prayer assembly</a> </h6>
              </div>
            </article>
            <article class="sigma_recent-post">
              <a href="{{ route('news') }}"><img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers Union"></a>
              <div class="sigma_recent-post-body">
                <a href="{{ route('news') }}"> <i class="far fa-calendar"></i> May 15, 2026</a>
                <h6> <a href="{{ route('news') }}">Mothers' Union convenes women for community empowerment and devotion</a> </h6>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom - NO overlapping logo here -->
    <div class="sigma_footer-bottom">
      <div class="container-fluid">
        <div class="sigma_footer-copyright">
          <p>Copyright © Diocese of Jalle - Episcopal Church of South Sudan {{ date('Y') }}. All rights reserved.</p>
        </div>
        <ul class="sigma_sm square">
          <li>
            <a href="#" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li>
            <a href="#" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
          </li>
          <li>
            <a href="#" aria-label="YouTube Channel"><i class="fab fa-youtube"></i></a>
          </li>

        </ul>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <script src="{{ asset('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/imagesloaded.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.inview.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.event.move.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/ion.rangeSlider.min.js') }}"></script>

  <script src="{{ asset('assets/js/main.js') }}?v={{ @filemtime(public_path('assets/js/main.js')) ?: '1.0' }}"></script>
  @stack('scripts')
</body>
</html>

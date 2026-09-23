@extends('layouts.app')

@section('title', 'Proclaiming Christ & Fostering Peace')

@section('content')
<!-- Banner Start -->
    <div class="sigma_banner banner-1 bg-cover light-overlay bg-center bg-norepeat" style="background-image: url('{{ asset('assets/img/banner/9.webp') }}')">
      <div class="sigma_banner-slider">

        <!-- Banner Item 1 -->
        <div class="sigma_banner-slider-inner">
          <div class="sigma_banner-text">
            <div class="container position-relative">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="sigma_box primary-bg banner-cta">
                    <p class="text-white-50 mb-2 text-uppercase fw-bold"><i class="fas fa-church me-2"></i> Episcopal Church of South Sudan (ECSS)</p>
                    <h1 class="text-white title">PROCLAIMING CHRIST & FOSTERING PEACE</h1>
                    <p class="blockquote light light-border mb-0">Welcome to the Diocese of Jalle, Jonglei Internal Province. We are dedicated to preaching the Gospel of reconciliation, transforming lives, and serving our communities with faith and love.</p>
                    <div class="section-button btn-pair mt-3">
                      <a href="{{ route('contact') }}" class="sigma_btn-custom secondary">Join Us In Worship <i class="far fa-arrow-right"></i></a>
                      <a href="{{ route('donation') }}" class="sigma_btn-custom light text-white">Support Mission <i class="far fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banner Item 2 -->
        <div class="sigma_banner-slider-inner">
          <div class="sigma_banner-text">
            <div class="container position-relative">
              <div class="row align-items-center">
                <div class="offset-lg-5 col-lg-7">
                  <div class="sigma_box primary-bg banner-cta">
                    <p class="text-white-50 mb-2 text-uppercase fw-bold"><i class="fas fa-dove me-2"></i> Faith, Hope & Compassion</p>
                    <h1 class="text-white title">UNITED IN PRAYER AND FELLOWSHIP</h1>
                    <p class="blockquote light light-border mb-0">Empowering families through the Mothers' Union, raising youth in godly wisdom, and bringing pastoral care to Jalle Payam, Bor County, and all South Sudan.</p>
                    <div class="section-button btn-pair mt-3">
                      <a href="{{ route('ministries') }}" class="sigma_btn-custom secondary">Our Ministries <i class="far fa-arrow-right"></i></a>
                      <a href="{{ route('about') }}" class="sigma_btn-custom light text-white">Learn More <i class="far fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Banner End -->

    <!-- Pillars Start -->
    <div class="section section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <a href="{{ route('about') }}" class="sigma_service border style-1 bg-white">
              <div class="sigma_service-thumb">
                <i class="flaticon-church"></i>
                <span></span>
                <span></span>
              </div>
              <div class="sigma_service-body">
                <h5>Our Episcopal Faith</h5>
                <p>Rooted in Holy Scripture, the historic Anglican Book of Common Prayer, and the living Gospel of our Lord Jesus Christ.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6">
            <a href="{{ route('ministries') }}" class="sigma_service border style-1 primary-bg">
              <div class="sigma_service-thumb">
                <i class="text-white flaticon-speech"></i>
                <span></span>
                <span></span>
              </div>
              <div class="sigma_service-body">
                <h5 class="text-white">Active Ministries</h5>
                <p class="text-white">Empowering women through the vibrant Mothers' Union, guiding youth, discipling children, and caring for families.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6">
            <a href="{{ route('events') }}" class="sigma_service border style-1 secondary-bg">
              <div class="sigma_service-thumb">
                <i class="custom-primary flaticon-praying"></i>
                <span></span>
                <span></span>
              </div>
              <div class="sigma_service-body">
                <h5 class="text-white">Peace & Community</h5>
                <p class="text-white">Active in peacebuilding, community reconciliation, flood disaster relief, and development across Jonglei State.</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Pillars End -->

    <!-- About Bishop & Diocese Start -->
    <section class="section pt-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="row g-3">
              <div class="col-12">
                <div class="img-frame-large rounded shadow-sm overflow-hidden">
                  <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-preaching.jpeg') }}" alt="Bishop Abraham Matiop Deng preaching" class="img-full-display">
                </div>
              </div>
              <div class="col-6">
                <div class="img-frame-small rounded shadow-sm overflow-hidden">
                  <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers Union" class="img-full-display">
                </div>
              </div>
              <div class="col-6">
                <div class="img-frame-small rounded shadow-sm overflow-hidden">
                  <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Diocese Fellowship" class="img-full-display">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="ps-lg-4">
              <div class="section-title mb-3 text-start">
                <p class="subtitle">Episcopal Welcome</p>
                <h4 class="title">A Message From Rt. Rev. Abraham Matiop Deng Kechdit</h4>
              </div>
              <p class="blockquote bg-transparent border-start border-primary border-3 ps-3 mb-3">
                "Grace and peace be unto you from God our Father and our Lord Jesus Christ. The Diocese of Jalle stands as a beacon of faith, unity, and hope in South Sudan, committed to spreading the Gospel of peace and healing our communities."
              </p>
              <p>
                As part of the Jonglei Internal Province of the Episcopal Church of South Sudan, the Diocese of Jalle is called to proclaim the unsearchable riches of Christ, raise godly families through the Mothers' Union, equip young people with education and spiritual guidance, and walk beside our people through every season.
              </p>
              <div class="row mb-4">
                <div class="col-sm-6">
                  <div class="sigma_icon-block icon-block-3">
                    <div class="icon-wrapper">
                      <i class="flaticon-church-2"></i>
                    </div>
                    <div class="sigma_icon-block-content">
                      <h5>Gospel Outreach</h5>
                      <p>Evangelism, church planting, and pastoral care across Jalle Payam.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="sigma_icon-block icon-block-3">
                    <div class="icon-wrapper">
                      <i class="flaticon-charity"></i>
                    </div>
                    <div class="sigma_icon-block-content">
                      <h5>Relief & Healing</h5>
                      <p>Standing with flood-affected families and supporting community resilience.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="btn-pair mt-3">
                <a href="{{ route('about') }}" class="sigma_btn-custom">Discover Our History <i class="far fa-arrow-right ms-1"></i></a>
                <a href="{{ route('leadership') }}" class="sigma_btn-custom secondary">Meet Our Clergy <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About End -->

    <!-- Quick Callout Banner Start -->
    <div class="section pt-0 pb-3">
      <div class="container">
        <div class="row g-3 align-items-stretch">
          <div class="col-lg-6 col-md-6">
            <div class="sigma_cta lg secondary-bg rounded h-100 p-4 d-flex align-items-center">
              <div>
                <span class="fw-600 custom-primary d-block mb-1 text-uppercase"><i class="fas fa-praying-hands me-2"></i> Need Pastoral Prayer or Support?</span>
                <h4 class="text-white mb-2"><a href="mailto:info@dioceseofjalle.org" class="text-white text-decoration-none">info@dioceseofjalle.org</a></h4>
                <p class="text-white-50 mb-0">Our pastoral team is available for prayer, hospital visitation, and spiritual counsel.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="sigma_cta lg primary-bg rounded h-100 p-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
              <div>
                <span class="fw-600 text-white-50 d-block mb-1 text-uppercase"><i class="fas fa-church me-2 text-white"></i> Diocesan Secretariat</span>
                <h4 class="text-white mb-2">Connect with the Diocesan Office</h4>
                <p class="text-white-50 mb-0">Reach the Bishop's Commissioner or Secretary of Diocese.</p>
              </div>
              <div>
                <a href="{{ route('contact') }}" class="btn btn-light btn-sm text-primary fw-bold text-nowrap px-3 py-2 shadow-sm">Contact Us <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Quick Callout Banner End -->

    <!-- Weekly Worship Schedule Start -->
    <div class="section section-padding pt-0">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle">Worship & Prayer Timings</p>
          <h4 class="title">Weekly Services & Fellowships</h4>
        </div>
        <div class="table-responsive rounded shadow-sm overflow-hidden">
          <table class="table sigma_mass-timing table-striped mb-0">
            <thead>
              <tr>
                <th style="background-color: var(--mht-primary);">Sunday Services</th>
                <th>Midweek Fellowships</th>
                <th style="background-color: var(--mht-accent);">Saturday Preparation</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="sigma-time-table">
                    <p><span class="custom-primary">9:00 AM</span> Morning Prayer & Liturgy</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span>Wednesday 4:00 PM</span> Midweek Bible Study & Prayer</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span style="color: var(--mht-accent);">2:00 PM</span> Youth Choir Rehearsal</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="sigma-time-table">
                    <p><span class="custom-primary">10:30 AM</span> Holy Communion & Sermon</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span>Thursday 3:00 PM</span> Mothers' Union (MU) Devotion</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span style="color: var(--mht-accent);">4:00 PM</span> Altar Servers & Pastoral Prep</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="sigma-time-table">
                    <p><span class="custom-primary">11:45 AM</span> Sunday School & Youth Service</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span>Friday 5:00 PM</span> Fasting & Intercessory Prayer</p>
                  </div>
                </td>
                <td>
                  <div class="sigma-time-table">
                    <p><span style="color: var(--mht-accent);">5:30 PM</span> Clergy Evening Vigil</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Weekly Worship Schedule End -->

    <!-- Ministries Showcase Start -->
    <div class="section section-padding light-bg">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle">Serving Christ and Community</p>
          <h4 class="title">Diocesan Ministries</h4>
        </div>

        <div class="row">
          <!-- Ministry 1: Mothers' Union -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers Union Diocese of Jalle" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('ministry.detail') }}"> Mothers' Union (MU) </a> </h5>
                  <p class="blockquote bg-transparent">Leading Christian family values, marriage enrichment, literacy, and community welfare across Jonglei.</p>
                </div>
                <a href="{{ route('ministry.detail') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Ministry 2: Youth & Choir -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/choir-and-procession.jpeg') }}" alt="Youth and Choir Ministry" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('ministries') }}"> Youth & Praise Ministry </a> </h5>
                  <p class="blockquote bg-transparent">Equipping young generations through praise, musical training, discipleship, and peace ambassadorship.</p>
                </div>
                <a href="{{ route('ministries') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Ministry 3: Clergy & Pastoral Care -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Clergy and Pastoral Care" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('leadership') }}"> Clergy & Evangelism </a> </h5>
                  <p class="blockquote bg-transparent">Priests, deacons, and evangelists ministering in local parishes, planting churches, and nurturing faith.</p>
                </div>
                <a href="{{ route('leadership') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Ministry 4: Peace & Reconciliation -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Peace and Community Development" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('ministries') }}"> Peace & Reconciliation </a> </h5>
                  <p class="blockquote bg-transparent">Mediating peaceful coexistence, inter-clan dialogue, and fostering spiritual unity in South Sudan.</p>
                </div>
                <a href="{{ route('ministries') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Ministry 5: Sunday School & Children -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/church-community-1.jpeg') }}" alt="Children and Sunday School" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('ministries') }}"> Sunday School & Children </a> </h5>
                  <p class="blockquote bg-transparent">Building a biblical foundation in Christ Jesus for the next generation through Scripture and song.</p>
                </div>
                <a href="{{ route('ministries') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Ministry 6: Relief & Community Outreach -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_portfolio-item">
              <img loading="lazy" src="{{ asset('assets/img/diocese/outreach-gathering.jpeg') }}" alt="Relief and Community Outreach" style="height: 280px; object-fit: cover;">
              <div class="sigma_portfolio-item-content">
                <div class="sigma_portfolio-item-content-inner">
                  <h5> <a href="{{ route('donation') }}"> Relief & Humanitarian Care </a> </h5>
                  <p class="blockquote bg-transparent">Providing vital relief food, temporary shelter, and emergency support during seasonal floodings in Jalle.</p>
                </div>
                <a href="{{ route('donation') }}"><i class="fal fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-3">
          <a href="{{ route('ministries') }}" class="sigma_btn-custom">Explore All Ministries <i class="far fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
    <!-- Ministries Showcase End -->

    <!-- Leadership Section Start -->
    <div class="section section-padding bg-cover secondary-overlay bg-center bg-norepeat" style="background-image: url('{{ asset('assets/img/bg2.webp') }}')">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle text-white">Episcopal Leadership</p>
          <h4 class="title text-white">Diocesan Clergy & Leadership</h4>
        </div>

        <div class="row">
          <!-- Bishop -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-abraham-matiop.jpeg') }}" alt="Rt. Rev. Abraham Matiop Deng Kechdit" style="height: 200px; width: 200px; object-fit: cover; object-position: top; border-radius: 50%;">
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">Diocesan Bishop</p>
                  <h5 class="text-white">
                    <a href="{{ route('bishop') }}">Rt. Rev. Abraham Matiop Deng</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>

          <!-- Bishop's Commissioner -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-and-clergy.jpeg') }}" alt="Canon Michael Makuol Garang" style="height: 200px; width: 200px; object-fit: cover; object-position: top; border-radius: 50%;">
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">Bishop's Commissioner</p>
                  <h5 class="text-white">
                    <a href="{{ route('leadership') }}">Canon Michael Makuol Garang</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>

          <!-- Secretary of Diocese -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Archdeacon Samuel Akuak" style="height: 200px; width: 200px; object-fit: cover; object-position: top; border-radius: 50%;">
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">Secretary of Diocese</p>
                  <h5 class="text-white">
                    <a href="{{ route('leadership') }}">Archdeacon Samuel Akuak</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>

          <!-- Mothers' Union Leadership -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers' Union Executive" style="height: 200px; width: 200px; object-fit: cover; object-position: top; border-radius: 50%;">
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">Mothers' Union Executive</p>
                  <h5 class="text-white">
                    <a href="{{ route('ministry.detail') }}">Diocesan MU Leaders</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="text-center mt-3">
          <a href="{{ route('leadership') }}" class="sigma_btn-custom light text-white">View Full Clergy Directory <i class="far fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
    <!-- Leadership Section End -->

    <!-- Diocesan Giving & Appeal Start -->
    <div class="section section-padding">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle">Partners In Mission</p>
          <h4 class="title">Support Our Diocesan Outreach</h4>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_service style-2 h-100 d-flex flex-column justify-content-between">
              <div class="sigma_service-thumb" style="height: 210px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 6px;">
                <img loading="lazy" src="{{ asset('assets/img/diocese/church-community-2.jpeg') }}" alt="Church Sanctuary Construction" class="img-full-display">
              </div>
              <div class="sigma_service-body flex-grow-1 d-flex flex-column justify-content-between">
                <div>
                  <h5><a href="{{ route('donation') }}">Church Reconstruction</a></h5>
                  <p>Supporting the construction and roofing of durable parish sanctuaries and prayer centers in Jalle Payam.</p>
                </div>
                <div class="mt-3">
                  <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Contribute Now</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_service style-2 h-100 d-flex flex-column justify-content-between">
              <div class="sigma_service-thumb" style="height: 210px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 6px;">
                <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Community Flood Relief" class="img-full-display">
              </div>
              <div class="sigma_service-body flex-grow-1 d-flex flex-column justify-content-between">
                <div>
                  <h5><a href="{{ route('donation') }}">Emergency Flood Relief</a></h5>
                  <p>Providing food staples, clean drinking water, and blankets to families displaced by heavy seasonal flooding in Jonglei.</p>
                </div>
                <div class="mt-3">
                  <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Support Relief</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="sigma_service style-2 h-100 d-flex flex-column justify-content-between">
              <div class="sigma_service-thumb" style="height: 210px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 6px;">
                <img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Theological Training" class="img-full-display">
              </div>
              <div class="sigma_service-body flex-grow-1 d-flex flex-column justify-content-between">
                <div>
                  <h5><a href="{{ route('donation') }}">Clergy & Lay Training</a></h5>
                  <p>Sponsoring theological education, Bible distribution, and literacy materials for pastors, catechists, and evangelists.</p>
                </div>
                <div class="mt-3">
                  <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Equip Clergy</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Diocesan Giving & Appeal End -->

    <!-- Featured Episcopal Sermon Spotlight Start -->
    <div class="section section-padding pt-0">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle">The Living Word</p>
          <h4 class="title">Featured Pastoral Teaching</h4>
        </div>
        <div class="row">
          <div class="col-12 mb-4">
            <div class="row g-0 rounded shadow-sm overflow-hidden">
              <div class="col-lg-6">
                <div style="height: 340px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                  <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-preaching.jpeg') }}" alt="Bishop Abraham Preaching" class="img-full-display">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sigma_box m-0 h-100 p-4 p-md-5 d-flex align-items-center bg-white border">
                  <div>
                    <p class="custom-primary mb-1 fw-600 fs-13 text-uppercase"><i class="fas fa-bible me-2"></i> Featured Episcopal Sermon</p>
                    <h4 class="title mb-3 fs-22">Walking in Faith, Love, and Unity in Christ</h4>
                    <p class="m-0 text-muted mb-3 fs-14">A profound pastoral message delivered by Rt. Rev. Bishop Abraham Matiop Deng Kechdit on Romans 12:9-21 — urging our community to cling to what is good, overcome evil with love, and preserve peace in Jonglei.</p>
                    <div class="btn-pair mt-3">
                      <a href="{{ route('sermons') }}" class="sigma_btn-custom">Browse All Sermons</a>
                      <a href="{{ route('gallery') }}" class="sigma_btn-custom light">Photo Gallery</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featured Episcopal Sermon Spotlight End -->

    

    <!-- Dynamic Sermons Section -->
    <div class="section section-padding bg-cover bg-center" style="background-image: url('{{ asset('assets/img/bg1.webp') }}')">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle text-white">Word & Pastoral Care</p>
          <h4 class="title text-white">Latest Preaching & Messages</h4>
        </div>

        <div class="row align-items-center">
          @if($featuredSermon)
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="sigma_sermon-box p-4 rounded bg-white shadow-sm border">
                @if($featuredSermon->image)
                  <img src="{{ asset('storage/' . $featuredSermon->image) }}" alt="{{ $featuredSermon->title }}" class="w-100 rounded mb-3" style="max-height: 280px; object-fit: cover;">
                @else
                  <img src="{{ asset('assets/img/diocese/bishop-preaching.jpeg') }}" alt="{{ $featuredSermon->title }}" class="w-100 rounded mb-3" style="max-height: 280px; object-fit: cover;">
                @endif
                <span class="badge bg-primary mb-2">Featured Sermon</span>
                <h5 class="mb-2"><a href="{{ route('sermon.show', $featuredSermon->slug) }}" class="text-dark">{{ $featuredSermon->title }}</a></h5>
                <p class="text-muted small mb-2"><i class="fas fa-user me-1"></i> {{ $featuredSermon->preacher }} &nbsp;|&nbsp; <i class="fas fa-calendar-alt me-1"></i> {{ $featuredSermon->sermon_date ? $featuredSermon->sermon_date->format('M d, Y') : '' }}</p>
                @if($featuredSermon->scripture)
                  <p class="text-primary small fw-semibold mb-2"><i class="fas fa-bookmark me-1"></i> {{ $featuredSermon->scripture }}</p>
                @endif
                <p class="text-muted fs-14 mb-3">{{ Str::limit($featuredSermon->description, 160) }}</p>
                <div class="d-flex gap-2">
                  <a href="{{ route('sermon.show', $featuredSermon->slug) }}" class="sigma_btn-custom btn-sm">Listen & Read <i class="far fa-arrow-right ms-1"></i></a>
                  @if($featuredSermon->video_url)
                    <a href="{{ $featuredSermon->video_url }}" target="_blank" class="btn btn-outline-danger btn-sm d-flex align-items-center"><i class="fas fa-video me-1"></i> Watch Video</a>
                  @endif
                </div>
              </div>
            </div>
          @else
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="sigma_sermon-box p-4 rounded bg-white shadow-sm border text-center py-5">
                <i class="fas fa-bible fa-3x text-primary mb-3"></i>
                <h5>Pastoral Sermons</h5>
                <p class="text-muted">Listen to uplifting messages of hope, reconciliation, and Christian discipleship.</p>
                <a href="{{ route('sermons') }}" class="sigma_btn-custom btn-sm">View Sermon Archive</a>
              </div>
            </div>
          @endif

          <div class="col-lg-6">
            <div class="ps-lg-4">
              <h5 class="mb-3 text-white">Recent Messages &amp; Teachings</h5>
              @php
                $recentSermonList = \App\Models\Sermon::orderBy('sermon_date', 'desc')->take(3)->get();
              @endphp
              @forelse($recentSermonList as $s)
                <div class="d-flex align-items-start mb-3 p-3 rounded bg-white shadow-sm border">
                  <div class="me-3 text-center p-2 rounded bg-light border" style="min-width: 60px;">
                    <strong class="d-block text-primary fs-18">{{ $s->sermon_date ? $s->sermon_date->format('d') : '' }}</strong>
                    <small class="text-muted text-uppercase">{{ $s->sermon_date ? $s->sermon_date->format('M') : '' }}</small>
                  </div>
                  <div>
                    <h6 class="mb-1"><a href="{{ route('sermon.show', $s->slug) }}" class="text-dark">{{ $s->title }}</a></h6>
                    <small class="text-muted d-block mb-1"><i class="fas fa-user-circle me-1"></i> {{ $s->preacher }}</small>
                    @if($s->scripture)
                      <small class="text-primary"><i class="fas fa-book me-1"></i> {{ $s->scripture }}</small>
                    @endif
                  </div>
                </div>
              @empty
                <p class="text-muted">Sermons will appear here once published by the diocese.</p>
              @endforelse
              <div class="mt-3">
                <a href="{{ route('sermons') }}" class="fw-bold text-white">Browse All Sermons <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Dynamic Events Section -->
    <div class="section section-padding">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle">Assemblies & Gatherings</p>
          <h4 class="title">Upcoming Diocesan Events</h4>
        </div>

        <div class="row">
          @forelse($events as $event)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 border shadow-sm rounded overflow-hidden">
                @if($event->image)
                  <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">
                @else
                  <img src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body p-4 d-flex flex-column">
                  <div class="d-flex align-items-center text-muted small mb-2">
                    <i class="far fa-calendar-alt text-primary me-2"></i>
                    <span>{{ $event->start_date ? $event->start_date->format('M d, Y') : '' }}</span>
                  </div>
                  <h5 class="card-title mb-2">
                    <a href="{{ route('event.show', $event->slug) }}" class="text-dark text-decoration-none">{{ $event->title }}</a>
                  </h5>
                  <div class="small text-muted mb-3">
                    <i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $event->location }}
                  </div>
                  <p class="card-text text-muted small flex-grow-1">
                    {{ Str::limit($event->description, 120) }}
                  </p>
                  <a href="{{ route('event.show', $event->slug) }}" class="fw-bold custom-primary fs-14 mt-2">
                    Event Details <i class="far fa-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <p class="text-muted">No upcoming events scheduled right now. Check back soon for announcements on assemblies and conferences.</p>
            </div>
          @endforelse
        </div>

        <div class="text-center mt-3">
          <a href="{{ route('events') }}" class="sigma_btn-custom">View All Events & Synods <i class="far fa-arrow-right"></i></a>
        </div>
      </div>
    </div>


    <!-- Dynamic Diocesan News Section -->
    <div class="section section-padding primary-overlay bg-cover bg-center" style="background-image: url('{{ asset('assets/img/bg3.webp') }}')">
      <div class="container">
        <div class="section-title text-center">
          <p class="subtitle text-white">News & Events</p>
          <h4 class="title text-white">Diocesan Updates & Articles</h4>
        </div>

        <div class="row">
          @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
              <article class="sigma_post bg-white rounded overflow-hidden shadow-sm h-100 d-flex flex-column">
                <div class="sigma_post-thumb">
                  <a href="{{ route('news.show', $post->slug) }}">
                    @if($post->image)
                      <img loading="lazy" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                    @else
                      <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-and-clergy.jpeg') }}" alt="{{ $post->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                    @endif
                  </a>
                </div>
                <div class="sigma_post-body p-4 d-flex flex-column flex-grow-1">
                  <div class="sigma_post-meta mb-2 d-flex justify-content-between align-items-center">
                    <span class="custom-primary"><i class="far fa-calendar me-1"></i> {{ $post->created_at->format('M d, Y') }}</span>
                    <span class="badge bg-light text-dark border">{{ $post->category }}</span>
                  </div>
                  <h5 class="mb-2">
                    <a href="{{ route('news.show', $post->slug) }}" class="text-dark">{{ $post->title }}</a>
                  </h5>
                  <p class="text-muted fs-14 mb-3 flex-grow-1">{{ Str::limit($post->excerpt ?: strip_tags($post->content), 120) }}</p>
                  <a href="{{ route('news.show', $post->slug) }}" class="fw-bold fs-14 custom-primary mt-auto">Read Full Story <i class="far fa-arrow-right ms-1"></i></a>
                </div>
              </article>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <p class="text-white">No articles published yet. Check back soon for diocesan news.</p>
            </div>
          @endforelse
        </div>

        <div class="text-center mt-3">
          <a href="{{ route('news') }}" class="sigma_btn-custom">View All News & Announcements <i class="far fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

@endsection

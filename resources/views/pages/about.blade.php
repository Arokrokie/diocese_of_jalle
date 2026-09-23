@extends('layouts.app')

@section('title', 'About Our Diocese & Mission')
@section('meta_description', 'Discover the history, vision, and Christian mission of the Diocese of Jalle, Jonglei Internal Province, Episcopal Church of South Sudan (ECSS), ministering under the leadership of Rt. Rev. Abraham Matiop Deng Kechdit.')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>About the Diocese of Jalle</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- About Intro Start -->
  <section class="section">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="row g-3">
            <div class="col-12">
              <div class="img-frame-large rounded shadow-sm overflow-hidden">
                <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Diocese of Jalle Fellowship Assembly" class="img-full-display">
              </div>
            </div>
            <div class="col-6">
              <div class="img-frame-small rounded shadow-sm overflow-hidden">
                <img loading="lazy" src="{{ asset('assets/img/diocese/church-community-2.jpeg') }}" alt="Diocese of Jalle Community" class="img-full-display">
              </div>
            </div>
            <div class="col-6">
              <div class="img-frame-small rounded shadow-sm overflow-hidden">
                <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-and-clergy.jpeg') }}" alt="Bishop and Clergy" class="img-full-display">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ps-lg-4">
            <div class="section-title mb-3 text-start">
              <p class="subtitle">Who We Are</p>
              <h4 class="title">The Episcopal Diocese of Jalle</h4>
            </div>
            <p class="blockquote bg-transparent border-start border-primary border-3 ps-3 mb-3">
              "For where two or three gather in my name, there am I with them." — Matthew 18:20
            </p>
            <p>
              The Diocese of Jalle (DoJ) is an Episcopal Area Diocese of the Episcopal Church of South Sudan (ECSS), situated in the Jonglei Internal Province (JIP). Created in 2021 and becoming fully operational in 2023, it serves the faithful people of Jalle Payam, Bor County, and surrounding communities in Jonglei State. Our diocese exists to preach the Gospel of salvation through Jesus Christ, promote reconciliation, and empower families through Christian education, healthcare advocacy, and pastoral care.
            </p>
            <p>
              Led by Diocesan Bishop Rt. Rev. Abraham Matiop Deng Kechdit, Bishop's Commissioner Canon Michael Makuol Garang, and Secretary of Diocese Archdeacon Samuel Akuak, the diocese comprises parishes, archdeaconries, and vibrant ministries including the globally respected Mothers' Union (MU), youth fellowships, and evangelical mission teams.
            </p>

            <div class="row mt-4">
              <div class="col-sm-6 mb-3">
                <div class="sigma_icon-block icon-block-3">
                  <div class="icon-wrapper">
                    <i class="flaticon-church-2" style="font-size: 52px;"></i>
                  </div>
                  <div class="sigma_icon-block-content">
                    <h5>Biblical Faith</h5>
                    <p>Rooted in historic Anglican theology, Holy Scripture, and the Book of Common Prayer.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="sigma_icon-block icon-block-3">
                  <div class="icon-wrapper">
                    <i class="flaticon-charity" style="font-size: 52px;"></i>
                  </div>
                  <div class="sigma_icon-block-content">
                    <h5>Peacebuilding</h5>
                    <p>Fostering unity, conflict resolution, and mutual love.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Intro End -->

  <!-- Vision, Mission & Core Values Start -->
  <section class="section light-bg">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Our Foundational Principles</p>
        <h4 class="title">Vision, Mission & Values</h4>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service border style-1 bg-white h-100 shadow-sm">
            <div class="sigma_service-thumb">
              <i class="flaticon-church"></i>
              <span></span>
              <span></span>
            </div>
            <div class="sigma_service-body">
              <h5>Our Vision</h5>
              <p>A spiritually vibrant, peaceful, and self-sustaining Christian community walking in holiness, love, and unity under the lordship of Jesus Christ.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service border style-1 primary-bg h-100 shadow-sm">
            <div class="sigma_service-thumb">
              <i class="text-white flaticon-speech"></i>
              <span></span>
              <span></span>
            </div>
            <div class="sigma_service-body">
              <h5 class="text-white">Our Mission</h5>
              <p class="text-white">To proclaim the Gospel of Jesus Christ, disciple believers, nurture godly families through the Mothers' Union, provide relief, and foster sustainable peace across Jalle.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service border style-1 secondary-bg h-100 shadow-sm">
            <div class="sigma_service-thumb">
              <i class="custom-primary flaticon-praying"></i>
              <span></span>
              <span></span>
            </div>
            <div class="sigma_service-body">
              <h5 class="text-white">Core Values</h5>
              <p class="text-white">Scriptural Authority, Christ-centered Worship, Servant Leadership, Integrity, Forgiveness, Reconciliation, and Compassion for the Vulnerable.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Vision, Mission & Core Values End -->

  <!-- Diocesan History Timeline Start -->
  <div class="section">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Our Journey</p>
        <h4 class="title">Milestones of the Diocese</h4>
      </div>
      <div class="sigma_timeline">
        <div class="row g-0 justify-content-end justify-content-md-around align-items-start sigma_timeline-nodes">
          <div class="col-12 col-md-5 order-3 order-md-1 sigma_timeline-content">
            <h4>Pioneering Anglican Missions in Jonglei</h4>
            <p>Christian missionaries and early South Sudanese evangelists plant the Anglican faith in Bor and Jalle payams, establishing strong roots of scripture and song.</p>
          </div>
          <div class="col-2 col-sm-1 px-md-3 order-2 sigma_timeline-image text-md-center">
            <i class="far fa-circle"></i>
          </div>
          <div class="col-12 col-md-5 order-1 order-md-3 pb-3 sigma_timeline-date">
            <span>HISTORIC</span><br><span class="sigma_timeline-month">FOUNDATIONS</span>
          </div>
        </div>
        <div class="row g-0 justify-content-end justify-content-md-around align-items-start sigma_timeline-nodes">
          <div class="col-12 col-md-5 order-3 order-md-1 sigma_timeline-content">
            <h4>Faith Enduring Through Hardship</h4>
            <p>During decades of civil conflicts, church leaders and the Mothers' Union preserve community cohesion, prayer camps, and spiritual fellowship across displaced populations.</p>
          </div>
          <div class="col-2 col-sm-1 px-md-3 order-2 sigma_timeline-image text-md-center">
            <i class="far fa-circle"></i>
          </div>
          <div class="col-12 col-md-5 order-1 order-md-3 pb-3 sigma_timeline-date">
            <span>RESILIENCE</span><br><span class="sigma_timeline-month">PRAYER & HOPE</span>
          </div>
        </div>
        <div class="row g-0 justify-content-end justify-content-md-around align-items-start sigma_timeline-nodes">
          <div class="col-12 col-md-5 order-3 order-md-1 sigma_timeline-content">
            <h4>Establishment of the Diocese of Jalle</h4>
            <p>The Diocese of Jalle (DoJ) was created in <strong>2021</strong> within the Jonglei Internal Province of the ECSS, bringing episcopal governance and pastoral care closer to the grassroots parishes of Jalle. The diocese became <strong>fully operational in 2023</strong> under Bishop Abraham Matiop Deng Kechdit.</p>
          </div>
          <div class="col-2 col-sm-1 px-md-3 order-2 sigma_timeline-image text-md-center">
            <i class="far fa-circle"></i>
          </div>
          <div class="col-12 col-md-5 order-1 order-md-3 pb-3 sigma_timeline-date">
            <span>2021 – 2023</span><br><span class="sigma_timeline-month">DIOCESE FORMED</span>
          </div>
        </div>

        <div class="row g-0 justify-content-end justify-content-md-around align-items-start sigma_timeline-nodes">
          <div class="col-12 col-md-5 order-3 order-md-1 sigma_timeline-content">
            <h4>Episcopal Leadership & Revival Today</h4>
            <p>Under Rt. Rev. Bishop Abraham Matiop Deng Kechdit, the diocese actively develops schools, parish chapels, flood recovery initiatives, and spiritual renewal programs.</p>
          </div>
          <div class="col-2 col-sm-1 px-md-3 order-2 sigma_timeline-image text-md-center">
            <i class="far fa-circle"></i>
          </div>
          <div class="col-12 col-md-5 order-1 order-md-3 pb-3 sigma_timeline-date">
            <span>TODAY</span><br><span class="sigma_timeline-month">GROWTH & PEACE</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Diocesan History Timeline End -->

  <!-- Leadership CTA Start -->
  <div class="section pt-0">
    <div class="container">
      <div class="sigma_box bg-white p-5 rounded text-center border shadow-sm">
        <h3 class="custom-primary mb-3">Meet the Clergy & Diocesan Council</h3>
        <p class="text-muted max-w-700 mx-auto mb-4">Dedicated pastors, evangelists, deacons, and Mothers' Union leaders faithfully ministering in parishes across the Diocese of Jalle.</p>
        <div class="btn-pair justify-content-center mt-3">
          <a href="{{ route('leadership') }}" class="sigma_btn-custom secondary">Leadership Directory</a>
          <a href="{{ route('contact') }}" class="sigma_btn-custom light">Contact Office</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Leadership CTA End -->
@endsection

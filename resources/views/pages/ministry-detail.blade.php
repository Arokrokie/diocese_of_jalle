@extends('layouts.app')

@section('title', "Mothers' Union (MU) Ministry")

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Mothers' Union (MU)</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mothers' Union</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="sigma_post-single-thumb mb-4">
            <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers' Union Diocese of Jalle" class="w-100 rounded shadow-sm">
          </div>
          <h2 class="entry-title fs-24 fw-bold mb-2">The Mothers' Union (MU) — Diocese of Jalle</h2>
          <div class="sigma_post-meta fs-13 mb-3 pb-2 border-bottom">
            <span class="custom-primary me-3"><i class="fas fa-users me-1"></i> Women's Fellowship</span>
            <span class="text-muted"><i class="fas fa-church me-1"></i> Episcopal Church of South Sudan</span>
          </div>

          <p class="text-muted fs-15 mb-4" style="line-height: 1.7;">
            The Mothers' Union is the heartbeat of Christian family life, pastoral care, and community resilience in the Diocese of Jalle. Dressed in their distinctive blue and white vestments, our mothers stand as pillars of prayer, evangelism, and hope across every parish.
          </p>

          <h4 class="fs-18 fw-bold mt-4 mb-2">Pillars of the Mothers' Union</h4>
          <p class="text-muted fs-14 mb-3">
            Rooted in the worldwide Anglican Mothers' Union movement, our diocesan branch pursues five core aims:
          </p>
          <ul class="list-unstyled mb-4">
            <li class="mb-3 fs-14 d-flex align-items-start text-muted">
              <i class="fas fa-check-circle custom-primary me-2 mt-1"></i>
              <div><strong class="text-dark">Promoting Christian Marriage & Family:</strong> Upholding the sanctity of marriage and providing pre-marital and marital counseling for couples.</div>
            </li>
            <li class="mb-3 fs-14 d-flex align-items-start text-muted">
              <i class="fas fa-check-circle custom-primary me-2 mt-1"></i>
              <div><strong class="text-dark">Nurturing Children in Faith:</strong> Raising boys and girls to know God's love, moral integrity, and respect for elders and society.</div>
            </li>
            <li class="mb-3 fs-14 d-flex align-items-start text-muted">
              <i class="fas fa-check-circle custom-primary me-2 mt-1"></i>
              <div><strong class="text-dark">Prayer & Spiritual Fellowship:</strong> Gathering weekly on Thursdays for dedicated intercession for peace in South Sudan, our churches, and vulnerable families.</div>
            </li>
            <li class="mb-3 fs-14 d-flex align-items-start text-muted">
              <i class="fas fa-check-circle custom-primary me-2 mt-1"></i>
              <div><strong class="text-dark">Economic & Literacy Empowerment:</strong> Providing adult literacy classes, agricultural training, tailoring, and small business guidance to women.</div>
            </li>
            <li class="mb-3 fs-14 d-flex align-items-start text-muted">
              <i class="fas fa-check-circle custom-primary me-2 mt-1"></i>
              <div><strong class="text-dark">Relief & Compassion:</strong> Caring for widows, orphans, disabled community members, and those displaced by seasonal floods.</div>
            </li>
          </ul>

          <h4 class="fs-18 fw-bold mt-4 mb-2">Weekly Schedule & Activities</h4>
          <div class="table-responsive rounded shadow-sm mt-3">
            <table class="table table-bordered table-sm mb-0 fs-13">
              <thead class="table-light">
                <tr>
                  <th>Day & Time</th>
                  <th>Activity</th>
                  <th>Location</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Thursday 3:00 PM</strong></td>
                  <td>Diocesan Mothers' Union Fellowship & Prayer</td>
                  <td>Diocesan Center & Parish Sanctuaries</td>
                </tr>
                <tr>
                  <td><strong>Saturday 9:00 AM</strong></td>
                  <td>Women's Literacy & Skill Workshops</td>
                  <td>Jalle Parish Center</td>
                </tr>
                <tr>
                  <td><strong>Sunday 9:00 AM</strong></td>
                  <td>Sunday Morning Service & Family Welcoming</td>
                  <td>All Diocesan Parishes</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar p-4 bg-light rounded shadow-sm border">
            <h5 class="widget-title fs-16 mb-3">Ministry Quick Facts</h5>
            <ul class="list-unstyled mb-4 fs-13">
              <li class="mb-2"><strong>Affiliation:</strong> ECSS Mothers' Union</li>
              <li class="mb-2"><strong>Diocese:</strong> Diocese of Jalle</li>
              <li class="mb-2"><strong>Patron:</strong> Rt. Rev. Bishop Abraham Matiop</li>
              <li class="mb-2"><strong>Meetings:</strong> Every Thursday 3:00 PM</li>
              <li class="mb-2"><strong>Email:</strong> info@dioceseofjalle.org</li>
            </ul>

            <h5 class="widget-title fs-16 mt-4 mb-3">Other Diocesan Ministries</h5>
            <ul class="list-unstyled fs-13 mb-4">
              <li class="mb-2"><a href="{{ route('ministries') }}" class="text-dark"><i class="fas fa-arrow-right custom-primary me-2"></i> Youth & Praise Ministry</a></li>
              <li class="mb-2"><a href="{{ route('ministries') }}" class="text-dark"><i class="fas fa-arrow-right custom-primary me-2"></i> Clergy & Evangelism</a></li>
              <li class="mb-2"><a href="{{ route('ministries') }}" class="text-dark"><i class="fas fa-arrow-right custom-primary me-2"></i> Peace & Reconciliation</a></li>
              <li class="mb-2"><a href="{{ route('ministries') }}" class="text-dark"><i class="fas fa-arrow-right custom-primary me-2"></i> Sunday School & Children</a></li>
            </ul>

            <div class="text-center">
              <a href="{{ route('donation') }}" class="sigma_btn-custom w-100">Support Mothers' Union</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

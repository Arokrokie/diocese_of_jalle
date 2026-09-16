@extends('layouts.app')

@section('title', 'Frequently Asked Questions')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Frequently Asked Questions</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Answers to Common Inquiries</p>
        <h4 class="title">Frequently Asked Questions</h4>
        <p class="max-w-700 mx-auto text-muted">Helpful answers about the Diocese of Jalle, service times, parish ministries, and community initiatives.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item mb-3 border rounded">
              <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq1">
                  Where is the Diocese of Jalle located?
                </button>
              </h2>
              <div id="collapseFaq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  The Diocese of Jalle is headquartered in Jalle Payam, Bor County, Jonglei State, South Sudan. It belongs to the Jonglei Internal Province of the Episcopal Church of South Sudan (ECSS).
                </div>
              </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item mb-3 border rounded">
              <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq2">
                  Who is the Bishop of the Diocese of Jalle?
                </button>
              </h2>
              <div id="collapseFaq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  The Diocese of Jalle is led by <strong>Rt. Rev. Abraham Matiop Deng Kechdit</strong>, who oversees pastoral care, diocesan administration, clergy ordinations, and community peacebuilding initiatives across the diocese.
                </div>
              </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item mb-3 border rounded">
              <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq3">
                  What are the Sunday worship timings?
                </button>
              </h2>
              <div id="collapseFaq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  Sunday Morning Prayer begins at 9:00 AM, followed by the Holy Communion service and sermon from 10:30 AM to 12:30 PM. Children and youth participate in Sunday School and youth choir devotions.
                </div>
              </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item mb-3 border rounded">
              <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq4">
                  How can I get involved with the Mothers' Union?
                </button>
              </h2>
              <div id="collapseFaq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  All Christian women and mothers are warmly invited to join the Mothers' Union (MU). Meetings are held every Thursday at 3:00 PM in local parishes for prayer, family discipleship, and community service.
                </div>
              </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item mb-3 border rounded">
              <h2 class="accordion-header" id="faq5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq5">
                  How can individuals or organizations partner with or donate to the Diocese?
                </button>
              </h2>
              <div id="collapseFaq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  You can support church construction, clergy training, and flood relief efforts by visiting our <a href="{{ route('donation') }}">Donation page</a> or emailing <a href="mailto:info@dioceseofjalle.org">info@dioceseofjalle.org</a> to coordinate direct contributions.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

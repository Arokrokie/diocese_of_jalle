@extends('layouts.app')

@section('title', 'Bible Archive & Lectionary Readings')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Bible Archive & Scripture</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bible Archive</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Daily Bread</p>
        <h4 class="title">Scripture Readings & Anglican Lectionary</h4>
        <p class="max-w-700 mx-auto text-muted">Daily spiritual nourishment grounded in Holy Scripture and the Anglican lectionary readings.</p>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="p-4 border rounded bg-white shadow-sm mb-4">
            <span class="badge bg-primary mb-2">Today's Reading</span>
            <h3>"Be Still, and Know that I am God" — Psalm 46</h3>
            <p class="text-muted fst-italic">"God is our refuge and strength, an ever-present help in trouble. Therefore we will not fear, though the earth give way and the mountains fall into the heart of the sea..."</p>
            <p>
              In seasons of flood, displacement, and testing in Jonglei State, this ancient psalm reminds us that God's sovereignty surpasses all earthly upheavals. The city of God will not fall, for God is within her.
            </p>
          </div>

          <div class="p-4 border rounded bg-white shadow-sm mb-4">
            <span class="badge bg-secondary mb-2">Gospel Reading</span>
            <h3>"The Beatitudes" — Matthew 5:1-12</h3>
            <p class="text-muted fst-italic">"Blessed are the peacemakers, for they will be called children of God. Blessed are those who are persecuted because of righteousness, for theirs is the kingdom of heaven."</p>
            <p>
              Christ's manifesto of grace calls us to humble hearts, merciful deeds, and peacemaking in our villages and families.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar p-4 bg-light rounded">
            <h5 class="widget-title">Anglican Lectionary</h5>
            <p class="text-muted fs-14">The Diocese of Jalle follows the ECSS lectionary readings uniting Christians in daily scripture meditation across South Sudan.</p>
            <ul class="list-unstyled fs-14">
              <li class="mb-2"><i class="fas fa-book custom-primary me-2"></i> Old Testament: Isaiah & Psalms</li>
              <li class="mb-2"><i class="fas fa-book-reader custom-primary me-2"></i> New Testament: Epistles</li>
              <li class="mb-2"><i class="fas fa-cross custom-primary me-2"></i> Gospel: Matthew, Mark, Luke, John</li>
            </ul>
            <div class="mt-4">
              <a href="{{ route('sermons') }}" class="sigma_btn-custom w-100 text-center">Read Related Sermons</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

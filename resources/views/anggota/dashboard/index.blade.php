@extends('layouts.stisla.index', ['title' => 'Anggota Dashboard', 'section_header' => 'Anggota Dashboard'])

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-items mt-3">
          <div class="card-stats-item">
            <div class="card-stats-item-count">{{ count($book_approved) }}</div>
            <div class="card-stats-item-label">Disetujui</div>
          </div>
          <div class="card-stats-item">
            <!-- <div class="card-stats-item-count"></div>
            <div class="card-stats-item-label">Menunggu</div> -->
          </div>
          <div class="card-stats-item">
            <div class="card-stats-item-count">{{ count($book_not_approve) }}</div>
            <div class="card-stats-item-label">Menunggu</div>
          </div>
        </div>
      </div>
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-book"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Buku Yang Saya Pinjam</h4>
        </div>
        <div class="card-body">
          {{ count($book_user) }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-chart">
        <canvas id="balance-chart" height="80"></canvas>
      </div>
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-book"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Balance</h4>
        </div>
        <div class="card-body">
          $187,13
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-chart">
        <canvas id="sales-chart" height="80"></canvas>
      </div>
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-shopping-bag"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Sales</h4>
        </div>
        <div class="card-body">
          4,732
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
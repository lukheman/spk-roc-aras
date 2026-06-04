<div>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-content">
      <!-- Tag -->
      <div class="hero-tag">
        <span class="dot"></span>
        <span>Sistem Pendukung Keputusan Beasiswa</span>
      </div>

      <!-- Main Heading -->
      <h1>
        <span class="highlight">SMA Negeri 1</span><br>
        Watubangga
      </h1>

      <!-- Description -->
      <p class="subtitle">
        Platform cerdas untuk seleksi penerima beasiswa menggunakan metode
        <strong style="color: #f8fafc;">ROC</strong> dan <strong style="color: #f8fafc;">ARAS</strong>.
        Menghasilkan keputusan yang objektif, transparan, dan terukur.
      </p>

      <!-- Action Buttons -->
      <div class="hero-buttons">
        <a href="{{ route('login') }}" class="btn-primary-custom">
          <i class="bi bi-arrow-right-circle"></i>
          Masuk Sistem
        </a>
        <a href="#features" class="btn-outline-custom">
          <i class="bi bi-grid-3x3-gap"></i>
          Pelajari Metode
        </a>
      </div>

      <!-- Method Stats -->
      <div class="method-cards">
        <div class="method-card">
          <div class="card-value">ROC</div>
          <div class="card-label">Pembobotan</div>
        </div>
        <div class="method-card">
          <div class="card-value">ARAS</div>
          <div class="card-label">Perankingan</div>
        </div>
        <div class="method-card">
          <div class="card-value">{{ $jumlahKriteria }}</div>
          <div class="card-label">Kriteria</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="section">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-label">
          <i class="bi bi-cpu"></i> Metode yang Digunakan
        </div>
        <h2 class="section-title">Fitur Unggulan</h2>
        <p class="section-desc">
          Kombinasi metode ROC dan ARAS untuk menghasilkan keputusan seleksi beasiswa yang akurat
        </p>
      </div>

      <div class="row g-4">
        <!-- Feature 1 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box green">
              <i class="bi bi-bar-chart-steps"></i>
            </div>
            <h4>Metode ROC</h4>
            <p>
              Rank Order Centroid untuk menentukan bobot prioritas kriteria secara objektif berdasarkan urutan
              kepentingan.
            </p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box teal">
              <i class="bi bi-trophy"></i>
            </div>
            <h4>Metode ARAS</h4>
            <p>
              Additive Ratio Assessment untuk perankingan alternatif berdasarkan rasio utilitas terhadap solusi optimal.
            </p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box blue">
              <i class="bi bi-clipboard-data"></i>
            </div>
            <h4>Seleksi Terukur</h4>
            <p>
              {{ $jumlahKriteria }} kriteria penilaian yang dapat dikelola secara dinamis melalui sistem.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

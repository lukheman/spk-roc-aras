<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMA Negeri 1 Tanggetada - Sistem Pendukung Keputusan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --emerald-500: #10b981;
      --emerald-400: #34d399;
      --emerald-600: #059669;
      --teal-500: #14b8a6;
      --slate-900: #0f172a;
      --slate-800: #1e293b;
      --slate-700: #334155;
      --slate-600: #475569;
      --slate-400: #94a3b8;
      --slate-300: #cbd5e1;
      --slate-200: #e2e8f0;
      --slate-100: #f1f5f9;
      --accent-glow: rgba(16, 185, 129, 0.15);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
      color: #f8fafc;
      background: var(--slate-900);
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Grid pattern background */
    .grid-bg {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      background-image:
        linear-gradient(rgba(16, 185, 129, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(16, 185, 129, 0.03) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    .glow-orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(100px);
      pointer-events: none;
      z-index: 0;
    }

    .glow-orb-1 {
      width: 600px;
      height: 600px;
      background: rgba(16, 185, 129, 0.08);
      top: -200px;
      left: -200px;
      animation: orbFloat 15s infinite ease-in-out;
    }

    .glow-orb-2 {
      width: 500px;
      height: 500px;
      background: rgba(20, 184, 166, 0.06);
      bottom: -150px;
      right: -150px;
      animation: orbFloat 20s infinite ease-in-out reverse;
    }

    @keyframes orbFloat {

      0%,
      100% {
        transform: translate(0, 0);
      }

      50% {
        transform: translate(30px, -30px);
      }
    }

    /* Content wrapper */
    .content-wrapper {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar {
      background: rgba(15, 23, 42, 0.8);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(16, 185, 129, 0.1);
      padding: 1rem 0;
      transition: all 0.3s ease;
    }

    .navbar.scrolled {
      background: rgba(15, 23, 42, 0.95);
      padding: 0.75rem 0;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.3rem;
      color: #f8fafc !important;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }

    .navbar-brand .brand-icon {
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
    }

    .nav-link {
      color: var(--slate-400) !important;
      font-weight: 500;
      padding: 0.5rem 1.25rem !important;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #f8fafc !important;
      background: rgba(16, 185, 129, 0.1);
    }

    .nav-link.btn-login {
      background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
      color: white !important;
      padding: 0.5rem 1.5rem !important;
      margin-left: 0.5rem;
      border-radius: 8px;
      font-weight: 600;
    }

    .nav-link.btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }

    .navbar-toggler {
      border: 1px solid rgba(16, 185, 129, 0.3);
      padding: 0.5rem;
      border-radius: 8px;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28148, 163, 184, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Hero Section */
    .hero-section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 8rem 1rem 4rem;
      position: relative;
    }

    .hero-content {
      max-width: 850px;
      animation: fadeInUp 0.8s ease;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid rgba(16, 185, 129, 0.2);
      padding: 0.4rem 1rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--emerald-400);
      margin-bottom: 2rem;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .hero-tag .dot {
      width: 6px;
      height: 6px;
      background: var(--emerald-400);
      border-radius: 50%;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0.3;
      }
    }

    .hero-content h1 {
      font-size: clamp(2.8rem, 6vw, 4.5rem);
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 1.5rem;
      color: #f8fafc;
    }

    .hero-content h1 .highlight {
      background: linear-gradient(135deg, var(--emerald-400), var(--teal-500));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-content .subtitle {
      font-size: 1.15rem;
      color: var(--slate-400);
      margin-bottom: 2.5rem;
      line-height: 1.8;
      max-width: 650px;
      margin-left: auto;
      margin-right: auto;
    }

    .hero-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 4rem;
    }

    .btn-primary-custom {
      background: linear-gradient(135deg, var(--emerald-500), var(--emerald-600));
      color: white;
      border: none;
      padding: 0.9rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: all 0.3s ease;
      text-decoration: none;
      font-family: 'Outfit', sans-serif;
    }

    .btn-primary-custom:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.35);
      color: white;
    }

    .btn-outline-custom {
      background: transparent;
      color: var(--slate-300);
      border: 1px solid var(--slate-600);
      padding: 0.9rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: all 0.3s ease;
      text-decoration: none;
      font-family: 'Outfit', sans-serif;
    }

    .btn-outline-custom:hover {
      background: var(--slate-800);
      border-color: var(--emerald-500);
      color: var(--emerald-400);
      transform: translateY(-3px);
    }

    /* Method cards in hero */
    .method-cards {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      max-width: 700px;
      margin: 0 auto;
    }

    .method-card {
      background: rgba(30, 41, 59, 0.6);
      border: 1px solid rgba(16, 185, 129, 0.12);
      border-radius: 14px;
      padding: 1.5rem 1rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .method-card:hover {
      border-color: rgba(16, 185, 129, 0.3);
      background: rgba(30, 41, 59, 0.8);
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .method-card .card-value {
      font-size: 1.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, var(--emerald-400), var(--teal-500));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.3rem;
    }

    .method-card .card-label {
      font-size: 0.75rem;
      color: var(--slate-400);
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-weight: 600;
    }

    /* Features Section */
    .section {
      padding: 6rem 0;
    }

    .section-label {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: var(--emerald-400);
      margin-bottom: 1rem;
    }

    .section-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: #f8fafc;
      margin-bottom: 0.75rem;
    }

    .section-desc {
      color: var(--slate-400);
      font-size: 1.05rem;
      max-width: 550px;
      margin: 0 auto 3rem;
    }

    .feature-card {
      background: rgba(30, 41, 59, 0.5);
      border: 1px solid rgba(51, 65, 85, 0.5);
      border-radius: 16px;
      padding: 2rem;
      height: 100%;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--emerald-500), var(--teal-500));
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .feature-card:hover {
      border-color: rgba(16, 185, 129, 0.2);
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
    }

    .feature-card:hover::before {
      opacity: 1;
    }

    .feature-icon-box {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
    }

    .feature-icon-box.green {
      background: rgba(16, 185, 129, 0.15);
      color: var(--emerald-400);
    }

    .feature-icon-box.teal {
      background: rgba(20, 184, 166, 0.15);
      color: var(--teal-500);
    }

    .feature-icon-box.blue {
      background: rgba(56, 189, 248, 0.15);
      color: #38bdf8;
    }

    .feature-card h4 {
      font-weight: 700;
      color: #f8fafc;
      margin-bottom: 0.75rem;
      font-size: 1.15rem;
    }

    .feature-card p {
      color: var(--slate-400);
      font-size: 0.95rem;
      line-height: 1.7;
      margin: 0;
    }

    /* Footer */
    footer {
      background: rgba(15, 23, 42, 0.95);
      border-top: 1px solid rgba(51, 65, 85, 0.5);
      color: var(--slate-400);
      padding: 2rem 0;
      text-align: center;
      margin-top: auto;
      font-size: 0.9rem;
    }

    footer a {
      color: var(--emerald-400);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    footer a:hover {
      color: var(--emerald-500);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Main content area */
    main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .method-cards {
        grid-template-columns: 1fr;
        max-width: 300px;
      }

      .hero-buttons {
        flex-direction: column;
        align-items: center;
      }

      .btn-primary-custom,
      .btn-outline-custom {
        width: 100%;
        max-width: 280px;
        justify-content: center;
      }

      .section-title {
        font-size: 2rem;
      }
    }

    @stack('styles')
  </style>
</head>

<body>

  <!-- Grid background -->
  <div class="grid-bg"></div>
  <div class="glow-orb glow-orb-1"></div>
  <div class="glow-orb glow-orb-2"></div>

  <div class="content-wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
          <span class="brand-icon"><i class="bi bi-mortarboard-fill"></i></span>
          SMA Negeri 1 Tanggetada
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">
                <i class="bi bi-house-door me-1"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-login" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Dynamic Content -->
    <main>
      {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
      <div class="container">
        <p class="mb-0">© {{ date('Y') }} SMA Negeri 1 Tanggetada. All rights reserved. | <a href="#">Privacy Policy</a>
        </p>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
</body>

</html>
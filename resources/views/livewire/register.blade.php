@push('styles')

    <style>
        .register-section {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 7rem 1rem 3rem;
        }

        .register-container {
            width: 100%;
            max-width: 520px;
            animation: fadeInUp 0.8s ease;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-icon {
            width: 76px;
            height: 76px;
            background: linear-gradient(135deg, #10b981, #14b8a6);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.25);
        }

        .register-icon i {
            font-size: 2.2rem;
            color: white;
        }

        .register-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #f8fafc;
        }

        .register-header p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .register-card {
            background: rgba(30, 41, 59, 0.7);
            border-radius: 20px;
            padding: 2.5rem;
            border: 1px solid rgba(51, 65, 85, 0.6);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .register-card .form-label {
            color: #cbd5e1;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.4rem;
        }

        .register-card .form-label i {
            color: #34d399;
        }

        .register-card .form-control {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(51, 65, 85, 0.8);
            border-radius: 10px;
            color: #f8fafc;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Outfit', sans-serif;
        }

        .register-card .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
            color: #f8fafc;
        }

        .register-card .form-control::placeholder {
            color: #64748b;
        }

        .register-card select.form-control option {
            background: #1e293b;
            color: #f8fafc;
        }

        .register-card .btn-register {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            border-radius: 10px;
            padding: 0.85rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            font-family: 'Outfit', sans-serif;
        }

        .register-card .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.35);
            color: white;
        }

        .register-card .login-link {
            text-align: center;
            color: #94a3b8;
            font-size: 0.95rem;
            margin-top: 1.25rem;
        }

        .register-card .login-link a {
            color: #34d399;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-card .login-link a:hover {
            color: #10b981;
        }

        .register-card .text-warning {
            color: #fbbf24 !important;
            font-size: 0.8rem;
        }

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

        @media (max-width: 576px) {
            .register-card {
                padding: 1.75rem;
            }

            .register-icon {
                width: 66px;
                height: 66px;
            }

            .register-icon i {
                font-size: 1.8rem;
            }
        }
    </style>

@endpush

<!-- Register Section -->
<section class="register-section">
    <div class="register-container">
        <!-- Header -->
        <div class="register-header">
            <div class="register-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <h2>Daftar Akun Siswa</h2>
            <p>Buat akun baru untuk mengakses sistem</p>
        </div>

        <!-- Card -->
        <div class="register-card">
            <form wire:submit.prevent="register">
                @csrf

                <!-- NISN -->
                <div class="mb-3">
                    <label for="nisn" class="form-label">
                        <i class="bi bi-credit-card-2-front me-1"></i> NISN
                    </label>
                    <input type="text" id="nisn" wire:model="nisn" class="form-control" placeholder="Masukkan NISN"
                        required>
                    @error('nisn') <small class="text-warning">{{ $message }}</small> @enderror
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">
                        <i class="bi bi-person-fill me-1"></i> Nama Lengkap
                    </label>
                    <input type="text" id="nama" wire:model="nama" class="form-control"
                        placeholder="Masukkan nama lengkap" required>
                    @error('nama') <small class="text-warning">{{ $message }}</small> @enderror
                </div>



                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-gender-ambiguous me-1"></i> Jenis Kelamin
                    </label>
                    <select id="jenis_kelamin" wire:model="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <small class="text-warning">{{ $message }}</small> @enderror
                </div>



                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">
                        <i class="bi bi-calendar-date-fill me-1"></i> Tanggal Lahir
                    </label>
                    <input type="date" id="tanggal_lahir" wire:model="tanggal_lahir" class="form-control" required>
                    @error('tanggal_lahir') <small class="text-warning">{{ $message }}</small> @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock-fill me-1"></i> Kata Sandi
                    </label>
                    <input type="password" id="password" wire:model="password" class="form-control"
                        placeholder="Masukkan kata sandi" required>
                    @error('password') <small class="text-warning">{{ $message }}</small> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">
                        <i class="bi bi-lock-fill me-1"></i> Konfirmasi Kata Sandi
                    </label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                        class="form-control" placeholder="Ulangi kata sandi" required>
                </div>

                <!-- Button -->
                <button type="submit" class="btn btn-register">
                    <i class="bi bi-person-plus-fill me-1"></i> Daftar
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a>
            </div>
        </div>
    </div>
</section>
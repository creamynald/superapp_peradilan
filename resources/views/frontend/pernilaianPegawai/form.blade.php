<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian - Pengadilan Agama Natuna</title>
    <style>
        :root {
            --pa-primary: #005921;
            --pa-secondary: #D4AF37;
            --pa-light: #f8f9fa;
            --pa-gray: #6c757d;
            --pa-white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--pa-light);
            color: #333;
            line-height: 1.6;
        }

        .header {
            background-color: var(--pa-primary);
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.2rem;
        }

        .header p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: var(--pa-white);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .notice-box {
            background-color: #fff8e1;
            border-left: 4px solid var(--pa-secondary);
            padding: 1.2rem;
            margin-bottom: 2rem;
            border-radius: 0 4px 4px 0;
            font-size: 0.95rem;
            color: #333;
            border: 1px solid #ffecb3;
        }

        .notice-box strong {
            color: var(--pa-primary);
        }

        .notice-box i {
            color: var(--pa-secondary);
            margin-right: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--pa-primary);
        }

        select, textarea, input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1rem;
        }

        select:focus, textarea:focus, input[type="text"]:focus {
            outline: none;
            border-color: var(--pa-secondary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background-color: var(--pa-primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #002244;
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--pa-gray);
            font-size: 0.9rem;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1rem;
        }

        .logo {
            width: 80px;
            height: auto;
            background: url('/images/logo-pa.png') no-repeat center;
            background-size: contain;
            border: 2px solid var(--pa-secondary);
            border-radius: 50%;
            margin: 0 auto;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            border: 1px solid #c3e6cb;
        }

        .small {
            font-size: 0.85rem;
            color: var(--pa-gray);
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Form Penilaian Pejabat</h1>
        <p>Pengadilan Agama Natuna</p>
    </div>

    <div class="container">
        <div class="logo-container">
            <div class="logo"></div>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- PEMBERITAHUAN ANONIMITAS & KERAHASIAAN -->
        <div class="notice-box">
            <strong>⚠️ PEMBERITAHUAN PENTING</strong><br>
            <i>🔒</i> Semua penilaian yang Anda berikan bersifat <strong>ANONIM</strong> dan <strong>RAHASIA</strong>.<br>
            <i>🔒</i> Identitas Anda <strong>TIDAK AKAN DITAMPILKAN</strong> kepada pejabat yang dinilai maupun pihak lain.<br>
            <i>🔒</i> Penilaian ini digunakan semata-mata untuk <strong>pengembangan kinerja organisasi</strong> dan <strong>peningkatan pelayanan publik</strong>.<br>
            <i>🔒</i> Kejujuran dan objektivitas Anda sangat kami hargai demi terwujudnya integritas dan akuntabilitas di lingkungan Pengadilan Agama Natuna.
        </div>

        <form action="{{ route('evaluasi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Pilih Pejabat/Atasan</label>
                <select name="employee_id" id="employee_id" required>
                    <option value="">-- Pilih Pejabat --</option>
                    @foreach($pegawaiList as $pegawai)
                        <option value="{{ $pegawai->id }}">{{ $pegawai->name }} ({{ $pegawai->jabatan ?? 'N/A' }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="isi_penilaian">Isi Penilaian</label>
                <textarea name="isi_penilaian" id="isi_penilaian" placeholder="Tuliskan penilaian Anda secara jujur, objektif, dan konstruktif..." required>{{ old('isi_penilaian') }}</textarea>
                <p class="small">* Silakan berikan contoh konkret jika memungkinkan, misalnya: "Sering memberikan arahan yang jelas dalam rapat" atau "Perlu peningkatan koordinasi dengan bagian hukum".</p>
            </div>

            <div class="form-group">
                <label for="periode_penilaian">Periode Penilaian</label>
                <input type="text" name="periode_penilaian" id="periode_penilaian" placeholder="" value="2025" readonly>
            </div>

            <button type="submit" class="btn-submit">Kirim Penilaian</button>
        </form>

        <div class="notice-box" style="margin-top: 2rem; background-color: #e8f5e9; border-left-color: #4caf50;">
            <i>📌</i> <strong>Anda tidak perlu login</strong> untuk mengisi formulir ini. Formulir ini dapat diakses oleh seluruh pegawai di lingkungan Pengadilan Agama Natuna.
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Pengadilan Agama Natuna. Hak Cipta Dilindungi. | SuperApp.
    </div>

</body>
</html>
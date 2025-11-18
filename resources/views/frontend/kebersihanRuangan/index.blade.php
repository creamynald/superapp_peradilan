<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Kebersihan - Pengadilan Agama Natuna</title>
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

        .info-box {
            background-color: #e8f5e9;
            border-left: 4px solid var(--pa-primary);
            padding: 1.2rem;
            margin-bottom: 2rem;
            border-radius: 0 4px 4px 0;
            font-size: 0.95rem;
            color: #333;
            border: 1px solid #c3e6cb;
        }

        .info-box strong {
            color: var(--pa-primary);
        }

        .info-box i {
            color: var(--pa-primary);
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

        input[type="file"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f8f9fa;
        }

        input[type="file"]:focus {
            outline: none;
            border-color: var(--pa-secondary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
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

        .status-completed {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            border: 1px solid #c3e6cb;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Upload Bukti Kebersihan</h1>
        <p>Pengadilan Agama Natuna</p>
    </div>

    <div class="container">
        <div class="logo-container">
            <div class="logo"></div>
        </div>

        @if(session('success'))
            <div class="success-message">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($checklist->is_completed)
            <div class="status-completed">
                ✅ Bukti sudah dikirim hari ini. Terima kasih!
            </div>
        @else
            <!-- Info Ruangan -->
            <div class="info-box">
                <i>🏠</i> <strong>Ruangan:</strong> {{ $ruangan->nama_ruangan }}<br>
                <i>👤</i> <strong>Petugas:</strong> {{ $ruangan->petugas->name }}<br>
                <i>📅</i> <strong>Tanggal:</strong> {{ now()->toDateString() }}
            </div>

            <form action="{{ route('kebersihan.submit', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="foto_bukti">Upload Foto Bukti Kebersihan</label>
                    <input type="file" name="foto_bukti" id="foto_bukti" accept="image/*" required>
                    <p class="small" style="font-size: 0.85rem; color: var(--pa-gray); margin-top: 0.5rem;">
                        * Silakan upload foto bukti kebersihan ruangan (format: JPG, PNG, maksimal 2MB)
                    </p>
                </div>
                <button type="submit" class="btn-submit">Kirim Bukti</button>
            </form>
        @endif
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Pengadilan Agama Natuna. Hak Cipta Dilindungi. | SuperApp.
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Berhasil Diposting!</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            padding: 40px 20px;
            color: #ffffff;
            text-align: center;
        }
        .header h1 {
            font-size: 24px;
            font-weight: 500;
            margin: 0;
        }
        .header img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .content {
            padding: 30px;
            color: #333333;
        }
        .content h2 {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 20px;
            line-height: 1.4;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .job-details {
            background-color: #f9f9f9;
            border-left: 4px solid #4CAF50;
            padding: 20px;
            margin-top: 25px;
            border-radius: 4px;
        }
        .job-details p {
            margin: 0;
            padding: 4px 0;
            font-size: 15px;
        }
        .job-details strong {
            color: #555555;
            display: inline-block;
            width: 100px; /* Optional: for alignment */
        }
        .link-button {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 25px;
            background-color: #4CAF50;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            text-align: center;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #999999;
        }
        .footer a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="background-color: #f4f4f4; padding: 30px 0;">
        <div class="container">
            <div class="header">
                {{-- <img src="{{ asset("logo/{{ $job->employer->logo }}") }}" alt="Logo Perusahaan" /> --}}
                <x-employer-logo :job="$job" />
                <h1>🎉 Lowongan Berhasil Diposting 🎉</h1>
            </div>
            <div class="content">
                <p>Halo,</p>
                <p>Lowongan kerja untuk posisi <strong>{{ $job->title }}</strong> telah berhasil dipublikasikan. Sekarang, para pencari kerja sudah bisa melihat dan melamar pekerjaan ini.</p>

                <div class="job-details">
                    <p><strong>Judul:</strong> <a href="{{ url('/jobs/' . $job->slug) }}" style="color: #4CAF50; text-decoration: none;">{{ $job->title }}</a></p>
                    <p><strong>Deskripsi:</strong> {{ $job->description }}</p>
                    <p><strong>Gaji:</strong> ${{ $job->salary }}</p>
                    <p><strong>Lokasi:</strong> {{ $job->location }}</p>
                    <p><strong>Jadwal:</strong> {{ $job->schedule }}</p>
                </div>

                <a href="{{ url('/jobs/' . $job->slug) }}" class="link-button" style="color: #ffffff; text-decoration: none;">Lihat Lowongan</a>
            </div>
            <div class="footer">
                <p>&copy; 2025 Pixel Positions. Hak Cipta Dilindungi.</p>
                <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
            </div>
        </div>
    </div>
</body>
</html>
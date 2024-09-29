<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjadwalan Mata Kuliah dan Ruangan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            color: white;
        }
        header h1, header h2, header h3 {
            margin: 5px;
        }
        .container {
            margin: 20px auto;
            padding: 0 20px;
            max-width: 1200px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .schedule-table {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            margin: 20px auto; /* Center the table */
        }
        .schedule-table th, .schedule-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .schedule-table th {
            background-color: #007bff;
            color: white;
        }
        .schedule-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .schedule-table tr:hover {
            background-color: #ddd;
        }
        footer {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .program-select {
            margin-bottom: 20px;
            text-align: center;
        }
        .program-select select {
            padding: 10px;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            display: block;
        }
        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            max-width: 200px;
        }
        .btn:hover {
            background-color: #218838;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            header {
                padding: 10px;
            }
            .schedule-table th, .schedule-table td {
                padding: 8px;
            }
            .btn {
                padding: 10px 15px;
                max-width: 150px;
            }
        }

        @media (max-width: 576px) {
            h1, h2 {
                font-size: 1.5rem;
            }
            .schedule-table th, .schedule-table td {
                font-size: 0.8rem;
                padding: 6px;
            }
            .btn {
                padding: 8px 12px;
                max-width: 120px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Sistem Penjadwalan Mata Kuliah dan Ruangan</h1>
    <h2>Program Studi Teknik Informatika dan Sistem Informasi</h2>
    <h3>Universitas Bengkulu</h3>
</header>

<div class="container">
    <div class="program-select">
        <label for="program">Pilih Program Studi:</label>
        <select id="program" name="program">
            <option value="informatika">Teknik Informatika</option>
            <option value="sistem-informasi">Sistem Informasi</option>
        </select>
    </div>

    <h2>Jadwal Kuliah</h2>
    <table class="schedule-table">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Ruangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Senin</td>
                <td>08:00 - 10:00</td>
                <td>Pemrograman Web</td>
                <td>Dr. Andi Supriyadi</td>
                <td>Lab Komputer 1</td>
            </tr>
            <tr>
                <td>Selasa</td>
                <td>10:00 - 12:00</td>
                <td>Sistem Basis Data</td>
                <td>Dr. Siti Aisyah</td>
                <td>Lab Komputer 2</td>
            </tr>
            <tr>
                <td>Rabu</td>
                <td>13:00 - 15:00</td>
                <td>Jaringan Komputer</td>
                <td>Dr. Budi Santoso</td>
                <td>Ruang Kuliah 101</td>
            </tr>
            <tr>
                <td>Kamis</td>
                <td>08:00 - 10:00</td>
                <td>Manajemen Proyek TI</td>
                <td>Dr. Hendra Saputra</td>
                <td>Ruang Kuliah 102</td>
            </tr>
            <tr>
                <td>Jumat</td>
                <td>14:00 - 16:00</td>
                <td>Keamanan Jaringan</td>
                <td>Dr. Putri Amelia</td>
                <td>Lab Komputer 3</td>
            </tr>
        </tbody>
    </table>

    <a href="#" class="btn">Cetak Jadwal</a>
</div>

<footer>
    <p>&copy; 2024 Universitas Bengkulu. Sistem Penjadwalan Mata Kuliah dan Ruangan</p>
</footer>

</body>
</html>

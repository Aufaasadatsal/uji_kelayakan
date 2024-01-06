<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>

    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 40px;
        background-color: #f0f0f0;
    }

    img {
        max-width: 100px;
        display: block;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .info-container {
        display: flex;
        justify-content: space-between;
    }

    .kanan,
    .kiri {
        width: 48%;
        padding: 20px;
    }

    .kanan p,
    .kiri p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .date {
        padding: 20px;
        text-align: end;
    }

    .kiri-2,
    .kanan-2,
    .content,
    .user,
    .hormat,
    .ttd {
        margin-top: 20px;
        padding: 20px;
    }

    .content pre {
        white-space: pre-wrap;
    }

    .user ol {
        padding-left: 20px;
    }

    .hormat p {
        text-align: end;
        font-weight: bold;
    }

    .ttd {
        text-align: right;
    }

    .form {
        width: 50%; /* Sesuaikan dengan lebar yang diinginkan */
        margin: 0 auto; /* Ini akan membuat formulir berada di tengah secara horizontal */
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .bungkus {
        display: flex;
        justify-content: space-between;
    }

    .kanan-2 {
        justify-content: end;
    }

    pre {
        font-size: 1rem;
    }

    </style>
</head>
<body>
    <div class="form">
    <img src="{{ asset('wk.png') }}" alt="Logo Wikrama">
    <h1>SMK WIKRAMA BOGOR</h1>
    
    <div class="bungkus">
    <div class="kanan">
    <p>Bisnis dan Manajemen</p>
        <p>Teknologi Informasi dan Komunikasi</p>
        <p>Pariwisata</p>
    </div>

    <div class="kiri">
        <p>Jl. Raya Wangun Kel. Sindangsari Bogor</p>
        <p>Telp/Faks: (0251)8242411</p>
        <p>e-mail: prohumasi@smkwikrama.sch.id</p>
        <p>website: www.skmikrama.sch.id</p>
    </div>
</div>
    <hr>

    <div class="date">
        17 Desember 2023
    </div>

    <div class="bungkus">
    <div class="kiri-2">
        <p>No : 220604-1/0002/SMK Wikrama/XII/2023</p>
        <p>Hal : Rapat Rutin</p>
    </div>

    <div class="kanan-2">
        <p>Kepada</p>
        <p>Yth. Bapak/Ibu Terlampir</p>
        <p>Di Tempat</p>
    </div>
    </div>
    <p>Dengan hormat, </p>
    <p>Bersama ini kami 
        mengundang Bapak/Ibu untuk mengikuti rapat yang akan dilaksanakan pada :</p>

    <div class="content">
        <pre>
    Hari, Tanggal : Rabu, 13 Desember 2023
    Pukul         : 14:00 WIB s.d. Selesai
    Tempat        : Ruang Kepala Sekolah
    Agenda        : Pengelolaan Laboratorium
    Notulis       : Dinda S.S.
        </pre>
    </div>

    <p>Demikian Undangan ini kami sampaikan, atas perhatian dan kerja sama Bapak/Ibu kami ucapkan terima kasih.</p>

    <div class="user">
        @foreach ($users as $user)
        <ol>
            <li>
                {{ $user->name }}
            </li>
        </ol>
        @endforeach
    </div>

    <div class="hormat">
        <p>Hormat Kami</p>
        <p>Kepala SMK Wikrama Bogor</p>
    </div>

    <div class="ttd">
        (....................)
    </div>
</div>
</body>
</html>
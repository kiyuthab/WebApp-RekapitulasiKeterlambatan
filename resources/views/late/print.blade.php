<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .page-break {
            page-break-after: always;
        }
        .address {
            margin-bottom: 15px;
        }

        .custom-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        
        .container{
            background: #fff; 
            padding: 20px; 
            border-radius: 10px;
            width: 130vh;
            box-shadow: #000;
        }
        h3{
            font-size: 19px;
        }
    </style>
</head>
<body>
    <div class="container custom-container">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('late.rekap') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('late.download', $lates['id']) }}" class="btn btn-primary">Download</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <br><br>
                <h3>SURAT PERNYATAAN</h3>
                <h3>TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h3>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-12">
                <p>Yang bertanda tangan dibawah ini:</p>
                    <P>NIS : </P>
                    <P>Nama :</P>
                    <P>Rombel :</P>
                    <P>Rayon :</P>
                    <!-- Tambahkan sesuai dengan jumlah pegawai yang ditugaskan -->
                <br><br>
                <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak <b>3 kali</b> yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang kesekolah lagi. Apabila saya terlambat datang kesekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
                <br><br>
                <p>Dengan demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
            </div>
        </div>

        <br><br><br>

        <div class="row">
            <div class="col-6 text-center">
                <br><br>
                <p>Peserta Didik,</p>
                <br><br><br><br>
                <p>()</p>
            </div>
            <div class="col-6 text-center">
                <p>Bogor, {{ date('d F Y') }} </p>
                <p>Orang Tua/Wali Peserta Didik,</p>
                <br><br><br><br>
                <p>(______________________)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 text-center">
                <br><br>
                <p>Pembimbing Siswa,</p>
                <br><br><br><br>
                <p>()</p>
            </div>
            <div class="col-6 text-center">
                <br><br>
                <p>Kesiswaan,</p>
                <br><br><br><br>
                <p>(______________________)</p>
            </div>
        </div>
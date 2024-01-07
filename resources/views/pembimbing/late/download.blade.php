<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan</title>
    <style>
        body {
            margin: 20px 40px;
        }

        .card{
            padding: 2px;
            width: 18rem;
            float: left;
            margin-top: 9px; 
            text-align: center;
        }


        .card2{
            padding: 2px;
            width: 18rem;
            float: right;
            text-align: center;
            padding-right: 50px;
        }

        .info {
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
            padding: 5px;
        }

        .infoo {
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
            padding: 5px;
            width: 50px;
            padding-right: 200px;
        }

        .info2{
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
            padding: 5px;
            width: 50px;
            float: right;
        }

        .date p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            padding: 0;
            text-align: right;
            margin-right: 50px;
        }

        .sign {
            float: right;
            margin-right: 50px;
            text-align: center;
        }

        .tandatangan {
            float: right;
            margin-right: 100px;
            text-align: center;
        }

        .ttd{
            margin-left: 50px;
        }
    </style>

</head>

<body>
    <div id="letter">
        <center>
            <div class="info">
                <h3>SURAT PERNYATAAN</h3>
                <h3>TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h3>
            </div>
        </center>
        <div class="mid">
            <div class="info">
                <br>
                <p>Yang bertanda tangan dibawah ini:</p>

                <table>
                    <tr>
                      <td>NIS</td>
                      <td>:</td>
                      <td>{{ $student['nis'] }} </td>
                    </tr>
                    <tr>
                      <td>Nama </td>
                      <td>:</td>
                      <td>{{ $student['name']}}</td>
                    </tr>
                    <tr>
                      <td>Rombel</td>
                      <td>:</td>
                      <td> {{ $rombel['rombel']}}</td>
                    </tr>
                    <tr>
                        <td>Rayon </td>
                        <td>:</td>
                        <td>{{ $rayon['rayon']}}</td>
                    </tr>
                  </table>

                <br>
                <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat
                    datang ke sekolah sebanyak <strong>3 Kali</strong> yang mana hal tersebut termasuk kedalam
                    pelanggaran kedisiplinan.
                    Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah
                    lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
                <br>
                <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
            </div>
        </div>
        <div class="bot">
            <div class="date">
                <p>Bogor, <?php echo strftime(" %d %B %Y"); ?></p>
            </div>
            <div class="infoo">
                <div class="card">
                    <div class="ttd">
                        <p>Peserta Didik,</p>
                        <br> <br> <br>
                        <p>( {{ $student['name'] }} )</p>
                    </div>
                    <br>
                    <div class="ttd">
                        <p>Pembimbing Siswa,</p>
                        <br> <br> <br>
                        <p >( {{ $ps['name'] }} )</p>
                    </div><br>
                </div>
            </div>
            <div class="info2">
                <div class="card2">
                    <div class="ttd">
                        <p>Orang Tua/Wali Peserta,</p>
                        <br> <br> <br>
                        <p>( ............. )</p>
                    </div>
                    <br>
                    <div class="ttd">
                        <p>Kesiswaan,</p>
                        <br> <br> <br>
                        <p>( ............. )</p>
                    </div><br>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</body>

</html>
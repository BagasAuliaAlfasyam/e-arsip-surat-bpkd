<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Surat Masuk</title>
</head>

<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td valign="top">
                                    <div align="center">
                                        <span style="font-size: x-small;">&emsp;&emsp;&emsp;&emsp;<img src="/admin/assets/img/logo-bpkd.png"
                                                style="max-width: 7rem;" alt="Gambar iahn"></span>
                                    </div>
                                </td>
                                <td>
                                    <table border="0" cellpadding="1" style="width: 500px;text-align: center;">
                                        <tbody>
                                            <tr>
                                                <td width="100%"><span style="font-size: x-small;">
                                                        <h5>PEMERINTAH KOTA LHOKSEUMAWE <br><strong>BADAN PENGELOLAAN KEUANGAN DAERAH</strong></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%">
                                                    <p class="mb-0" style="font-size: .8rem; font-family: 'Times New Roman', Times, serif">Jalan Muhammad Malikul Zahir No. 145 Lhokseumawe Kode Pos 24351 <br>
                                                         Telepon (0645) 46997, Faksimili (0645) 41991,<br>
                                                         Website: www.bgkd.lhokseumawekota.go.id, E-mail : bkpd@lhokseumawe.go.id</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="border border-dark border-1 opacity-100 mb-0">
                    <hr class="border border-dark border-2 opacity-100" style="margin-top: .1rem"> <br>
                    <div class="bg-warning">
                        <h5 class="text-center mb-3">Laporan Surat Masuk</h5>
                    </div>
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <th style="text-align: center;font-size: small;">No.</th>
                            <th style="text-align: center;font-size: small;">No.Surat</th>
                            <th style="text-align: center;font-size: small;">No.Agenda</th>
                            <th style="text-align: center;font-size: small;">Pengirim</th>
                            <th style="text-align: center;font-size: small;">Perihal</th>
                            <th style="text-align: center;font-size: small;">Tanggal Surat</th>
                            <th style="text-align: center;font-size: small;">Diterima</th>
                            <th style="text-align: center;font-size: small;">Disposisi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($item as $letter)
                                <tr>
                                    <td style="text-align: center;font-size: small;">{{ $no++ }}</td>
                                    <td style="text-align: center;font-size: small;">{{ $letter->letter_no }}</td>
                                    <td style="text-align: center;font-size: small;">{{ $letter->agenda_no }}</td>
                                    <td style="text-align: center;font-size: small;">{{ $letter->sender->name }}</td>
                                    <td style="text-align: center;font-size: small;">{{ $letter->regarding }}</td>
                                    <td style="text-align: center;font-size: small;">
                                        {{ Carbon\Carbon::parse($letter->letter_date)->translatedFormat('l, d F Y') }}</td>
                                    <td style="text-align: center;font-size: small;">
                                        {{ Carbon\Carbon::parse($letter->date_received)->translatedFormat('l, d F Y') }}</td>
                                    <td style="text-align: center;font-size: small;">{{ $letter->disposisi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

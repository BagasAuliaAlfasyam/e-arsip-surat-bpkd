<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    span {
      font-size: x-small;
      font-family: Verdana;
    }
  </style>

  <title>Print Disposisi</title>
</head>

<body>
  <table align="center" border="0" cellpadding="1" style="width: 700px;" class="table-bordered">
    <tbody>
      <tr style="border-width: 0">
        <td style="border-width: 0">
          <table class="border-0" width="100%">
            <tbody>
              <tr style="border: 0 solid transparent !important">
                <td valign="top">
                  <div align="center">
                    <span>&emsp;&emsp;&emsp;&emsp;<img src="/admin/assets/img/logo-bpkd.png" style="max-width: 7rem;"
                        alt="Logo Badan pengolahan Keuangan Daerah"></span>
                  </div>
                </td>
                <td>
                  <table class="text-center">
                    <tbody>
                      <tr>
                        <td width="100%"><span>
                            <h5>PEMERINTAH KOTA LHOKSEUMAWE <br><strong>BADAN PENGELOLAAN KEUANGAN DAERAH</strong></h5>
                        </td>
                      </tr>
                      <tr>
                        <td width="100%">
                          <p class="mb-0" style="font-size: .8rem; font-family: 'Times New Roman', Times, serif">Jalan
                            Muhammad Malikul Zahir No. 145 Lhokseumawe Kode Pos 24351 <br>
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
          <hr class="border border-dark border-2 opacity-100 mb-0" style="margin-top: .1rem"><br>
        </td>
      </tr>

      <tr>
        <td>
          <div align="center">
            <span><b>LEMBAR DISPOSISI</b></span>
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="row">

            <div class="col-6 ps-4">
              <span>Surat dari &emsp;&emsp;&emsp;&emsp;&emsp;: {{ $item->agency->name }}</span>
            </div>

            <div class="col-6">
              <span>Nomor Surat &emsp;&emsp;&emsp;&emsp; : {{ $item->letter->letter_no }}</span>
            </div>

          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="row">

            <div class="col-6 ps-4">
              <span>Tanggal Surat &emsp;&emsp;&emsp;: {{ Carbon\Carbon::parse($item->letter_date)->translatedFormat('l, d F Y') }}</span>
            </div>

            <div class="col-6">
              <span>Nomor Agenda &emsp;&emsp;&emsp; : {{ $item->no_agenda }}</span>
            </div>

          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="row">

            <div class="col-6 ps-4">
              <span>Diterima Tanggal &emsp; : {{ Carbon\Carbon::parse($item->tgl_diterima)->translatedFormat('l, d F Y') }}</span>
            </div>

            <div class="col-6">
              <span>Tanggal Penyelesaian : {{ Carbon\Carbon::parse($item->tgl_penyelesaian)->translatedFormat('l, d F Y') }}</span>
            </div>

          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="row">
            <div class="col ps-4"><span>Hal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $item->hal }}</span></div>
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="row">
            <div class="col-6 ps-4">
              <span><strong>Diteruskan kepada</strong></span>
            </div>

            <div class="col-6 text-center">
              <span><strong>Instruksi/informasi</strong></span>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td valign="top" class="p-0">
          <div class="row">
            <div class="col-6 ps-4" style="border-inline-end: 2px solid #000; height: 50vh;">
              <span><strong>{{ $item->diteruskan_kpd }}</strong></span>
            </div>

            <div class="col-6">
              <span>{{ $item->instruksi }}</span>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

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

@extends('layouts.admin')

@section('title')
  Tambah Surat Disposisi
@endsection

@section('container')
  <main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
      <div class="container-fluid px-4">
        <div class="page-header-content">
          <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                Tambah Surat Disposisi
              </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
              <a class="btn btn-sm btn-light text-primary" href="{{ route('surat-disposisi') }}">
                <i class="me-1" data-feather="arrow-left"></i>
                Kembali ke Semua Surat Disposisi
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row gx-4">
          <div class="col-lg-9">
            <div class="card mb-4">
              <div class="card-header">Form Disposisi <span style="color: green;"> * Harus diisi</span></div>
              <div class="card-body">
                <div class="mb-3 row">
                  <label for="letter_id" class="col-sm-3 col-form-label">No. Surat Disposisi</label>
                  <div class="col-sm-9">
                    <select name="letter_id" class="form-control " required>
                      <option value="">Pilih Surat Yang Akan di Disposisi...</option>
                      @foreach ($letters as $letter)
                        <option value="{{ $letter->id }}">{{ $letter->letter_no }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('letter_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="agency_id" class="col-sm-3 col-form-label">Surat Dari</label>
                  <div class="col-sm-9">
                    <select name="agency_id" class="form-control" required>
                      <option value="">Pilih Instansi...</option>
                      @foreach ($agencies as $agency)
                        <option value="{{ $agency->id }}" {{ old('agency_id') == $agency->id ? 'selected' : '' }}>
                          {{ $agency->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('agency_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" value="{{ old('tgl_surat') }}"
                      name="tgl_surat">
                  </div>
                  @error('tgl_surat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="no_agenda" class="col-sm-3 col-form-label">No Agenda</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control @error('no_agenda') is-invalid @enderror" value="{{ old('no_agenda') }}" name="no_agenda"
                      placeholder="No Agenda.." required>
                  </div>
                  @error('no_agenda')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="tgl_diterima" class="col-sm-3 col-form-label">Tanggal Diterima</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control @error('tgl_diterima') is-invalid @enderror" value="{{ old('tgl_diterima') }}"
                      name="tgl_diterima">
                  </div>
                  @error('tgl_diterima')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="tgl_penyelesaian" class="col-sm-3 col-form-label">Tanggal Penyelesaian</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control @error('tgl_penyelesaian') is-invalid @enderror" value="{{ old('tgl_penyelesaian') }}"
                      name="tgl_penyelesaian">
                  </div>
                  @error('tgl_penyelesaian')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="hal" class="col-sm-3 col-form-label">Hal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control @error('hal') is-invalid @enderror" value="{{ old('hal') }}" name="hal"
                      placeholder="Hal.." required>
                  </div>
                  @error('hal')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="diteruskan_kpd" class="col-sm-3 col-form-label">Di Teruskan Kepada</label>
                  <div class="col-sm-9 row" style="float: right;">
                    <div class="col-sm-12">
                      <input type="checkbox" value="Sekretaris" name="diteruskan_kpd[]"> Sekretaris <br>
                      <input type="checkbox" value="Kabid Anggaran" name="diteruskan_kpd[]"> Kabid Anggaran <br>
                      <input type="checkbox" value="Kabid Pendataan Penetapan Dan Pelayanan" name="diteruskan_kpd[]"> Kabid
                      Pendataan Penetapan Dan Pelayanan<br>
                      <input type="checkbox" value="Kabid Penagihan Dan Keberatan" name="diteruskan_kpd[]"> Kabid Penagihan
                      Dan Keberatan <br>
                      <input type="checkbox" value="Kabid Perbendaharaan" name="diteruskan_kpd[]"> Kabid Perbendaharaan
                      <br>
                      <input type="checkbox" value="Kabid Pengelolaan Aset" name="diteruskan_kpd[]"> Kabid Pengelolaan Aset
                      <br>
                      <input class="mb-4" type="checkbox" value="Kabid Akuntansi" name="diteruskan_kpd[]"> Kabid
                      Akuntansi <br>
                      <input type="checkbox" value="Semua Kasubag" name="diteruskan_kpd[]"> Semua Kasubag <br>
                      <input type="checkbox" value="Kasubag Bina Program" name="diteruskan_kpd[]"> Kasubag Bina Program
                      <br>
                      <input type="checkbox" value="Kasubag Umum Dan Kepegawaian" name="diteruskan_kpd[]"> Kasubag Umum Dan
                      Kepegawaian <br>
                      <input type="checkbox" value="Kasubag Keuangan" name="diteruskan_kpd[]"> Kasubag Keuangan <br>
                      <input type="checkbox" value="-" name="diteruskan_kpd[]"> -
                    </div>
                  </div>
                  @error('diteruskan_kpd')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="instruksi" class="col-sm-3 col-form-label">Instruksi/Informan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control @error('instruksi') is-invalid @enderror" value="{{ old('instruksi') }}"
                      name="instruksi" placeholder="Instruksi.." required>
                  </div>
                  @error('instruksi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection

@push('addon-style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(".selectx").select2({
      theme: "bootstrap-5"
    });
  </script>
@endpush

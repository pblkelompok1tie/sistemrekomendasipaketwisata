  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-box"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Detail Paket Wisata</h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('c_detail_paket_wisata/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Nama Paket Wisata</label>
                      <select class="form-control" name="id_paket_wisata">
                          <option value="">--Pilih Nama Paket Wisata--</option>
                          <?php foreach ($paket_wisata as $p) : ?>
                              <option value="<?php echo $p['id_paket_wisata']; ?>"><?php echo $p['nama_paket_wisata']; ?></option>
                          <?php endforeach ?>
                          <?= form_error('id_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Nama Destinasi</label>
                      <select class="form-control selectpicker" multiple data-live-search="true" name="id_destinasi_tujuan[]">
                          <option value="">--Pilih Nama Destinasi--</option>
                          <?php foreach ($destinasi_tujuan as $d) : ?>
                              <option value="<?php echo $d['id_destinasi_tujuan']; ?>"><?php echo $d['nama_destinasi_tujuan']; ?></option>
                          <?php endforeach ?>
                          <?= form_error('id_destinasi_tujuan[]', '<small class="text-danger">', '</small>'); ?>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="<?php echo base_url() . 'c_paket_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
              </form>

          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
  <script>
      var resizefunc = [];
  </script>
  <!-- Multipe Insert Field -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
  <script>
      $(function() {
          $('select').selectpicker();
      });
  </script>
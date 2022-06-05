        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-utensils"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Tempat Makan</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_tempat_makan/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_tempat_makan">Nama Tempat Makan</label>
                            <input type="text" class="form-control" id="nama_tempat_makan" name="nama_tempat_makan"  placeholder="Contoh : Rumah Makan Padang Bundo">
                            <?= form_error('nama_tempat_makan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tempat_makan">Alamat</label>
                            <input type="text" class="form-control" id="alamat_tempat_makan" name="alamat_tempat_makan"  placeholder="Contoh : Jalan Mangga No.3, Madiun, Jawa Timur">
                            <?= form_error('alamat_tempat_makan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="menu_favorite">Menu Favorite</label>
                            <input type="text" class="form-control" id="menu_favorite" name="menu_favorite"  placeholder="Contoh : ayam pop, gulai ayam, jus jambu, rendang">
                            <?= form_error('menu_favorite', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_tempat_makan" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?php echo base_url() . 'c_tempat_makan/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- panggil jquery -->
        <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

        <!-- panggil ckeditor.js -->
        <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- panggil adapter jquery ckeditor -->
        <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>
        <!-- setup selector -->
        <script>
            $('textarea.texteditor').ckeditor();
        </script>
        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>
        <!-- Protect jika ada yang upload ukuran foto terlalu besar -->
        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 2000000) {
                    alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
                    this.value = "";
                };
            };
        </script>
        
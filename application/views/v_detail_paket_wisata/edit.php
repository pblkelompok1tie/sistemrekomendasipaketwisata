        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-mountain"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Detail Paket Wisata</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_detail_paket_wisata_tujuan/edit_data/'); ?><?= $detail_paket_wisata['id_detail_paket_wisata']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_detail_paket_wisata" id="id_detail_paket_wisata" value="<?php echo $detail_paket_wisata['id_detail_paket_wisata']; ?>" />
                        <div class="form-group">
                            <label>ID Paket Wisata</label>
                            <select class="form-control selectpicker" multiple data-live-search="true" name="id_paket_wisata" required>
                                <?php foreach ($paket_wisata as $dk) : ?>
                                    <option value="<?php echo  $dk['id_paket_wisata']; ?>"><?php echo $dk['nama_paket_wisata']; ?></option>
                                <?php endforeach ?>
                                <?= form_error('id_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Destinasi Tujuan</label>
                            <select class="form-control selectpicker" multiple data-live-search="true" name="id_destinasi_tujuan[]" required>
                                <?php foreach ($destinasi_tujuan as $dk) : ?>
                                    <option value="<?php echo  $dk['id_destinasi_tujuan']; ?>"><?php echo $dk['nama_destinasi_tujuan']; ?></option>
                                <?php endforeach ?>
                                <?= form_error('id_destinasi_tujuan[]', '<small class="text-danger">', '</small>'); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_detail_paket_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("fas fa-eye-slash");
                        $('#show_hide_password i').removeClass("fas fa-eye");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("fas fa-eye-slash");
                        $('#show_hide_password i').addClass("fas fa-eye");
                    }
                });
            });
        </script>
        <!-- Multipe Edit Field -->
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
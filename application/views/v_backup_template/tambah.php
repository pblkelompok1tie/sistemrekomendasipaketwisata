        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i>  <?= $title; ?></h1>
           


                 <!-- Basic Card Example -->
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Tambah Berita Baru</h6>
                    </div>
                    <div class="card-body">
                   
                    <form action="<?php base_url('berita/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="tanggal" value="<?= date("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="user" value="ilmuweb@gmail.com">

                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?= set_value('judul'); ?>">
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                    <?php
                    $data = array(
                        'name' => 'isi',
                        'id' => 'isi',
                        'value' => set_value('isi')
                    );
                    ?>
                    <label for="isi_berita">Isi Berita</label>
                    <textarea name="isi" class="texteditor"><?= $data['value']; ?></textarea>
                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    
                        <label for="status">Status</label>
                        <select name="status" class="custom-select">
                            <option value="" selected>Select :</option>
                            <option value="draff">Draff</option>
                            <option value="publish">Publish</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>                  
                        <br>
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="custom-select">
                            <option value="" selected>Select :</option>                           
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Teknologi">Teknologi</option>                            
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="gambar">Plih Gambar (maksimal ukuran gambar 1Mb)</label>
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="gambar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
            
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" name="upload"><i class="fas fa-check-circle"></i> Submit</button>               
                
                
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

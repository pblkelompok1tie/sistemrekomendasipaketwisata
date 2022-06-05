        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i>  <?= $title; ?></h1>
           


                 <!-- Basic Card Example -->
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Edit Berita Baru</h6>
                    </div>
                    <div class="card-body">
                   
                    <form action="<?php base_url('berita/edit/'); ?><?= $berita['id'];?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $berita['id'];?>">
                    <input type="hidden" name="tanggal" value="<?= $berita['tanggal'];?>">
                    <input type="hidden" name="user" value="<?= $berita['user'];?>">

                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?= $berita['judul']; ?>">
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">                   
                    <label for="isi_berita">Isi Berita</label>
                    <textarea name="isi" class="texteditor"><?= $berita['isi']; ?></textarea>
                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <label for="status">Status</label>
                        <select name="status" class="custom-select">
                            <option value="" selected>Select :</option>
                            <?php foreach($status as $st ) : ?>
                            <?php if($st == $berita['status']): ?>
                            <option value="<?= $st; ?>" selected><?= $st; ?></option>
                            <?php else : ?>
                            <option value="<?= $st; ?>"><?= $st; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>                  
                        <br>
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="custom-select">
                            <option value="" selected>Select :</option>    
                            <?php foreach($kategori as $kat) : ?>     
                            <?php if($kat == $berita['kategori']): ?>                  
                            <option value="<?= $kat; ?>" selected><?= $kat; ?></option>
                            <?php else : ?>
                            <option value="<?= $kat; ?>"><?= $kat; ?></option>
                            <?php endif; ?>   
                            <?php endforeach; ?>                         
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                   <div class="form-row mt-2">
                         <div class="col-md-6">
                             <img src="<?= base_url('assets/img/berita/'); ?><?= $berita['gambar']; ?>" class="img-thumbnail" width="510px"><br>
                        </div>
                   </div>

                   
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="image">Plih Gambar (maksimal ukuran gambar 1Mb)</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" name="update"><i class="fas fa-edit"></i> Update</button>               
                
                
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

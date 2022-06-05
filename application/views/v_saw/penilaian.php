 <div class="container-fluid">
   <!-- tempat kriteria -->
   <div class="tab-pane" id="nilai">
     <?php if ($this->session->flashdata('message')) : ?>
       <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
         <strong>penilaian</strong> <?= $this->session->flashdata('message'); ?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
     <?php endif; ?>
     <form method="post" action="<?= base_url() . 'c_penilaian/tambah_aksi'; ?>">
       <div class="form-group">
         <label>Nama Paket Wisata</label>
         <select name="id_paket_wisata" id="id_paket_wisata" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih Nama Paket wisata dahulu!')" oninput="setCustomValidity('')">
           <option value="">Pilih Nama Paket Wisata</option>
           <?php foreach ($paket_wisata as $pkt) : ?>
             <option value="<?= $pkt['id_paket_wisata']; ?>">[<?= $pkt['nama_paket_wisata']; ?>]-<?= $pkt['nama_paket_wisata']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Durasi(C1)</label>
         <select name="C1" id="C1" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih kriteria dahulu')" oninput="setCustomValidity('')">
           <option value="">Pilih SubKriteria C1</option>
           <?php foreach ($durasi as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Usia(C2)</label>
         <select name="C2" id="C2" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih kriteria dahulu')" oninput="setCustomValidity('')">>
           <option value="">Pilih SubKriteria C2</option>
           <?php foreach ($usia as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Harga Paket(C3)</label>
         <select name="C3" id="C3" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih kriteria dahulu')" oninput="setCustomValidity('')">>
           <option value="">Pilih SubKriteria C3</option>
           <?php foreach ($harga_paket as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <button type="submit" class="btn btn-primary float-right">Simpan</button>
     </form>
     <br><br>
     <hr><br>
     <div class="table-responsive">
       <table id="data" class="table table-bordered table-hover">
         <thead class="table-success">
           <tr>
             <th>No</th>
             <th>Nama Paket Wisata</th>
             <th>Durasi(C1)</th>
             <th>Usia(C2)</th>
             <th>Harga Paket(C3)</th>
             <th style="width: 15%">Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php
            $no = 1;
            foreach ($nilai as $n) : ?>
             <tr>
               <td width="20px"><?= $no++; ?></td>
               <td><?= $n->nm_ag; ?></td>
               <td><?= $n->nm_sub; ?></td><!-- C1 -->
               <td><?= $n->sub; ?></td><!-- C2 -->
               <td><?= $n->nmsub; ?></td><!-- C3 -->
               <td class="text-center">
                 <a href="<?= base_url(); ?>c_penilaian/edit/<?= $n->id_nilai; ?>" class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Ubah</a>
                 <!-- <a href="<?= base_url(); ?>c_penilaian/hapus/<?= $n->id_nilai; ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin?');"><i class="fa fa-trash"></i> Hapus</a> -->
               </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>

 </div>
 <br>
 <br>
 <br>
 <br>
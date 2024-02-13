<?php
include "header.php";
include "sidebar.php";
?>
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                    <h1 class="m-0"><b>Data Member</h1></b>
                </div>
                <div class="card mt-2">
                <div class="card-body">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i>
      Tambah Data
</button>
</div>
<div class="card-body">
              <?php 
              if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){
                echo '<script>
                  alert("Data Berhasil Di Simpan");
                </script> ';
                }
                }
              ?>
              <?php 
              if(isset($_GET['pesan'])){
                if($_GET['pesan']=="update"){
                echo '<script>
                  alert("Data Berhasil Di Edit");
                </script> ';
                }
              }
              ?>
  <table class="table">
    <table class="table table-bordered table-striped table-sm mt-3">
        <thead class="thead-primary">
        <tr class="table-primary" class="fw-bold" align="center">
      <th>No</th> 
      <th>Nik</th>
      <th>Nama Member</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Nomor Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi,"select * from member");
    while($d = mysqli_fetch_array($data)){
      ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $d['nik']; ?></td>
      <td><?php echo $d['nama']; ?></td>
      <td><?php echo $d['jeniskelamin']; ?></td>
      <td><?php echo $d['alamat']; ?></td>
      <td><?php echo $d['nomortelepon']; ?></td>
      <td>
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['nik']; ?>"><i class="fas fa-edit"></i>
      Edit
      </button>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['nik']; ?>"><i class="fas fa-trash-alt"></i>
      Hapus
      </button>
      </td>
    </tr>

    <!-- Modal Edit Data -->
<div class="modal fade" id="edit-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_update_member.php" method="post">
      <div class="modal-body">
            <div class="form-group">
            <label>Nama Member</label>
            <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>" autocomplete="off">
            <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenkel" class="form-control" value="<?php echo $d['jenkel']; ?>" autocomplete="off">
              <option>---Pilih Jenis Kelamin---</option>
              <option value="1">Laki-Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?php echo $d['telp']; ?>" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
</form>
  </div>
</div>

    <!-- Modal Hapus Data -->
<div class="modal fade" id="hapus-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="proses_hapus_member.php">
          <div class="modal-body">
            <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
            Apakah anda yakin akan menghapus data <b><?php echo $d['nama']; ?></b>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
  </tbody>
</table>
</div>
</div>
  </div>
</div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_simpan_member.php" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label>Nik</label>
            <input type="text" name="nik" class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Nama Member</label>
            <input type="text" name="nama" class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenkel" class="form-control">
              <option>---Pilih Jenis Kelamin---</option>
              <option value="1">Laki-Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="telp" class="form-control" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
  </table>
</div>
</div>
 <?php
include "footer.php";
?>
    <div class="container rounded-4 p-5 mt-3">
      <div class="row">
          <?= Flasher::flash() ?>
      </div>
        <div class="row">
          <div class="col-lg-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" autocomplete="off">
                <button class="btn btn-primary" type="submit" id="button-addon2" name="cari">Cari</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary mb-5 tombolTambahData" data-bs-toggle="modal" data-bs-target="#modalForm">
                Tambah Mahasiswa
            </button>
          </div>
        </div>
        <div class="row bg-light rounded-4">
                <h2>Daftar Mahasiswa</h2>
                    <table class="table border">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $number = 1;  ?>
                        <?php foreach($data['mahasiswa'] as $mhs) : ?>
                        <tr>
                        <th scope="row"><?= $number ?></th>
                        <td><?= $mhs['nama'] ?></td>
                        <td>
                          <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs["id"]  ?>" class="badge text-bg-primary text-decoration-none">Detail</a>
                          <a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs["id"]  ?>" class="badge text-bg-warning text-decoration-none tampilModalUbah"
                           data-bs-toggle="modal" data-bs-target="#modalForm" data-id='<?= $mhs['id'] ?>'>Edit</a>
                        </td>
                        <?php $number++ ?>
                        </tr>
                        <?php endforeach ; ?>
                    </tbody>
                    </table>
        </div>
    </div>




<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalJudul" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalJudulLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="jurusan">Pilihan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                    <option selected>pilih</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                    <option value="Teknik Pangan">Teknik Pangan</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah-mahasiswa">Tambah Mahasiswa</button>
      </div>
      </form>
    </div>
  </div>
</div>
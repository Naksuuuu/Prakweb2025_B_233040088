    <div class="container bg-warning rounded-4 p-5 mt-3">
                <?php $mhs = $data['mahasiswa'] ?>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $mhs['nama'] ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $mhs['nrp'] ?></h6>
                <p class="card-text"><?= $mhs['jurusan'] ?></p>
                <p class="card-text"><?= $mhs['email'] ?></p>
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <div class="">
                            <a href="<?= BASEURL ?>/mahasiswa" class="badge text-bg-primary text-decoration-none">kembali</a>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-center ">
                        <form action="<?= BASEURL ?>/mahasiswa/hapus" method="post">
                            <input type="hidden" value="<?= $mhs['id'] ?>" name="id">
                            <button type="submit" class="btn btn-danger" name="tambah-mahasiswa">Hapus Mahasiswa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
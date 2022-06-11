<?= $this->extend('layout/template_posting'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row my-5 d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card p-3">
      <h3 class="text-center">Edit Posting</h3>
      <form action="/posttype/update" method="post">
      <?= csrf_field() ?>

        <div class="form-floating mb-3">
            <input class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" type="text" value="<?= $post_type['jenis'] ?>" required />
            <div class="invalid-feedback">
                <?= $validation->getError('jenis'); ?>
            </div>
            <label for="inputJenis">Jenis</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" id="type" name="type" type="text" value="<?= $post_type['type'] ?>" required />
            <div class="invalid-feedback">
                <?= $validation->getError('type'); ?>
            </div>
            <label for="inputType">Type</label>
        </div>
        <input type="hidden" name="id_post_type" value="<?= $post_type['id_post_type'] ?>">
        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>
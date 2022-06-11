<?= $this->extend('layout/template_posting'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row my-5 d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card p-3">
      <h3 class="text-center">Create Posting</h3>
      <form action="/posting/save" method="post">
      <?= csrf_field() ?>

        <div class="form-floating mb-3">
            <select class="form-select" name="post_type" id="post_type">
            <option value="">Choose Post Type</option>
                <?php foreach ($post_type as $post_type) { ?>
                    <option value="<?= $post_type['id_post_type'] ?>"><?= $post_type['jenis'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" type="text" value="<?= old('title') ?>" required />
            <div class="invalid-feedback">
                <?= $validation->getError('title'); ?>
            </div>
            <label for="inputTitle">Title</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id="description" name="description" required ><?= old('description') ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('description'); ?>
            </div>
            <label for="inputDescription">Description</label>
        </div>
        <input type="hidden" name="user" value="<?= $user['id'] ?>">
        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>
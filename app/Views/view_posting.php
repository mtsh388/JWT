<?= $this->extend('layout/template_posting'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row my-3">
    <h3>View Posting <button class="btn btn-secondary btn-sm" onclick="history.back()">Go Back</button></h1>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $posting['fullname'] ?></h5>
                <h6 class="card-subtitle mb-2"><?= $posting['title'] ?></h6>
                <p class="card-text"><?= $posting['description'] ?></p>
            </div>
        </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>
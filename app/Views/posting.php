<?= $this->extend('layout/template_posting'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row my-3">
    <h3>Create Posting <a href="/posting/create"><i class="bi bi-plus-circle text-primary"></i></a></h1>
    <div class="col-lg-12">
      <div class="card px-3">
      <div class="table-responsive">
        <table class="table caption-top table-bordered border-dark">
        <caption>List of Postings</caption>          
          <thead class="text-center">
            <tr>
              <th rowspan="2" class="align-top">Title</th>
              <th rowspan="2" class="align-top">Description</th>
              <th colspan="2">Post Type</th>
              <th rowspan="2" class="align-top">User</th>
              <th rowspan="2" class="align-top">Option</th>
            </tr>
            <tr>
              <th>Jenis</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($posting as $posting) {?>
              <tr>
                <td><?= $posting['title'] ?></td>
                <td><?= substr($posting['description'],0, 30)  ?></td>
                <td class="text-center"><?= $posting['jenis'] ?></td>
                <td class="text-center"><?= $posting['type'] ?></td>
                <td class="text-center"><?= $posting['fullname'] ?></td>
                <td class="text-center">
                  <form action="posting/delete/<?= $posting['id_posting'] ?>" method="post">
                  <input type="hidden" name="id_posting" value="<?= $posting['id_posting'] ?>">
                    <button class="badge bg-danger border-0" type="submit">Delete</button>
                </form>
                    <a class="badge bg-warning text-decoration-none" href="/posting/edit/<?= $posting['id_posting'] ?>">Edit</a>
                  <a class="badge bg-info text-decoration-none" href="/posting/view/<?= $posting['id_posting'] ?>">View</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>  
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>
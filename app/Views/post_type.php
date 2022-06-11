<?= $this->extend('layout/template_posting'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row my-3">
    <h3>Create Post Type <a href="/posttype/create"><i class="bi bi-plus-circle text-primary"></i></a></h1>
    <div class="col-lg-12">
      <div class="card px-3">
      <div class="table-responsive">
        <table class="table caption-top table-bordered border-dark">
        <caption>List of Post Type</caption>  
          <thead class="text-center">
            <tr>
              <th>Jenis</th>
              <th>Type</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($post_type as $post_type) {?>
              <tr>
                <td class="text-center"><?= $post_type['jenis'] ?></td>
                <td class="text-center"><?= $post_type['type'] ?></td>
                <td class="text-center">
                  <form action="posttype/delete/<?= $post_type['id_post_type'] ?>" method="post">
                  <input type="hidden" name="id_post_type" value="<?= $post_type['id_post_type'] ?>">
                    <button class="badge bg-danger border-0" type="submit">Delete</button>
                </form>
                    <a class="badge bg-warning text-decoration-none" href="/posttype/edit/<?= $post_type['id_post_type'] ?>">Edit</a>
                  <a class="badge bg-info text-decoration-none" href="/posttype/view/<?= $post_type['id_post_type'] ?>">View</a>
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
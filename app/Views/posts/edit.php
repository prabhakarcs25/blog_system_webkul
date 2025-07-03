<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Post | Postify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >

                                                  <?= view('layouts/header') ?>
<div class="bg-white px-3 py-4">


  <div class="container border border-danger-subtle p-4 rounded-4">
    <h2 class="fw-bold mb-4 text-danger">Edit Blog Post</h2>
    

    <form action="<?= site_url('admin/posts/update/' . $post['id']) ?>" method="post">
      <?= csrf_field() ?>
      <div class="d-flex justify-content-end">
       <button type="submit" class="btn btn-danger  px-4 ">Update Post</button>

      </div>

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control bg-light border-0"
               value="<?= esc($post['title']) ?>" required maxlength="255">
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" rows="10" class="form-control"><?= esc($post['content']) ?></textarea>
      </div>


    </form>
  </div>
</div>
                                            <?= view('layouts/footer') ?>


  <script src="<?= base_url('assets/js/tinymce/tinymce.min.js') ?>"></script>
  <script>
    tinymce.init({
      selector: '#content',
      height: 400,
      menubar: false,
      plugins: 'lists link image preview code',
      toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview code',
      branding: false
    });
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($post['title']) ?> | Postify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >
<?= view('layouts/header') ?>
 <div class="bg-light px-3 py-5">
  <div class="container">
    <!-- Postify Logo -->
    <div class="text-center mb-4">
      <h4 class="text-danger fw-bold">😊 Postify</h4>
    </div>

    <!-- Post Card -->
    <div class="bg-white border rounded-4 shadow-sm p-4">
      <!-- Title -->
      <h2 class="fw-bold mb-3"><?= esc($post['title']) ?></h2>

      <!-- Meta -->
      <p class="text-muted mb-4">
        Published on: <?= esc(date('F d, Y', strtotime($post['created_at']))) ?>
        |
        Written by:
        <a href="<?= site_url('author/' . $post['user_id']) ?>" class="text-decoration-none text-danger fw-semibold">
          <?= esc($post['author_name']) ?>
        </a>
      </p>

      <!-- Content -->
      <div class="post-content fs-5">
        <?= $post['content'] ?> <!-- Raw HTML allowed for WYSIWYG output -->
      </div>
    </div>
  </div>
</div>

<?= view('layouts/footer') ?>
</body>
</html>

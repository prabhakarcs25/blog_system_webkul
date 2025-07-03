<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Author: <?= esc($posts[0]['author_name'] ?? 'Author') ?> | Postify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >
<?= view('layouts/header') ?>
<div class="bg-light px-3 py-5">


  <div class="container">
    <!-- Postify Logo -->
    <div class="text-center mb-5">
      <h4 class="text-danger fw-bold">😊 Postify</h4>
    </div>

                                                          <!-- Author ka information -->
    <div class="text-center mb-5">
      <p class="text-muted mb-1">Author</p>
      <h4 class="fw-bold"><?= esc($posts[0]['author_name'] ?? 'Unknown') ?></h4>
      <p class="text-muted"><?= count($posts) ?> <?= count($posts) === 1 ? 'Post' : 'Posts' ?></p>
    </div>

  
    <?php foreach ($posts as $post): ?>
      <div class="bg-white border rounded-3 shadow-sm p-4 mb-4">
        <a href="<?= site_url('post/' . $post['id']) ?>" class="text-decoration-none text-dark">
          <h4 class="fw-bold mb-2"><?= esc($post['title']) ?></h4>
        </a>
        <p class="mb-2 text-muted"><?= esc(word_limiter(strip_tags($post['content']), 15)) ?></p>
        <small class="text-muted">
          <?= date('F d, Y', strtotime($post['created_at'])) ?>
        </small>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?= view('layouts/footer') ?>
</body>
</html>

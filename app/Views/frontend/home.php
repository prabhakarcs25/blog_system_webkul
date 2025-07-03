<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home | Postify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >
                                                              <?= view('layouts/header') ?>

<div class="bg-light px-3 py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h4 class="text-danger fw-bold">😊 Postify</h4>
    </div>

   
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success small text-center">
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>




    <?php foreach ($posts as $post): ?>
      <div class="card border-0 shadow-sm mb-4" style="cursor: pointer;">
  <div class="card-body">
    <a href="<?= site_url('post/' . $post['id']) ?>" class="text-decoration-none text-dark">
      <h4 class="card-title fw-bold mb-2"><?= esc($post['title']) ?></h4>
    </a>
    <p class="card-text text-muted mb-2"><?= esc(word_limiter(strip_tags($post['content']), 95)) ?></p>
    <small class="text-muted">
      <?= date('F d, Y', strtotime($post['created_at'])) ?>,

      <a href="<?= site_url('author/' . $post['user_id']) ?>" class="text-decoration-none text-danger fw-semibold">
          <?= esc($post['author_name']) ?>
        </a>
    </small>
  </div>
</div>

    <?php endforeach; ?>
  </div>
</div>
<?= view('layouts/footer') ?>





<script>
  setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) alert.style.opacity = '0';
  }, 2000);
</script>



</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top px-3 py-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-danger" href="<?= site_url('/') ?>">😊 Postify</a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPostify">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarPostify">
      <ul class="navbar-nav ms-auto mb-2 ">
        <li class="nav-item">
          <a class="nav-link text-danger fw-bold" href="<?= site_url('/') ?>">Home</a>
        </li>
        
        <?php if (session()->get('user')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/posts') ?>">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/posts/create') ?>">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger fw-semibold" href="<?= site_url('logout') ?>">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('login') ?>">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('register') ?>">Sign Up</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>

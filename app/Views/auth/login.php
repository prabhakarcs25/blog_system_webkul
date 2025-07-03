<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Postify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >

<?= view('layouts/header') ?>
<div class="bg-white d-flex justify-content-center align-items-center min-vh-100 px-3">


    <div class="border border-danger-subtle p-4 p-md-5 rounded-4 shadow-sm w-100" style="max-width: 420px;">
        <!-- Logo and Heading -->
        <div class="text-center mb-4">
            <!-- Replace with your logo if needed -->
            <h3 class="text-danger fw-bold mb-1">😊 Postify</h3>
            <h4 class="fw-bold mt-2">Welcome Back</h4>
            <p class="text-muted mb-0">Please enter your credentials to log in.</p>
        </div>


        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success small text-center">
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('handleLogin') ?>">
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
                <input type="email" class="form-control bg-light border-0" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control bg-light border-0" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-danger w-100 rounded-pill py-2 fw-semibold">
                Login
            </button>
        </form>
        <div class="text-center mt-3">
            <small>Don't have an account? <a href="<?= site_url('register') ?>" class="text-danger fw-semibold">Sign Up</a></small>
        </div>
    </div>
</div>

  

<?= view('layouts/footer') ?>

  
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>

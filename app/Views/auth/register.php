<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Postify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body >

                                                         <?= view('layouts/header') ?>

                                     
<div class="bg-white d-flex justify-content-center align-items-center vh-100 px-3">

    <div class="border border-danger  p-4  rounded-4 shadow-sm w-100" style="max-width: 480px;">
        <div class="text-center mb-4">
            <h3 class="text-danger fw-bold">😊 Postify</h3>
            <h4 class="fw-bold mt-2">Create an Account</h4>
            <p class="text-danger">Fill in your details below</p>
        </div>


        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger small text-center">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>
 

        <form method="post" action="<?= site_url('handleRegister') ?>">
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
                <input type="text" name="name" id="name" class="form-control bg-light border-0" placeholder="Name" required>
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control bg-light border-0" placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" name="password" id="password" class="form-control bg-light border-0" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-danger w-100 rounded-pill py-2 fw-semibold">Register</button>
        </form>

        <div class="text-center mt-3">
            <small>Already have an account? <a href="<?= site_url('login') ?>" class="text-danger fw-semibold">Sign In</a></small>
        </div>
    </div>
</div>


                                                    <?= view('layouts/footer') ?>


</body>
</html>

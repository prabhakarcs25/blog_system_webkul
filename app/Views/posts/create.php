<!DOCTYPE html>
<html>
<head>
  <title>Create Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="">
                                                      <?= view('layouts/header') ?>

  <div class="p-4">
    <h2>Create New Blog Post</h2>


       <!-- successfully post flash message  -->
    <div id="create-msg" class="mt-3"></div>


    <form id="ajaxCreateForm" method="post">
      <?= csrf_field() ?>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-danger mt-3">Publish</button>
      </div>
      <div class="form-group py-4">
        <label>Title</label>
        <input type="text" name="title" class="form-control border-2 border-danger-subtle rounded-1" placeholder="Enter post title..." required maxlength="255">
      </div>

      <div class="form-group">
        <label>Content</label>
        <textarea name="content" id="content" rows="6" class="form-control" placeholder="Enter post content..."></textarea>
      </div>
      
    </form>
  </div>



                                                    <?= view('layouts/footer') ?>



  <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/tinymce/tinymce.min.js') ?>"></script>

  <script>
    tinymce.init({
      selector: '#content',
      height: 300,
      menubar: false,
      plugins: 'lists link image preview',
      toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
      branding: false
    });






    $('#ajaxCreateForm').on('submit', function (e) {
      e.preventDefault(); 

      const content = tinymce.get('content').getContent();
      const formData = $(this).serialize() + '&content=' + encodeURIComponent(content);

      $.ajax({
        url: '<?= site_url('admin/posts/store') ?>',
        method: 'POST',
        data: formData,
        success: function () {
          $('#create-msg').html('<div class="alert alert-success">Post created successfully!</div>');
          $('#ajaxCreateForm')[0].reset();
          tinymce.get('content').setContent('');
        },
        error: function () {
          $('#create-msg').html('<div class="alert alert-danger">Failed to create post.</div>');
        }
      });
    });
  </script>

  

</body>
</html>

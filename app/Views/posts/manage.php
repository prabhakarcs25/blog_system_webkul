<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Posts | Postify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
                                                  <?= view('layouts/header') ?>

<div class="bg-white px-3 py-4">

  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 border-bottom pb-3 gap-3">
    <div>
      <h4 class="text-danger fw-bold mb-1">😊 Postify</h4>
    </div>
    <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-danger rounded-pill px-4">
      + New post
    </a>
  </div>


  <h3 class="fw-semibold mb-4">All Posts</h3>



  <div id="delete-msg"></div>


  <div class="table-responsive">
    <table class="table align-middle table-borderless table-hover">
      <thead class="table-light">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Date</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($posts as $post): ?>
          <tr id="post-<?= $post['id'] ?>">
            <td class="text-nowrap"><?= esc($post['title']) ?></td>
            <td class="text-nowrap"><?= esc($post['author_name'] ?? 'Admin') ?></td>
            <td class="text-nowrap"><?= esc(date('Y-m-d', strtotime($post['created_at']))) ?></td>
            <td class="text-end text-nowrap">
              <a href="<?= site_url('post/' . $post['id']) ?>" class="btn btn-sm btn-outline-secondary me-1">View</a>
              <a href="<?= site_url('admin/posts/edit/' . $post['id']) ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>

              <button class="btn btn-sm btn-outline-danger delete-post" data-id="<?= $post['id'] ?>">
                Delete
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

                                            <?= view('layouts/footer') ?>


<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>

<script>
$(document).on('click', '.delete-post', function () {
  const postId = $(this).data('id');
  if (!confirm('Are you sure you want to delete this post?')) return;

  $.ajax({
    url: '<?= site_url('admin/posts/delete/') ?>' + postId,
    type: 'POST',
    data: {
      <?= csrf_token() ?>: '<?= csrf_hash() ?>'
    },
    success: function () {
      $('#post-' + postId).fadeOut('slow', function () {
        $(this).remove();
        $('#delete-msg').html('<div class="alert alert-success small">Post deleted successfully!</div>');
      });
    },
    error: function () {
      alert('Failed to delete post.');
    }
  });
});
</script>

</body>
</html>

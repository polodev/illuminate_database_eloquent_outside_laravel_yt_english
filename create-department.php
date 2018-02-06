<?php 
require 'vendor/autoload.php';
$message = '';
if (isset($_POST['name'])) {
  Department::insert([
    'name' => $_POST['name']
  ]);
  $message = 'Data inserted successfully';
}

 ?>
<?php require 'partial/header.php'; ?>
<div class="container mt-5">
  <?php if (!empty($message)): ?>
    <div class="alert alert-success">
      <?= $message ?>
    </div>
  <?php endif; ?>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Department Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-info">Add a department</button>
    </div>
  </form>
</div>
<?php require 'partial/footer.php'; ?>
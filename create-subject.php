<?php 
require 'vendor/autoload.php';
$departments = Department::all();
$message = '';
if (isset($_POST['name'])) {
  Subject::insert([
    'name' => $_POST['name'],
    'department_id' => $_POST['department']
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
      <label for="name">Subject Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="department">Deparment</label>
      <select name="department" id="department" class="form-control">
        <?php foreach($departments as $department): ?>
          <option value="<?= $department->id ?>"><?= $department->name ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-info">Add a subject</button>
    </div>
  </form>
</div>
<?php require 'partial/footer.php'; ?>
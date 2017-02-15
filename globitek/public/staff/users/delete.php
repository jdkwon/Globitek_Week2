<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$users_result = find_user_by_id($id);
// No loop, only one result
$user = db_fetch_assoc($users_result);
?>

<?php $page_title = 'Staff: User ' . $user['first_name'] . " " . $user['last_name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Users List</a><br />

  <h1>Are you sure you want to delete user: <?php echo $user['first_name'] . " " . $user['last_name']; ?>?</h1>
  <br />
  <a href=<?php delete_user($user);?>"index.php">Delete</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

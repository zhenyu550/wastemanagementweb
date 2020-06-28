<!DOCTYPE html>
<?php
$user = $_SESSION["user"];
$item = Staff::get($user);
?>
<html>
<header class="header">
  <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="dashboard.php" class="navbar-brand font-weight-bold text-uppercase text-base">Non-biodegradable Waste Management</a>
    <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
      <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
        <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">
              <?php
              echo $item->get_name();
              ?>
            </strong>
            <small>
              <?php echo $item->get_type(); ?>
            </small>
            <br>
            <small>
              <?php
              $branch = Collection_Point::get($item->get_cp_id());
              echo $branch->get_state() . " - " . $branch->get_name();
              ?>
            </small></a>
          <div class="dropdown-divider"></div>
          <a href="changepassword.php" class="dropdown-item">Change Password</a>
          <a href="logout.php" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
</header>

</html>
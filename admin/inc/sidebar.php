<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/index.php">


   <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-book"></i>
  </div> 
  <div class="sidebar-brand-text mx-3">Expense tracker</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-tasks"></i>
    <span>Expenses</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Expenses</h6> -->
      <a class="collapse-item" href="add_expenses.php">Add Expenses</a>
      <a class="collapse-item" href="manage_expenses.php">Manage Expenses</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-search-dollar"></i>
    <span>Expense Report</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
      <a class="collapse-item" href="datewise-rep.php">Daily</a>
      <a class="collapse-item" href="monthwise-rep.php">Monthly</a>
      <a class="collapse-item" href="yearwise-rep.php">Yearly</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Profile -->
<li class="nav-item">
  <a class="nav-link" href="../admin/user_profile.php">
    <i class="fas fa-fw fa-user-alt"></i>
    <span>Profile</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="change_password.php">
    <i class="fas fa-fw fa-key"></i>
    <span>Change Password</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="logout.php">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
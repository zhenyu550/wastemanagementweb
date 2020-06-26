<!DOCTYPE html>
<html>
  <div id="sidebar" class="sidebar py-3">
    <div
      class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"
    >
      MAIN
    </div>
    <ul class="sidebar-menu list-unstyled">
      <li class="sidebar-list-item">
        <a href="dashboard.php" class="sidebar-link text-muted"
          ><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a
        >
      </li>
      <li class="sidebar-list-item">
        <a href="collectors.php" class="sidebar-link text-muted"
          ><i class="o-table-content-1 mr-3 text-gray"></i><span>Collectors</span></a
        >
      </li>
      <li class="sidebar-list-item">
        <a
          href="#"
          data-toggle="collapse"
          data-target="#pagesTrans"
          aria-expanded="false"
          aria-controls="pagesTrans"
          class="sidebar-link text-muted"
          ><i class="o-survey-1 mr-3 text-gray"></i><span>Transactions</span></a
        >
        <div id="pagesTrans" class="collapse">
          <ul
            class="sidebar-menu list-unstyled border-left border-primary border-thick"
          >
            <li class="sidebar-list-item">
              <a
                href="viewtransaction.php"
                class="sidebar-link text-muted pl-lg-5"
                >View Transactions</a
              >
            </li>
            <li class="sidebar-list-item">
              <a
                href="addtransaction.php"
                class="sidebar-link text-muted pl-lg-5"
                >Add Transaction</a
              >
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-list-item">
        <a href="viewfeedbacks.php" class="sidebar-link text-muted"
          ><i class="o-paperwork-1 mr-3 text-gray"></i><span>Feedback</span></a
        >
      </li>
      <li class="sidebar-list-item">
        <a href="viewrequest.php" class="sidebar-link text-muted"
          ><i class="o-wireframe-1 mr-3 text-gray"></i><span>Pick Up Request</span></a
        >
      </li>

    </ul>
    
    <div
      class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"
    >
      USER
    </div>
      <li class="sidebar-list-item">
      <a
          href="#"
          data-toggle="collapse"
          data-target="#pagesAdmin"
          aria-expanded="false"
          aria-controls="pagesAdmin"
          class="sidebar-link text-muted"
          ><i class="o-profile-1 mr-3 text-gray"></i><span>Admin</span></a
        >
        <div id="pagesAdmin" class="collapse">
          <ul
            class="sidebar-menu list-unstyled border-left border-primary border-thick"
          >
            <li class="sidebar-list-item">
              <a
                href="viewcollectionpoints.php"
                class="sidebar-link text-muted pl-lg-5"
                >Manage Collection Point</a
              >
            </li>
            <li class="sidebar-list-item">
              <a
                href="#"
                class="sidebar-link text-muted pl-lg-5"
                >Manage Collectors</a
              >
            </li>

            <li class="sidebar-list-item">
              <a
                href="#"
                class="sidebar-link text-muted pl-lg-5"
                >Manage Staff</a
              >
            </li>
          </ul>
        </div>

      <a href="changepassword.php" class="sidebar-link text-muted"
          ><i class="o-settings-window-1 mr-3 text-gray"></i><span>Change Password</span></a
        >
        <a href="logout.php" class="sidebar-link text-muted"
          ><i class="o-exit-1 mr-3 text-gray"></i><span>Logout</span></a
        >
      </li>
    </ul>
  </div>

  
</html>

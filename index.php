<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Natures Gift Eask</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i> 
      <a href="index.php" class="logo d-flex align-items-center" style="margin-left: 10px;">
        <span class="d-none d-lg-block">Natures Gift Eask</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">W. Catalan</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Wil Fred Catalan</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="address-management.php">
          <i class="bi bi-geo-alt"></i>
          <span>Address Management</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="contribution_management.php">
          <i class="bi bi-piggy-bank"></i>
          <span>Contribution Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Members Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-all-members.php">
              <i class="bi bi-person-fill-add" style="font-size: 17px;"></i><span>All Members</span>
            </a>
          </li>
          <li>
            <a href="add_members.php">
              <i class="bi bi-person-fill-add" style="font-size: 17px;"></i><span>Add Members</span>
            </a>
          </li>
          <li>
            <a href="tables-active-members.php">
              <i class="bi bi-person-check-fill" style="font-size: 17px;"></i><span>Active Members</span>
            </a>
          </li>
          <li>
            <a href="tables-forfeited-members.php">
              <i class="bi bi-person-fill-x" style="font-size: 17px;"></i><span>Forfeited Members</span>
            </a>
          </li>
          <li>
            <a href="tables-deceased-members.php">
              <i class="bi bi-person-fill-x" style="font-size: 17px;"></i><span>Deceased Members</span>
            </a>
          </li>
        </ul>
      </li><!-- End Members Management -->
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                
                <div class="card-body">
                  <a href="tables-all-members.php">
                  <h5 class="card-title">Total Registered Member</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                          require 'conn.php';

                          // Query to count the number of active remarks
                          $sql = "SELECT COUNT(*) AS active_count FROM members_tb";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              echo "<h6>" . $row['active_count'] . "</h6>";
                          } else {
                              echo "<h6>0</h6>";
                          }

                          $conn->close();
                          ?>

                    </div>
                  </div>
                  </a>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <a href="tables-active-members.php">
                    <h5 class="card-title">Active Members</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle   d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            require 'conn.php';

                            // Query to count the number of active remarks
                            $sql = "SELECT COUNT(*) AS active_count FROM members_tb WHERE remarks LIKE '%Active%'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h6>" . $row['active_count'] . "</h6>";
                            } else {
                                echo "<h6>0</h6>";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                    </a>
                </div>


              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <a href="tables-forfeited-members.php">
                    <h5 class="card-title">Forfeited Members</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            require 'conn.php';

                            // Query to count the number of active remarks
                            $sql = "SELECT COUNT(*) AS active_count FROM members_tb WHERE remarks = 'Forfeited'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h6>" . $row['active_count'] . "</h6>";
                            } else {
                                echo "<h6>0</h6>";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                  </a>
                </div>

              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <a href="tables-deceased-members.php">
                  <h5 class="card-title">Deceased Members</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                            require 'conn.php';

                            // Query to count the number of active remarks
                            $sql = "SELECT COUNT(*) AS active_count 
                                FROM members_tb 
                                WHERE remarks = 'Deceased'";
                            $result = $conn->query($sql); 

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h6>" . $row['active_count'] . "</h6>";
                            } else {
                                echo "<h6>0</h6>";
                            }

                            $conn->close();
                            ?>
                    </div>
                  </div>
                  </a>
                </div>
              </div>

            </div><!-- End Customers Card -->

            
            <!-- Recent Members -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Members</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th>No.</th>
                          <th>Name</th>
                          <th>Barangay</th>
                          <th>Birthdate</th>
                          <th>Contact No.</th>
                          <th>Registration Date</th>
                          <th>Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require 'conn.php';

                      // Fetch records from members_tb
                      $sql = "SELECT * FROM `members_tb` ORDER BY id DESC LIMIT 20;";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // Output data of each row
                          $count = 1;
                          while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td style='font-size: 14px;'>" . $row['id'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['complete_name'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['address'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . ($row['birthdate'] != '0000-00-00' ? date('m/d/Y', strtotime($row['birthdate'])) : '-') . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['contact'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . date('m/d/Y', strtotime($row['registration_date'])) . "</td>";
                              echo "<td style='font-size: 14px;'><span class='badge bg-" . ($row['remarks'] == 'Deceased' ? 'danger' : ($row['remarks'] == 'Forfeited' ? 'warning' : 'success')) . "'>" . $row['remarks'] . "</span></td>";
                              echo "</tr>";
                              $count++;
                          }
                      } else {
                          echo "<tr><td colspan='7'>No records found</td></tr>";
                      }

                      $conn->close();
                      ?>
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Recent Address -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Address</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th>No.</th>
                          <th>Barangay</th>
                          <th>Municipality</th>
                          <th>Date Added</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require 'conn.php';

                      // Fetch records from address_tb
                      $sql = "SELECT * FROM address_tb ORDER BY id DESC LIMIT 20";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // Output data of each row
                          $count = 1;
                          while ($row = $result->fetch_assoc()) {

                              echo "<tr>";
                              echo "<td style='font-size: 14px;'>" . $row['id'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['barangay'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['municipality'] . "</td>";
                              echo "<td style='font-size: 14px;'>" . $row['date_added'] . "</td>";
                              echo "<td>";
                              echo "<button type='button' class='btn btn-secondary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "' disabled><i class='bi bi-pencil-square'></i></button>";
                              echo "<button class='btn btn-danger btn-sm' onclick='deleteRecord(" . $row['id'] . ")' disabled><i class='bi bi-trash'></i></button>";
                              echo "</td>";
                              echo "</tr>";
                              $count++;
                          }
                      } else {
                          echo "<tr><td colspan='5'>No records found</td></tr>";
                      }

                      $conn->close();
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
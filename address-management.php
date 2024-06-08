<?php
require 'conn.php';

// for adding record
if (isset($_POST['add-submit'])) {
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO address_tb (barangay, municipality) VALUES (?, ?)");
    $stmt->bind_param("ss", $barangay, $municipality);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
    header("Location: address-management.php"); // Redirect back to the all members page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Address Management - Natures Gift Eask</title>
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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="address-management.php">
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

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-cash"></i>
          <span>Contribution</span>
        </a>
      </li> --><!-- End Contribution Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Members Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Address Management</h5>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">Add Address</button>
              </div>

              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Address</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <!-- Floating Labels Form -->
                          <form class="row g-3" method="POST" action="">
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingBarangay" name="barangay" placeholder="Enter Barangay" required oninput="convertToUpperCase()">
                                <label for="floatingBarangay" style="font-size:14px;">Enter Barangay </label>
                              </div>
                               <div class="form-floating">
                                <input type="text" class="form-control" id="floatingMunicipality" name="municipality" placeholder="Enter Municipality" required oninput="convertToUpperCase()">
                                <label for="floatingMunicipality" style="font-size:14px;">Enter Municipality</label>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary btn-sm" name="add-submit">Submit</button>
                            </div>
                          </form><!-- End floating Labels Form -->
                    </div>
                  </div>
                </div>
              </div>

              <!-- Table with stripped rows -->
              <table class="table datatable table-striped table-hover">
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
                      $sql = "SELECT * FROM address_tb";
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
                              echo "<button type='button' class='btn btn-secondary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "'><i class='bi bi-pencil-square'></i></button>";
                              echo "<button class='btn btn-danger btn-sm' onclick='deleteRecord(" . $row['id'] . ")'><i class='bi bi-trash'></i></button>";
                              echo "</td>";
                              echo "</tr>";

                              // Modal for editing the record
                              echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1'>
                                      <div class='modal-dialog'>
                                          <div class='modal-content'>
                                              <div class='modal-header'>
                                                  <h5 class='modal-title'>Edit Address</h5>
                                                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                              </div>
                                              <div class='modal-body'>
                                                  <!-- Floating Labels Form -->
                                                  <form class='row g-3' method='POST' action='update-address.php'>
                                                      <input type='hidden' name='id' value='" . $row['id'] . "'>
                                                      <div class='col-md-12'>
                                                          <div class='form-floating'>
                                                              <input type='text' class='form-control' id='floatingEditBarangay" . $row['id'] . "' name='barangay' placeholder='Barangay' value='" . $row['barangay'] . "' required oninput='convertToUpperCase()'>
                                                              <label for='floatingBarangay" . $row['id'] . "'>Barangay</label>
                                                          </div>
                                                      </div>
                                                      <div class='col-md-12'>
                                                          <div class='form-floating'>
                                                              <input type='text' class='form-control' id='floatingEditMunicipality" . $row['id'] . "' name='municipality' placeholder='Municipality' value='" . $row['municipality'] . "' required  oninput='convertToUpperCase()'>
                                                              <label for='floatingMunicipality" . $row['id'] . "'>Municipality</label>
                                                          </div>
                                                      </div>
                                                      <div class='modal-footer'>
                                                          <button type='button' class='btn btn-secondary btn-sm' data-bs-dismiss='modal'>Close</button>
                                                          <button type='submit' class='btn btn-primary btn-sm' name='edit-submit'>Submit</button>
                                                      </div>
                                                  </form><!-- End floating Labels Form -->
                                              </div>
                                          </div>
                                      </div>
                                    </div>";

                              $count++;
                          }
                      } else {
                          echo "<tr><td colspan='5'>No records found</td></tr>";
                      }

                      $conn->close();
                      ?>
                  </tbody>
              </table><!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
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

  <script>
      function convertToUpperCase() {
          const barangayInput = document.getElementById('floatingBarangay');
          const municipalityInput = document.getElementById('floatingMunicipality');
          barangayInput.value = barangayInput.value.toUpperCase();
          municipalityInput.value = municipalityInput.value.toUpperCase();
      }
      
      // Focus the input field when the modal is shown
      var myModal = document.getElementById('basicModal');
      myModal.addEventListener('shown.bs.modal', function () {
          document.getElementById('floatingBarangay').focus();
      });
  </script>

  <script>
    function deleteRecord(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'delete-address.php?id=' + id;
        }
    }
</script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
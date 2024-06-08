<?php
require 'conn.php';

// for adding record
if (isset($_POST['add-submit'])) {
    $complete_name = $_POST['complete_name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $contact = $_POST['contact'];
    $remarks = $_POST['remarks'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO members_tb (complete_name, address, birthdate, contact, remarks) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $complete_name, $address, $birthdate, $contact, $remarks);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: tables-all-members.php"); // Redirect back to the all members page
    exit();
}

// FOr updating record
if (isset($_POST['edit-submit'])) {
    if (isset($_POST['id'])) {
        // Sanitize the id parameter to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        // Retrieve other form data
        $complete_name = mysqli_real_escape_string($conn, $_POST['complete_name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

        // Perform SQL UPDATE query
        $sql = "UPDATE members_tb SET complete_name='$complete_name', address='$address', birthdate='$birthdate', contact='$contact', remarks='$remarks' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "ID parameter not set";
    }
} else {
    echo "Submit button not clicked";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>All Members - Natures Gift Eask</title>
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
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="address-management.php">
          <i class="bi bi-geo-alt"></i>
          <span>Address Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="contribution_management.php">
          <i class="bi bi-piggy-bank"></i>
          <span>Contribution Management</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Members Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content " data-bs-parent="#sidebar-nav">
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
                <h5 class="card-title mb-0">All Members</h5>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">Add Members</button>
              </div>

              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Members</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <!-- Floating Labels Form -->
                          <form class="row g-3" method="POST" action="">
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" name="complete_name" placeholder="Complete Name" required>
                                <label for="floatingName">Complete Name</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingAddress" name="address" placeholder="Address" required>
                                <label for="floatingAddress">Address</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="date" class="form-control" id="floatingBirthdate" name="birthdate" placeholder="Birthdate">
                                <label for="floatingBirthdate">Birthdate</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="number" class="form-control" id="floatingContact" name="contact" placeholder="Contact No." oninput="limitInput(this)">
                                <label for="floatingContact">Contact No.</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <select class="form-select" id="floatingSelect" name="remarks" aria-label="Remarks">
                                  <option selected>Active</option>
                                  <option value="Forfeited">Forfeited</option>
                                  <option value="Deceased">Deceased</option>
                                </select>
                                <label for="floatingSelect">Remarks</label>
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
                          <th>Name</th>
                          <th>Barangay</th>
                          <th>Birthdate</th>
                          <th>Contact No.</th>
                          <th>Registration Date</th>
                          <th>Remarks</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      require 'conn.php';

                      // Fetch records from members_tb
                      $sql = "SELECT * FROM members_tb";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // Output data of each row
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='font-size: 14px;'>" . $row['id'] . "</td>";
                            echo "<td style='font-size: 14px;'>" . $row['complete_name'] . "</td>";
                            echo "<td style='font-size: 14px;'>" . $row['address'] . "</td>";
                            echo "<td style='font-size: 14px;'>" . ($row['birthdate'] != '0000-00-00' ? date('m/d/Y', strtotime($row['birthdate'])) : '-') . "</td>";
                            echo "<td style='font-size: 14px;'>" . $row['contact'] . "</td>";
                            echo "<td style='font-size: 14px;'>" . date('m/d/Y', strtotime($row['registration_date'])) . "</td>";
                            echo "<td><span class='badge bg-" . 
                                (
                                    (strpos($row['remarks'], 'Died on') !== false || strpos($row['remarks'], 'Died and Forfeiteded') !== false) ? 'danger' :
                                    ($row['remarks'] == 'Forfeited' ? 'warning' : 'success')
                                ) . 
                                "'>" . 
                                (
                                    (strpos($row['remarks'], 'Died on') !== false || strpos($row['remarks'], 'Died and Forfeiteded') !== false) ? 'Deceased' : $row['remarks']
                                ) . 
                                "</span></td>";
                            echo "<td>";
                            if ($row['remarks'] == 'Active' || $row['remarks'] == 'Forfeited') {
                                echo "<button type='button' class='btn btn-secondary btn-sm me-1' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "'><i class='bi bi-pencil-square'></i></button> ";
                            }
                            echo "</td>";
                            echo "</tr>";

                            echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Edit Member</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <!-- Floating Labels Form -->
                                            <form class='row g-3' method='' action='' id='editForm" . $row['id'] . "'>
                                                <input type='hidden' name='id' value='" . $row['id'] . "'> <!-- Include row id -->
                                                <div class='col-md-12 mb-2'>
                                                    <div class='form-floating'>
                                                        <input type='text' class='form-control' id='floatingName" . $row['id'] . "' name='complete_name' placeholder='Complete Name' value='" . $row['complete_name'] . "' required>
                                                        <label for='floatingName" . $row['id'] . "'>Complete Name</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-12 mb-2'>
                                                    <div class='form-floating'>
                                                        <input type='text' class='form-control' id='floatingAddress" . $row['id'] . "' name='address' placeholder='Address' value='" . $row['address'] . "' required>
                                                        <label for='floatingAddress" . $row['id'] . "'>Address</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-12 mb-2'>
                                                    <div class='form-floating'>
                                                        <input type='date' class='form-control' id='floatingBirthdate" . $row['id'] . "' name='birthdate' placeholder='Birthdate' value='" . date('Y-m-d', strtotime($row['birthdate'])) . "'>
                                                        <label for='floatingBirthdate" . $row['id'] . "'>Birthdate</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-12 mb-2'>
                                                    <div class='form-floating'>
                                                        <input type='number' class='form-control' id='floatingContact" . $row['id'] . "' name='contact' placeholder='Contact No.' value='" . $row['contact'] . "'  oninput='limitInput(this)'>
                                                        <label for='floatingContact" . $row['id'] . "'>Contact No.</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-12 mb-2'>
                                                    <div class='form-floating'>
                                                        <select class='form-select' id='floatingSelect" . $row['id'] . "' name='remarks' aria-label='Remarks' onchange='toggleDeceasedDate(this, " . $row['id'] . ")'>
                                                            <option value='Active'" . ($row['remarks'] == 'Active' ? ' selected' : '') . ">Active</option>
                                                            <option value='Forfeited'" . ($row['remarks'] == 'Forfeited' ? ' selected' : '') . ">Forfeited</option>
                                                            <option value='Deceased'" . ($row['remarks'] == 'Deceased' ? ' selected' : '') . ">Deceased</option>
                                                        </select>
                                                        <label for='floatingSelect" . $row['id'] . "'>Remarks</label>
                                                    </div>
                                                </div>
                                                <div class='col-md-12' id='deceasedDateDiv" . $row['id'] . "' style='display: none;'>
                                                    <div class='form-floating'>
                                                        <input type='date' class='form-control' id='deceasedDate" . $row['id'] . "' name='deceased_date' placeholder='Deceased Date'>
                                                        <label for='deceasedDate" . $row['id'] . "'>Deceased Date</label>
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
                        }
                      } else {
                          echo "<tr><td colspan='8'>No records found</td></tr>";
                      }

                      $conn->close();
                      ?>
                  </tbody>
                  <div class="modal fade" id="editModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Members</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <!-- Floating Labels Form -->
                              <form class="row g-3" method="POST" action="tables-all-members.php">
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" name="complete_name" placeholder="Complete Name" required>
                                    <label for="floatingName">Complete Name</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingAddress" name="address" placeholder="Address" required>
                                    <label for="floatingAddress">Address</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="date" class="form-control" id="floatingBirthdate" name="birthdate" placeholder="Birthdate">
                                    <label for="floatingBirthdate">Birthdate</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingContact" name="contact" placeholder="Contact No.">
                                    <label for="floatingContact">Contact No.</label>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="remarks" aria-label="Remarks">
                                      <option selected>Active</option>
                                      <option value="Forfeited">Forfeited</option>
                                      <option value="Deceased">Deceased</option>
                                    </select>
                                    <label for="floatingSelect">Remarks</label>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                              </form><!-- End floating Labels Form -->
                        </div>
                      </div>
                    </div>
                  </div>
              </table>

              <!-- End Table with stripped rows -->

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
  function limitInput(input) {
      if (input.value.length > 11) {
          input.value = input.value.slice(0, 11);
      }
  }

  function toggleDeceasedDate(select, id) {
      var deceasedDateDiv = document.getElementById('deceasedDateDiv' + id);
      if (select.value === 'Deceased') {
          deceasedDateDiv.style.display = 'block';
      } else {
          deceasedDateDiv.style.display = 'none';
      }
  }

  document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', function(event) {
          event.preventDefault();
          var formData = new FormData(form);
          for (var [key, value] of formData.entries()) {
              console.log(key + ': ' + value);
          }
          // form.submit();
      });
  });
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
<?php
require 'conn.php';

// Fetch the data from the database, combining barangay and municipality
$query = "SELECT CONCAT(barangay, ', ', municipality) AS address_combined FROM address_tb ORDER BY barangay ASC";
$result = $conn->query($query);

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
        echo "<script>
            alert('New members added successfully!');
          </script>";
    } else {
      echo "<script>
            alert('" . mysqli_error($conn) . "');
          </script>";
    }

    $stmt->close();
    $conn->close();
    header("Location: add_members.php"); // Redirect back to the all members page
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

  <title>Add Members - Natures Gift Eask</title>
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
                    <h5 class="card-title mb-0">Add Members</h5>
                </div>
                <form class="row g-3" method="POST" action="">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="complete_name" placeholder="Complete Name" required oninput="convertToUpperCase()">
                      <label for="floatingName">Complete Name</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                      <select class="form-select" id="floatingAddress" name="address" required>
                          <option value="">Select an address</option>
                          <?php
                            // Check if there are results
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['address_combined'] . "'>" . $row['address_combined'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No addresses available</option>";
                            }

                            $conn->close();
                            ?>
                      </select>
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
                  <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary btn-md" name="add-submit">Submit</button>
                  </div>
                </form>
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


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  function limitInput(input) {
      if (input.value.length > 11) {
          input.value = input.value.slice(0, 11);
      }
  }
  </script>

  <script>
      function convertToUpperCase() {
          const nameInput = document.getElementById('floatingName');
          const addressInput = document.getElementById('floatingAddress');
          nameInput.value = nameInput.value.toUpperCase();
          addressInput.value = addressInput.value.toUpperCase();
      }
  </script>

</body>

</html>
<?php
require 'conn.php';

// Parameters from DataTables
$draw = intval($_GET['draw']);
$start = intval($_GET['start']);
$length = intval($_GET['length']);
$search = $_GET['search']['value'];
$order_column = $_GET['order'][0]['column'];
$order_dir = $_GET['order'][0]['dir'];

$columns = array(
    0 => 'id',
    1 => 'complete_name',
    2 => 'address',
    3 => 'birthdate',
    4 => 'contact',
    5 => 'registration_date',
    6 => 'remarks'
);

// Construct the base query
$sql = "SELECT * FROM members_tb WHERE remarks = 'Active'";

// Add search functionality
if (!empty($search)) {
    $sql .= " AND (complete_name LIKE '%$search%' OR address LIKE '%$search%' OR contact LIKE '%$search%')";
}

// Add ordering functionality
$sql .= " ORDER BY " . $columns[$order_column] . " " . $order_dir;

// Get total number of records (without filters)
$totalRecordsQuery = "SELECT COUNT(*) as count FROM members_tb WHERE remarks = 'Active'";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['count'];

// Get total number of filtered records
$filteredRecordsQuery = $sql;
$filteredRecordsResult = $conn->query($filteredRecordsQuery);
$totalFilteredRecords = $filteredRecordsResult->num_rows;

// Add pagination
$sql .= " LIMIT $start, $length";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $nestedData = array();
    $nestedData[] = $row['id'];
    $nestedData[] = $row['complete_name'];
    $nestedData[] = $row['address'];
    $nestedData[] = $row['birthdate'] != '0000-00-00' ? date('m/d/Y', strtotime($row['birthdate'])) : '-';
    $nestedData[] = $row['contact'];
    $nestedData[] = date('m/d/Y', strtotime($row['registration_date']));
    $nestedData[] = "<span class='badge bg-" . ($row['remarks'] == 'Deceased' ? 'danger' : ($row['remarks'] == 'Forfeited' ? 'warning' : 'success')) . "'>" . $row['remarks'] . "</span>";

    $data[] = $nestedData;
}

$json_data = array(
    "draw" => $draw,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalFilteredRecords,
    "data" => $data
);

echo json_encode($json_data);

$conn->close();
?>

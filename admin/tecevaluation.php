<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: ../home");
    exit();
}
$uniqueId = $_SESSION['adminId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light p-0 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="participant">
                <img src="../assets/images/Tcoe_logo.jpg" alt="Logo" width="80" height="50" />
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 2rem"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="application">Home</a></li>
                        <li><a class="dropdown-item" href="users">Users</a></li>
                        <li><a class="dropdown-item" href="applications">Applications</a></li>
                        <li><a class="dropdown-item" href="tecassign">TEC Assign</a></li>
                        <li><a class="dropdown-item" href="tecevaluation">TEC Evaluation</a></li>
                        <li><a class="dropdown-item" href="tecReports">TEC Reports</a></li>
                        <li><a class="dropdown-item" href="../logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <!-- <h4 class="mt-2"><button class="btn btn-success" onclick="downloadApplicantData()">Download Applicant Data</button></h4> -->
        <div class="table-responsive mt-2">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>Problem Statement</th>
                        <th>Category</th>
                        <th>Organization Name</th>
                        <th>Industry Vertical</th>
                        <th>TEC Group</th>
                        <th>Member -1</th>
                        <th>Member -2</th>
                        <th>Member -3</th>
                        <th>Member -4</th>
                        <th>Hold</th>
                        <th>Accepted</th>
                        <th>Rejected</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM applicant WHERE status = 1 and assignedJury != 'N/A' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            // $count = $count + 1;
                            $uniqueApplicant = $row['uniqueApplicant'];
                            $sql1 = "SELECT * FROM points WHERE uniqueApplicant = '$uniqueApplicant' ";
                            $result1 = $conn->query($sql1);
                            $member1 = 0;
                            $member2 = 0;
                            $member3 = 0;
                            $member4 = 0;
                            $hold = 0;
                            $accepted = 0;
                            $rejected = 0;
                            if ($result1->num_rows > 0) {
                                $count1 = 0;
                                while ($row1 = $result1->fetch_assoc()) {
                                    $count1 = $count1 + 1;
                                    if ($count1 == 1) {
                                        $member1 = $row1['totalPoints'];
                                    }
                                    if ($count1 == 2) {
                                        $member2 = $row1['totalPoints'];
                                    }
                                    if ($count1 == 3) {
                                        $member3 = $row1['totalPoints'];
                                    }
                                    if ($count1 == 4) {
                                        $member4 = $row1['totalPoints'];
                                    }
                                    if ($row1['status'] == 1) {
                                        $hold = $hold + 1;
                                    }
                                    if ($row1['status'] == 2) {
                                        $accepted = $accepted + 1;
                                    }
                                    if ($row1['status'] == 3) {
                                        $rejected = $rejected + 1;
                                    }
                                }
                    ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $row['applicantName'] ?></td>
                                    <td><?= $row['problemsStatement'] ?></td>
                                    <td><?= $row['category'] ?></td>
                                    <td><?= $row['organizationName'] ?></td>
                                    <td><?= $row['industry'] ?></td>
                                    <td><?= $row['assignedJury'] ?></td>
                                    <td><?= $member1 ?></td>
                                    <td><?= $member2 ?></td>
                                    <td><?= $member3 ?></td>
                                    <td><?= $member4 ?></td>
                                    <td><?= $hold ?></td>
                                    <td><?= $accepted ?></td>
                                    <td><?= $rejected ?></td>
                                    <td><?= $row['city'] ?></td>
                                    <td><?= $row['state'] ?></td>
                                </tr>
                            <?php
                            }

                            ?>
                    <?php
                        }
                    } else {
                        echo "<script>alert('No record found for ID');</script>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#data-table').DataTable();
    // });

    function downloadApplicantData() {
        window.location.href = 'download_applicant_data1.php';
    }
</script>

<script>
    var table = $("#data-table").DataTable({
        dom: "Bfrtip",
        buttons: [{
            extend: 'excelHtml5',
            title: 'Application List',
            exportOptions: {
                columns: ':visible'
            }
        }],
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function() {
            var api = this.api();
            api.columns().eq(0).each(function(colIdx) {
                var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                );
                var title = $(cell).text();
                $('input', cell).on('keyup change', function() {
                    api
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                });
            });
        }
    });
</script>

</html>
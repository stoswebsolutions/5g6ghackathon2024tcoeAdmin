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
    <title>TEC Reports</title>
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
                        <th>TEC Group</th>
                        <th>TEC Member Email</th>
                        <th>Assigned</th>
                        <th>Completed</th>
                        <th class="bg bg-primary">Hold</th>
                        <th class="bg bg-success">Accepted</th>
                        <th class="bg bg-danger">Rejected</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = " SELECT td.tecUnique AS TECMember, td.tecGroup AS TECgroup, td.emailId AS emailId, COUNT(p.tecUnique) AS completed, SUM(CASE WHEN p.status = 1 THEN 1 ELSE 0 END) AS hold, SUM(CASE WHEN p.status = 2 THEN 1 ELSE 0 END) AS accept, SUM(CASE WHEN p.status = 3 THEN 1 ELSE 0 END) AS reject FROM tecDetails td JOIN points p ON td.tecUnique = p.tecUnique GROUP BY td.tecUnique, td.tecGroup, td.emailId ";
                    $result = $conn->query($sql);
                    $count = 1;
                    $Tajc = 0;
                    $Ttec = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $TECgroup = $row['TECgroup'];
                            $sql1 = "SELECT count(assignedJury) as assignedJury FROM `applicant` WHERE assignedJury = '$TECgroup' ";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                $row1 = $result1->fetch_assoc();
                                $assignedJuryCount1 = $row1['assignedJury'];
                            } else {
                                $assignedJuryCount1 = 0;
                            }
                            $Ttec = $Ttec + $row['completed'];
                            $Tajc = $Tajc + $assignedJuryCount1;
                    ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $row['TECgroup'] ?></td>
                                <td><?= $row['emailId'] ?></td>
                                <td><?= $assignedJuryCount1 ?></td>
                                <td><?= $row['completed'] ?></td>
                                <td class="bg bg-primary"><?= $row['hold'] ?></td>
                                <td class="bg bg-success"><?= $row['accept'] ?></td>
                                <td class="bg bg-danger"><?= $row['reject'] ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<script>alert('No record found for ID');</script>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <!-- <td>Total Applications: <?= $Tajc ?></td> -->
                        <td>Total Completed: <?= $Ttec ?></td>
                        <td colspan="3"></td>
                    </tr>
                </tfoot>
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
    var table = $("#data-table1").DataTable({
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
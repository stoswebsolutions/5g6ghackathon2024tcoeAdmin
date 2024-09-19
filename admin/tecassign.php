<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: ../home");
    exit();
}
$uniqueId = $_SESSION['adminId'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if(isset($_POST['tecGroup']) && !empty($_POST['tecGroup'])){}
    if ((isset($_POST['uniqueApplicant']) || isset($_POST['uniqueApplicant'])) && (!empty($_POST['uniqueApplicant']) || !empty($_POST['uniqueApplicant']))) {
        $tecGroup = $_POST['tecGroup'];
        $uniqueApplicants = $_POST['uniqueApplicant'];
        $uniqueApplicants1 = $_POST['uniqueApplicant1'];
        $complete1 = [];
        $complete2 = [];
        $complete3 = [];
        foreach ($uniqueApplicants as $uniqueApplicant) {
            $sql = "UPDATE applicant SET assignedJury = '$tecGroup' WHERE uniqueApplicant = '$uniqueApplicant' ";
            if ($conn->query($sql) === TRUE) {
                $complete1[] = $uniqueApplicant;
            } else {
                $complete2[] = $uniqueApplicant;
            }
        }
        foreach ($uniqueApplicants1 as $uniqueApplicant1) {
            $sql1 = "UPDATE applicant SET assignedJury = 'N/A' WHERE uniqueApplicant = '$uniqueApplicant1' ";
            if ($conn->query($sql1) === TRUE) {
                $complete3[] = $uniqueApplicant1;
            }
        }
        header("Location: tecassign");
    } else {
        $sql = "SELECT * FROM applicant where status=1 ORDER BY (assignedJury = 'N/A') DESC, assignedJury";
        if (isset($_POST['problemsStatement']) && isset($_POST['category']) && !empty($_POST['problemsStatement']) && !empty($_POST['category'])) {
            $problemsStatement1 = $_POST['problemsStatement'];
            $category1 = $_POST['category'];
            $sql = "SELECT * FROM applicant where status=1 and problemsStatement ='$problemsStatement1' and category = '$category1' ORDER BY (assignedJury = 'N/A') DESC, assignedJury ";
        } else if (isset($_POST['category']) && !empty($_POST['category'])) {
            $category1 = $_POST['category'];
            $sql = "SELECT * FROM applicant where status=1 and category = '$category1' ORDER BY (assignedJury = 'N/A') DESC, assignedJury ";
        } else if (isset($_POST['problemsStatement']) && !empty($_POST['problemsStatement'])) {
            $problemsStatement1 = $_POST['problemsStatement'];
            $sql = "SELECT * FROM applicant where status=1 and problemsStatement ='$problemsStatement1' ORDER BY (assignedJury = 'N/A') DESC, assignedJury ";
        } 
        // else if (isset($_POST['tecGroup']) && !empty($_POST['tecGroup'])) {
        //     $tecGroup1 = $_POST['tecGroup'];
        //     $sql = "SELECT * FROM applicant where status=1 and assignedJury ='$tecGroup1'  ORDER BY (assignedJury = 'N/A') DESC, assignedJury ";
        // }
    }
} else {
    $sql = "SELECT * FROM applicant where status=1 ORDER BY (assignedJury = 'N/A') DESC, assignedJury";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Applications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                    <a class="nav-link dropdown-toggle" href="#" id="listDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 2rem"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="listDropdown">
                        <li><a class="dropdown-item" href="application">Home</a></li>
                        <li><a class="dropdown-item" href="users">Users</a></li>
                        <li><a class="dropdown-item" href="applications">Applications</a></li>
                        <li><a class="dropdown-item" href="tecassign">TEC Assign</a></li>
                        <li><a class="dropdown-item" href="tecevaluation">TEC Evaluation</a></li>
                        <li><a class="dropdown-item" href="../logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <form action="tecassign" method="post">
            <div class="row mt-4 p-2 shadow">
                <div class="col-md-3">
                    <select class="form-select" name="tecGroup" id="tecGroup">
                        <option disabled selected>Select Tec Group</option>
                        <?php
                        $q1 = "SELECT * FROM tecDetails WHERE status=1 GROUP BY tecGroup ";
                        $r1 = $conn->query($q1);
                        if ($r1->num_rows > 0) {
                            while ($row1 = $r1->fetch_assoc()) {
                        ?>
                                <option value="<?= $row1['tecGroup'] ?>" <?= $tecGroup1 === $row1['tecGroup'] ? 'selected' : '' ?>><?= $row1['tecGroup'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="problemsStatement" id="problemsStatement">
                        <option disabled selected>Select Problems Statement</option>
                        <?php
                        $q2 = "SELECT * FROM applicant WHERE status=1 GROUP BY problemsStatement ";
                        $r2 = $conn->query($q2);
                        if ($r2->num_rows > 0) {
                            while ($row2 = $r2->fetch_assoc()) {
                        ?>
                                <option value="<?= $row2['problemsStatement'] ?>" <?= $problemsStatement1 === $row2['problemsStatement'] ? 'selected' : '' ?>><?= $row2['problemsStatement'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="category" id="category">
                        <option disabled selected>Select Category</option>
                        <?php
                        $q3 = "SELECT * FROM applicant WHERE status=1 GROUP BY category ";
                        $r3 = $conn->query($q3);
                        if ($r3->num_rows > 0) {
                            while ($row3 = $r3->fetch_assoc()) {
                        ?>
                                <option value="<?= $row3['category'] ?>" <?= $category1 === $row3['category'] ? 'selected' : '' ?>><?= $row3['category'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3"><input type="submit" value="SUBMIT" class="btn btn-warning"></div>
            </div>
            <div class="table-responsive mt-4">
                <table id="data-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Website</th>
                            <th>City</th>
                            <th>Assign/Un Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result1 = $stmt->get_result();
                        if ($result1->num_rows > 0) {
                            $count = 0;
                            while ($row = $result1->fetch_assoc()) {
                                $count = $count + 1;
                                $uniqueApplicant = $row['uniqueApplicant'];
                                $applicantName = $row['applicantName'];
                                $organizationName = $row['organizationName'];
                                $email = $row['email'];
                                $contactNumber = $row['contactNumber'];
                                $city = $row['city'];
                                $state = $row['state'];
                                $postalAddress = $row['postalAddress'];
                                $category = $row['category'];
                                $applying = $row['applying'];
                                $industry = $row['industry'];
                                $website = $row['website'];
                        ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $applicantName ?><br><small>Phone: <?= $contactNumber ?><br><?= $applying ?></small></td>
                                    <td><?= $email ?></td>
                                    <td><?= $category ?></td>
                                    <td>TCOE India<br><small><?= $website ?></small></td>
                                    <td><?= $city ?>-<?= $state ?>-<?= $row['assignedJury'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['assignedJury'] != 'N/A') {
                                            $aj = $row['assignedJury'];
                                            $q2 = "SELECT * FROM tecDetails WHERE tecGroup='$aj' and status=1 GROUP BY tecGroup ";
                                            $r2 = $conn->query($q2);
                                            if ($r2->num_rows > 0) {
                                                while ($row2 = $r2->fetch_assoc()) {
                                        ?>
                                                    <input type="checkbox" name="uniqueApplicant[]" id="assign<?= $count ?>" value="<?= $uniqueApplicant ?>" checked disabled>
                                                    <span class="text-success"><?= $row2['tecGroup'] ?></span><br><span class="text-danger">Want&nbsp;to&nbsp;Un&nbsp;Assign&nbsp;?</span>&nbsp;<input type="checkbox" name="uniqueApplicant1[]" id="assigns<?= $count ?>" value="<?= $uniqueApplicant ?>">
                                            <?php
                                                }
                                            }
                                            ?>
                                        <?php
                                        } else {
                                        ?>
                                            <input type="checkbox" name="uniqueApplicant[]" id="assign<?= $count ?>" value="<?= $uniqueApplicant ?>">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<script>alert('No record found for ID');</script>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
    // var table = $("#data-table").DataTable({
    //     dom: "Bfrtip",
    //     buttons: [{
    //         extend: 'excelHtml5',
    //         title: 'Application List',
    //         exportOptions: {
    //             columns: ':visible'
    //         }
    //     }],
    //     orderCellsTop: true,
    //     fixedHeader: true,
    //     initComplete: function() {
    //         var api = this.api();
    //         api.columns().eq(0).each(function(colIdx) {
    //             var cell = $('.filters th').eq(
    //                 $(api.column(colIdx).header()).index()
    //             );
    //             var title = $(cell).text();
    //             $('input', cell).on('keyup change', function() {
    //                 api
    //                     .column(colIdx)
    //                     .search(this.value)
    //                     .draw();
    //             });
    //         });
    //     }
    // });
</script>

</html>
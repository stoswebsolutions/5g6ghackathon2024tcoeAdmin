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
                        <li><a class="dropdown-item" href="juryassign">Jury Assign</a></li>
                        <li><a class="dropdown-item" href="../logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <form action="juryaction" method="post">
            <div class="row mt-4 p-2 shadow">
                <div class="col-md-2 offset-md-2">
                    <select class="form-select" name="juryId" id="juryId">
                        <option disabled selected>Select Jury</option>
                        <?php
                        $q1 = "SELECT * FROM users WHERE role = 'jury' and status=1 ";
                        $r1 = $conn->query($q1);
                        if ($r1->num_rows > 0) {
                            while ($row1 = $r1->fetch_assoc()) {
                        ?>
                                <option value="<?= $row1['uniqueId'] ?>"><?= $row1['email'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 offset-md-2"><input type="submit" value="Assign" class="btn btn-warning"></div>
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
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM applicant where status=1 GROUP BY email, problemsStatement";
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
                                    <td><?= $city ?>-<?= $state ?></td>
                                    <td>
                                        <?php
                                        if ($row['assignedJury'] != 0) {
                                            $aj = $row['assignedJury'];
                                            $q2 = "SELECT * FROM users WHERE uniqueId='$aj' and role = 'jury' and status=1 ";
                                            $r2 = $conn->query($q2);
                                            if ($r2->num_rows > 0) {
                                                while ($row2 = $r2->fetch_assoc()) {
                                        ?>
                                                    <span class="text-success"><?= $row2['email'] ?></span>&nbsp;<span class="text-danger">Want&nbsp;to&nbsp;Dismiss&nbsp;?</span>&nbsp;<input type="checkbox" name="uniqueApplicant1[]" id="assigns<?= $count ?>" value="<?= $uniqueApplicant ?>">
                                            <?php
                                                }
                                            }
                                            ?>
                                            <input type="checkbox" name="uniqueApplicant[]" id="assign<?= $count ?>" value="<?= $uniqueApplicant ?>" checked disabled>

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
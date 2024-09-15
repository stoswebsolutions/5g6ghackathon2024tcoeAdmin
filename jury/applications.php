<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['juryId'])) {
    header("Location: home");
    exit();
}
$juryId = $_SESSION['juryId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <style>
        .nav-tabs .nav-link {
            background-color: #f0f0f0;
            color: #000;
            border: none;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        .nav-tabs .nav-item {
            border: none;
        }
    </style>
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
                        <li><a class="dropdown-item" href="applications">Home</a></li>
                        <li><a class="dropdown-item" href="../logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="container-fluid">
        <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link active w-100 text-center" id="card-tab" data-bs-toggle="tab" data-bs-target="#card-tab-pane" type="button" role="tab" aria-controls="card-tab-pane" aria-selected="true">Card View</button>
            </li>
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link w-100 text-center" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">List View</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="card-tab-pane" role="tabpanel" aria-labelledby="card-tab" tabindex="0">
                <div class="row">
                    <?php
                    $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant where uniqueId NOT IN(15,426) ORDER BY a.uniqueApplicant IS NULL, p.uniqueApplicant";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $count = $count + 1;
                            $applicantName = $row['applicantName'];
                            $organizationName = $row['organizationName'];
                            $email = $row['email'];
                            $contactNumber = $row['contactNumber'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $postalAddress = $row['postalAddress'];
                            $applying = $row['applying'];
                            $industry = $row['industry'];
                            $problemsStatement = $row['problemsStatement'];
                            $website = $row['website'];
                            if ($row['pointsId'] == "") {
                                $border = "border-danger";
                            } else {
                                $border = "border-success";
                            }
                    ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card <?= $border ?> mt-3" style="min-height: 530px;">
                                    <div class="card-header text-center"><?= $problemsStatement ?></div>
                                    <div class="card-body">
                                        <h5><?= $applicantName ?></h5>
                                        <p><strong>Email:</strong> <?= $email ?></p>
                                        <p><strong>Phone:</strong> <?= $contactNumber ?></p>
                                        <p><strong>City:</strong> <?= $city ?></p>
                                        <p><strong>Organization Name:</strong> <?= $organizationName ?></p>
                                        <p><strong>Apply as:</strong> <?= $applying ?></p>
                                        <p><strong>Industry Vertical:</strong> <?= $industry ?></p>
                                        <p><strong>Website:</strong> <a href="<?= $website ?>" target="_blank"><?= $website ?></a></p>
                                        <?php
                                        if ($row['pointsId'] == "") {
                                        ?>
                                            <p class="text-danger"><strong>Review Pending</strong></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="text-success">Review Completed(Total Marks: <?= $row['totalPoints'] ?>)</p>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($row['pointsStatus'] == 1) {
                                        ?>
                                            <p class="bg-primary p-2 text-center text-white">Hold</p>
                                        <?php
                                        }
                                        if ($row['pointsStatus'] == 2) {
                                        ?>
                                            <p class="bg-success p-2 text-center text-white">Accepted</p>
                                        <?php
                                        }
                                        if ($row['pointsStatus'] == 3) {
                                        ?>
                                            <p class="bg-danger p-2 text-center text-white">Rejected</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="applicationView.php?ua=<?= $row['AuniqueApplicant'] ?>" class="btn btn-primary">View Application</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No Data";
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive shadow mt-3">
                            <table id="data-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Apply As</th>
                                        <th>Industry Vertical</th>
                                        <th>Problem Statement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql1 = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant where uniqueId NOT IN(15,426) ORDER BY a.uniqueApplicant IS NULL, p.uniqueApplicant";
                                    $result1 = $conn->query($sql1);
                                    $count1 = 0;
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_assoc()) {
                                            $count1 = $count1 + 1;
                                            $applicantName = $row1['applicantName'];
                                            $organizationName = $row1['organizationName'];
                                            $email = $row1['email'];
                                            $contactNumber = $row1['contactNumber'];
                                            $city = $row1['city'];
                                            $state = $row1['state'];
                                            $postalAddress = $row1['postalAddress'];
                                            $applying = $row1['applying'];
                                            $industry = $row1['industry'];
                                            $problemsStatement = $row1['problemsStatement'];
                                            $website = $row1['website'];
                                            if ($row1['pointsId'] == "") {
                                                $border = "border-danger";
                                            } else {
                                                $border = "border-success";
                                            }
                                    ?>
                                            <tr class="<?= $border ?>">
                                                <td><?= $count1 ?></td>
                                                <td><?= $applicantName ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $contactNumber ?></td>
                                                <td><?= $applying ?></td>
                                                <td><?= $industry ?></td>
                                                <td><?= $problemsStatement ?></td>
                                                <td><a href="applicationView.php?ua=<?= $row1['AuniqueApplicant'] ?>" class="btn btn-primary">View Application</a></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
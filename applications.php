<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['uniqueId'])) {
    header("Location: card");
    exit();
}
$uniqueId = $_SESSION['uniqueId'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="assets/css/applications.css" />
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light p-0 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="participant">
                <img src="./assets/images/Tcoe_logo.jpg" alt="Logo" width="80" height="50" />
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="listDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 2rem"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="listDropdown">
                        <li><a class="dropdown-item" href="admin">card</a></li>
                        <li><a class="dropdown-item" href="dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="users">Users</a></li>
                        <li><a class="dropdown-item" href="applications">Applications</a></li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="container-fluid">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="card-tab" data-bs-toggle="tab" data-bs-target="#card-tab-pane" type="button" role="tab" aria-controls="card-tab-pane" aria-selected="true">Card View</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">List View</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="card-tab-pane" role="tabpanel" aria-labelledby="card-tab" tabindex="0">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM applicant ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
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
                            $website = $row['website'];
                    ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card-custom">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Profile Image">
                                        <div>
                                            <h5 class="mb-0"><?= $applicantName ?></h5>
                                            <small><?= $email ?></small>
                                        </div>
                                    </div>
                                    <p><strong>Phone:</strong> <?= $contactNumber ?></p>
                                    <p><strong>City:</strong> <?= $city ?></p>
                                    <p><strong>Organization Name:</strong> <?= $organizationName ?></p>
                                    <p><strong>Apply as:</strong> <?= $applying ?></p>
                                    <p><strong>Industry Vertical:</strong> <?= $industry ?></p>
                                    <p><strong>Website:</strong> <a href="<?= $website ?>" target="_blank"><?= $website ?></a></p>
                                    <div class="card-buttons">
                                        <a href="applicationView.php?uniqueId=<?= $row['uniqueId'] ?>" class="btn btn-primary">View Application</a>
                                        <div>
                                            <!-- <button class="btn btn-accept">Accept</button>
                                            <button class="btn btn-decline">Decline</button> -->
                                        </div>
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
                <div class="table-responsive table-container">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Website</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM applicant ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result1 = $stmt->get_result();
                            if ($result1->num_rows > 0) {
                                $count = 0;
                                while ($row = $result1->fetch_assoc()) {
                                    $count = $count + 1;
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
                                            <div class="card-buttons">
                                                <a href="applicationView.php?uniqueId=<?= $row['uniqueId'] ?>" class="btn btn-primary">View Application</a>
                                                <div>
                                                    <!-- <button class="btn btn-accept">Accept</button>
                                                    <button class="btn btn-decline">Decline</button> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No Data";
                            }

                            ?>
                            <!-- Additional rows can be added similarly -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

</html>
<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['uniqueId'])) {
    header("Location: home");
    exit();
}
$uniqueId = $_SESSION['uniqueId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="assets/css/users.css" />
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light p-0 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="participant">
                <img src="./assets/images/Tcoe_logo.jpg" alt="Logo" width="80" height="50" />
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
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="row g-0">
        <div class="col-sm-8 m-auto mt-5">
            <div class="me-5">
                <h4 class="ms-5">All users</h4>
            </div>
            <div id="table-response" class="table-container">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>I am</th>
                            <th>Univercity/Company/Organization</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fullname = '';
                        $email = '';
                        $categoryType = '';
                        $categoryName = '';
                        $sql = "SELECT * FROM users WHERE role = 'participant' and uniqueId NOT IN(3,15,426) ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                $count = $count + 1;
                                $fullname = $row['fullname'];
                                $email = $row['email'];
                                $mobile = $row['mobile'];
                                $categoryType = $row['categoryType'];
                                $categoryName = $row['categoryName'];
                        ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $fullname ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $mobile ?></td>
                                    <td><?= $categoryType ?></td>
                                    <td><?= $categoryName ?></td>
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
        </div>
    </div>
</body>
<script>
    var table = $("#data-table").DataTable({
        dom: "Bfrtip",
        buttons: [{
            extend: 'excelHtml5',
            title: 'Registered Users',
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>
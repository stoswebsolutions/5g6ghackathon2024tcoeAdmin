<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['tecUnique'])) {
    header("Location: ../home");
    exit();
}
$tecUnique = $_SESSION['tecUnique'];
$tecGroup = $_SESSION['tecGroup'];

$sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, 
p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt, t.tecUnique as TtecUnique
FROM  applicant as a join tecDetails as t on a.assignedJury=t.tecGroup  LEFT JOIN points as p on a.uniqueApplicant = p.uniqueApplicant and t.tecUnique=p.tecUnique 
where a.assignedJury='$tecGroup' and t.tecUnique = '$tecUnique' ";

if (isset($_POST['problemsStatement']) && isset($_POST['category']) && !empty($_POST['problemsStatement']) && !empty($_POST['category'])) {
    $problemsStatement = $_POST['problemsStatement'];
    $category = $_POST['category'];
    $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, 
    p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt, t.tecUnique as TtecUnique
    FROM  applicant as a join tecDetails as t on a.assignedJury=t.tecGroup  LEFT JOIN points as p on a.uniqueApplicant = p.uniqueApplicant and t.tecUnique=p.tecUnique 
    where a.assignedJury='$tecGroup' and t.tecUnique = '$tecUnique' and a.category = '$category' and a.problemsStatement = '$problemsStatement' ";
} else if (isset($_POST['problemsStatement']) && !empty($_POST['problemsStatement'])) {
    $problemsStatement = $_POST['problemsStatement'];
    $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, 
    p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt, t.tecUnique as TtecUnique
    FROM  applicant as a join tecDetails as t on a.assignedJury=t.tecGroup  LEFT JOIN points as p on a.uniqueApplicant = p.uniqueApplicant and t.tecUnique=p.tecUnique 
    where a.assignedJury='$tecGroup' and t.tecUnique = '$tecUnique' and a.problemsStatement = '$problemsStatement' ";
} else if (isset($_POST['category']) && !empty($_POST['category'])) {
    $category = $_POST['category'];
    $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, 
    p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt, t.tecUnique as TtecUnique
    FROM  applicant as a join tecDetails as t on a.assignedJury=t.tecGroup  LEFT JOIN points as p on a.uniqueApplicant = p.uniqueApplicant and t.tecUnique=p.tecUnique 
    where a.assignedJury='$tecGroup' and t.tecUnique = '$tecUnique' and a.category = '$category' ";
}

// if (isset($_POST['problemsStatement']) && isset($_POST['category'])) {
//     $problemsStatement = $_POST['problemsStatement'];
//     $category = $_POST['category'];
//     $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant where a.status=1 and a.assignedJury = '$tecGroup'  and a.category = '$category' and a.problemsStatement = '$problemsStatement' ORDER BY FIELD(a.category, 'Startup') DESC, a.uniqueApplicant IS NULL, p.uniqueApplicant";
// } else if (isset($_POST['category'])) {
//     $category = $_POST['category'];
//     $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant where a.status=1 and a.assignedJury = '$tecGroup'  and a.category = '$category' ORDER BY FIELD(a.category, 'Startup') DESC, a.uniqueApplicant IS NULL, p.uniqueApplicant";
// } else if (isset($_POST['problemsStatement'])) {
//     $problemsStatement = $_POST['problemsStatement'];
//     $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant where a.status=1 and a.assignedJury = '$tecGroup'  and a.problemsStatement = '$problemsStatement' ORDER BY FIELD(a.category, 'Startup') DESC, a.uniqueApplicant IS NULL, p.uniqueApplicant";
// }

$total_rows1 = 0;
$q1 = "SELECT * FROM applicant where status=1";
$res1 = $conn->query($q1);
if ($res1->num_rows > 0) {
    $total_rows1 = $res1->num_rows;
}
$total_rows2 = 0;
$q2 = "SELECT * FROM points GROUP BY uniqueApplicant";
$res2 = $conn->query($q2);
if ($res2->num_rows > 0) {
    $total_rows2 = $res2->num_rows;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tec</title>
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
            <p><span class="text-danger">Welcome - </span><?= $_SESSION['emailId'] ?></p>
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
        <form action="applications" method="post">
            <div class="row mt-2">
                <div class="col-md-6 text-center">
                    <div class="form-group mb-3">
                        <select id="problemsStatement" name="problemsStatement" class="form-select">
                            <option value="">Please select Problems Statement</option>
                            <option value="5G Enabled Consoles/Devices For Students" <?= $problemsStatement === "5G Enabled Consoles/Devices For Students" ? 'selected' : '' ?>>5G Enabled Consoles/Devices For Students</option>
                            <option value="Suo Moto" <?= $problemsStatement === "Suo Moto" ? 'selected' : '' ?>>Suo Moto</option>
                            <option value="Digital Twin Technology" <?= $problemsStatement === "Digital Twin Technology" ? 'selected' : '' ?>>Digital Twin Technology</option>
                            <option value="AI-Driven Network Maintenance" <?= $problemsStatement === "AI-Driven Network Maintenance" ? 'selected' : '' ?>>AI-Driven Network Maintenance</option>
                            <option value="All Other areas (Suo Moto)" <?= $problemsStatement === "All Other areas (Suo Moto)" ? 'selected' : '' ?>>All Other areas (Suo Moto)</option>
                            <option value="Emergency Communication Systems" <?= $problemsStatement === "Emergency Communication Systems" ? 'selected' : '' ?>>Emergency Communication Systems</option>
                            <option value="5G Broadcasting" <?= $problemsStatement === "5G Broadcasting" ? 'selected' : '' ?>>5G Broadcasting</option>
                            <option value="5G Kiosk" <?= $problemsStatement === "5G Kiosk" ? 'selected' : '' ?>>5G Kiosk</option>
                            <option value="Non-Terrestrial Network (NTN) Communications" <?= $problemsStatement === "Non-Terrestrial Network (NTN) Communications" ? 'selected' : '' ?>>Non-Terrestrial Network (NTN) Communications</option>
                            <option value="Real Time Control Of Advanced Drones" <?= $problemsStatement === "Real Time Control Of Advanced Drones" ? 'selected' : '' ?>>Real Time Control Of Advanced Drones</option>
                            <option value="Virtual Networking and SDN" <?= $problemsStatement === "Virtual Networking and SDN" ? 'selected' : '' ?>>Virtual Networking and SDN</option>
                            <option value="Cyber Security, Quantum communications and security" <?= $problemsStatement === "Cyber Security, Quantum communications and security" ? 'selected' : '' ?>>Cyber Security, Quantum communications and security</option>
                            <option value="FinTech" <?= $problemsStatement === "FinTech" ? 'selected' : '' ?>>FinTech</option>
                            <option value="Multi-Modal Interactive System" <?= $problemsStatement === "Multi-Modal Interactive System" ? 'selected' : '' ?>>Multi-Modal Interactive System</option>
                            <option value="5G Enabled Consoles/Devices" <?= $problemsStatement === "5G Enabled Consoles/Devices" ? 'selected' : '' ?>>5G Enabled Consoles/Devices</option>
                            <option value="5G O-RAN" <?= $problemsStatement === "5G O-RAN" ? 'selected' : '' ?>>5G O-RAN</option>
                            <option value="Water Management" <?= $problemsStatement === "Water Management" ? 'selected' : '' ?>>Water Management</option>
                            <option value="Environment, Public Safety & Disaster Management" <?= $problemsStatement === "Environment, Public Safety & Disaster Management" ? 'selected' : '' ?>>Environment, Public Safety & Disaster Management</option>
                            <option value="Tourism" <?= $problemsStatement === "Tourism" ? 'selected' : '' ?>>Tourism</option>
                            <option value="Industry 4.0" <?= $problemsStatement === "Industry 4.0" ? 'selected' : '' ?>>Industry 4.0</option>
                            <option value="Sports" <?= $problemsStatement === "Sports" ? 'selected' : '' ?>>Sports</option>
                            <option value="Automobile/ Transport/Logistics" <?= $problemsStatement === "Automobile/ Transport/Logistics" ? 'selected' : '' ?>>Automobile/ Transport/Logistics</option>
                            <option value="Smart Cities" <?= $problemsStatement === "Smart Cities" ? 'selected' : '' ?>>Smart Cities</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="form-group mb-3">
                        <select id="category" name="category" class="form-select">
                            <option value="">Please select category</option>
                            <option value="Student" <?= $category === "Student" ? 'selected' : '' ?>>Student</option>
                            <option value="Academia (Professor/research scholars)" <?= $category === "Academia (Professor/research scholars)" ? 'selected' : '' ?>>Academia (Professor/research scholars)</option>
                            <option value="Startup" <?= $category === "Startup" ? 'selected' : '' ?>>Startup</option>
                            <option value="Corporate professional" <?= $category === "Corporate professional" ? 'selected' : '' ?>>Corporate professional</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>
        <div class="row mt-2">
            <div class="col-md-6 text-center"><button class="w-75 text-success">Total Number of Applications to be Reviewed: <?= $total_rows1 - $total_rows2 ?></button></div>
            <div class="col-md-6 text-center"><button class="w-75 text-warning">Total Number of Applications Reviewed: <?= $total_rows2 ?></button></div>
        </div>
        <!-- <ul class="nav nav-tabs w-100 mt-2" id="myTab" role="tablist">
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link active w-100 text-center" id="card-tab" data-bs-toggle="tab" data-bs-target="#card-tab-pane" type="button" role="tab" aria-controls="card-tab-pane" aria-selected="true">Card View</button>
            </li>
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link w-100 text-center" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">List View</button>
            </li>
        </ul> -->
        <button class="btn btn-success mt-2" onclick="downloadApplicantData()">Download Applicant Data</button>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="card-tab-pane" role="tabpanel" aria-labelledby="card-tab" tabindex="0">
                <div class="row">
                    <?php
                    // $sql = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant ORDER BY FIELD(a.category, 'Startup') DESC, a.uniqueApplicant IS NULL, p.uniqueApplicant";
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
                            $category1 = $row['category'];
                            $applying = $row['applying'];
                            $industry = $row['industry'];
                            $problemsStatement1 = $row['problemsStatement'];
                            $website = $row['website'];
                            if ($row['pointsId'] == "") {
                                $border = "border-danger";
                            } else {
                                $border = "border-success";
                            }
                    ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card <?= $border ?> mt-3" style="min-height: 530px;">
                                    <div class="card-header">
                                        <span class="p-2 shadow <?= $border ?>"><?= $count ?></span> <span class="float-end"><?= $problemsStatement1 ?></span>
                                    </div>
                                    <div class="card-body">
                                        <h5><?= $applicantName ?></h5>
                                        <p><strong>Email:</strong> <?= $email ?></p>
                                        <p><strong>Phone:</strong> <?= $contactNumber ?></p>
                                        <p><strong>City:</strong> <?= $city ?></p>
                                        <p><strong>Organization Name:</strong> <?= $organizationName ?></p>
                                        <p><strong>I am:</strong> <?= $category1 ?></p>
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
                                        <th>I am</th>
                                        <th>Industry Vertical</th>
                                        <th>Problem Statement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $sql1 = "SELECT a.*, a.uniqueApplicant AS AuniqueApplicant, a.status AS applicantStatus, a.createAt AS applicantCreatedAt, p.*, p.status AS pointsStatus, p.createAt AS pointsCreatedAt FROM applicant a LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant ORDER BY FIELD(a.category, 'Startup') DESC, a.uniqueApplicant IS NULL, p.uniqueApplicant";
                                    $sql1 = $sql;
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
                                            $category1 = $row1['category'];
                                            $applying = $row1['applying'];
                                            $industry = $row1['industry'];
                                            $problemsStatement1 = $row1['problemsStatement'];
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
                                                <td><?= $category1 ?></td>
                                                <td><?= $industry ?></td>
                                                <td><?= $problemsStatement1 ?></td>
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
    $(document).ready(function() {
        $('#data-table').DataTable();
    });

    function downloadApplicantData() {
        window.location.href = 'download_applicant_data.php?ps=<?= $problemsStatement ?>&c=<?= $category ?>&tu=<?= $tecUnique ?>&tg=<?= $tecGroup ?>';
    }
</script>

</html>
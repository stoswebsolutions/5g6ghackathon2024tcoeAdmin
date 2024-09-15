<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['juryId'])) {
    header("Location: home");
    exit();
}
$juryId = $_SESSION['juryId'];
if (!isset($_GET['ua'])) {
    header("Location: home");
    exit();
}
$uniqueApplicant = $_GET['ua'];
$participantId = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/applicantViewe.css" />
    <style>
        .accordion-button:not(.collapsed) {
            background-color: #890989;
            color: #fff;
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
        <div class="row mt-2">
            <?php
            $sql = "SELECT a.*, t.*, d.* FROM applicant a  JOIN technical t ON a.uniqueApplicant = t.uniqueApplicant  JOIN documents d ON a.uniqueApplicant = d.uniqueApplicant WHERE a.uniqueApplicant = '$uniqueApplicant'";
            $result = $conn->query($sql);
            if ($result->num_rows <= 0) {
            ?>
                <div class="col-md-12">
                    <p class="p-3 text-center text-white" style="background-color: rgb(141, 13, 130);">This Participant have no applications.</p>
                </div>
            <?php
            } else {
            ?>
                <div class="col-md-7">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $participantId = $row['uniqueId'];
                    ?>
                        <h5 class="text-center" style="color: #890989;"> <?= htmlspecialchars($row['problemsStatement']) ?></h5>
                        <!-- Accordion structure starts -->
                        <div class="accordion" id="applicationAccordion">
                            <!-- Application Data Accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne<?= $row['uniqueApplicant'] ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne<?= $row['uniqueApplicant'] ?>"
                                        aria-expanded="true" aria-controls="collapseOne<?= $row['uniqueApplicant'] ?>">
                                        Application Data
                                    </button>
                                </h2>
                                <div id="collapseOne<?= $row['uniqueApplicant'] ?>"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne<?= $row['uniqueApplicant'] ?>"
                                    data-bs-parent="#applicationAccordion">
                                    <div class="accordion-body">
                                        <!-- Application Data with validation -->
                                        <?php if (!empty($row['applicantName'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Name</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['applicantName']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['email'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Email</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['email']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['contactNumber'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Phone</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['contactNumber']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['organizationName'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Organization</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['organizationName']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['postalAddress']) || !empty($row['city']) || !empty($row['state'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-12"><label class="h5">Postal Address</label></div>
                                                <div class="col-12">
                                                    <p><?= htmlspecialchars($row['postalAddress']) ?>,
                                                        <?= htmlspecialchars($row['city']) ?> - <?= htmlspecialchars($row['state']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['category'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Category</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['category']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['applying'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Applying For</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['applying']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['industry'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Industry</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['industry']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['otherindustry'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Other Industry</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['otherindustry']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['applicationVerticals'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Other Industry Vertical</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['applicationVerticals']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['website'])): ?>
                                            <div class="row mb-2">
                                                <div class="col-6"><label class="h5">Website</label></div>
                                                <div class="col-6">
                                                    <p><?= htmlspecialchars($row['website']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Technical Data Accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo<?= $row['uniqueApplicant'] ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo<?= $row['uniqueApplicant'] ?>"
                                        aria-expanded="false" aria-controls="collapseTwo<?= $row['uniqueApplicant'] ?>">
                                        Technical Data
                                    </button>
                                </h2>
                                <div id="collapseTwo<?= $row['uniqueApplicant'] ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo<?= $row['uniqueApplicant'] ?>"
                                    data-bs-parent="#applicationAccordion">
                                    <div class="accordion-body">
                                        <!-- Technical Data with validation -->
                                        <?php if (!empty($row['domain'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Domain</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['domain']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['product'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Product/Solution</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['product']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['productFile'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Product File</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['productFile']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['presentationVideo'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Power Point Presentation /two-minute Product Video</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['presentationVideo']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['presentationURL'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">YouTube URL / LinkedIn URL</label></div>
                                                <div class="">
                                                    <p><a href="<?= htmlspecialchars($row['presentationURL']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['technologyLevel'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Technology Level</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['technologyLevel']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['proofPoC'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Proof of Concept</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['proofPoC']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['describeProduct'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Describe Product</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['describeProduct']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['productPatent'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Patent Filed</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['productPatent']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['patentDetails'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Patent Details</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['patentDetails']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['similarProduct'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Similar Product</label></div>
                                                <div class="">
                                                    <p><?= htmlspecialchars($row['similarProduct']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['similarProductFile'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Similar Product File</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['similarProductFile']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Document Data Accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree<?= $row['uniqueApplicant'] ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree<?= $row['uniqueApplicant'] ?>"
                                        aria-expanded="false" aria-controls="collapseThree<?= $row['uniqueApplicant'] ?>">
                                        Document Data
                                    </button>
                                </h2>
                                <div id="collapseThree<?= $row['uniqueApplicant'] ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingThree<?= $row['uniqueApplicant'] ?>"
                                    data-bs-parent="#applicationAccordion">
                                    <div class="accordion-body">
                                        <!-- Document Data with validation -->
                                        <?php if (!empty($row['shareholding'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Shareholding Document</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['shareholding']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['incorporation'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">Incorporation Certificate</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['incorporation']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($row['idProof'])): ?>
                                            <div class="row mb-2">
                                                <div class=""><label class="h5">ID Proof</label></div>
                                                <div class="">
                                                    <p><a href="https://5g6g-hackathon2024.tcoe.in/<?= htmlspecialchars($row['idProof']) ?>" target="_blank">Click Here</a></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion structure ends -->
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <h5 class="text-center">Review and Assign Marks</h5>
                    <?php
                    $sql1 = "SELECT * FROM points where uniqueApplicant = '$uniqueApplicant'";
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                    ?>
                            <div class="table-responsive shadow">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Idea Originality: Novelty and innovation of the solution. (30%)</th>
                                        <td class="bg-success text-white rounded"><?= $row1['criteria1'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Problem Relevance: How well the solution addresses a real-world problem. (30%)</th>
                                        <td class="bg-success text-white rounded"><?= $row1['criteria2'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Technical Feasibility: Practicality and viability of the solution. (15%)</th>
                                        <td class="bg-success text-white rounded"><?= $row1['criteria3'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Team Skill Set: Balance of technical, domain, and entrepreneurial skills. (15%)</th>
                                        <td class="bg-success text-white rounded"><?= $row1['criteria4'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Prior Hackathon Experience: Experience in rapid prototyping and time constraints. (10%)</th>
                                        <td class="bg-success text-white rounded"><?= $row1['criteria5'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bg-success text-white rounded text-center">
                                            <?php
                                            if ($row1['status'] == 1) {
                                                echo "Hold";
                                            }
                                            if ($row1['status'] == 2) {
                                                echo "Accepted";
                                            }
                                            if ($row1['status'] == 3) {
                                                echo "Rejected";
                                            }
                                            ?>
                                            <spna class="text-warning">Total Marks: (<?= $row1['totalPoints'] ?>) </spna>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center text-success"><?= $row1['comments'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <form action="points" method="post" onsubmit="return validateForm()">
                            <input type="hidden" name="juryId" id="juryId" value="<?= $juryId ?>">
                            <input type="hidden" name="participantId" id="participantId" value="<?= $participantId ?>">
                            <input type="hidden" name="uniqueApplicant" id="uniqueApplicant" value="<?= $uniqueApplicant ?>">
                            <div class="table-responsive shadow">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Idea Originality: Novelty and innovation of the solution. (30%)</th>
                                        <td><input type="number" class="form-control" style="width: 75px;" min="0" max="30" name="criteria1" id="criteria1" required></td>
                                        <td class="text-danger">Max&nbsp;Points <= 30</td>
                                    </tr>
                                    <tr>
                                        <th>Problem Relevance: How well the solution addresses a real-world problem. (30%)</th>
                                        <td><input type="number" class="form-control" style="width: 75px;" min="0" max="30" name="criteria2" id="criteria2" required></td>
                                        <td class="text-danger">Max&nbsp;Points <= 30</td>
                                    </tr>
                                    <tr>
                                        <th>Technical Feasibility: Practicality and viability of the solution. (15%)</th>
                                        <td><input type="number" class="form-control" style="width: 75px;" min="0" max="15" name="criteria3" id="criteria3" required></td>
                                        <td class="text-danger">Max&nbsp;Points <= 15</td>
                                    </tr>
                                    <tr>
                                        <th>Team Skill Set: Balance of technical, domain, and entrepreneurial skills. (15%)</th>
                                        <td><input type="number" class="form-control" style="width: 75px;" min="0" max="15" name="criteria4" id="criteria4" required></td>
                                        <td class="text-danger">Max&nbsp;Points <= 15</td>
                                    </tr>
                                    <tr>
                                        <th>Prior Hackathon Experience: Experience in rapid prototyping and time constraints. (10%)</th>
                                        <td><input type="number" class="form-control" style="width: 75px;" min="0" max="10" name="criteria5" id="criteria5" required></td>
                                        <td class="text-danger">Max&nbsp;Points <= 10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <select name="status" id="status" class="form-select" required>
                                                <option selected disabled value="">Select</option>
                                                <option value="1">Hold</option>
                                                <option value="2">Accepted</option>
                                                <option value="3">Rejected</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea class="form-control" name="comments" id="comments" required placeholder="Review Comments"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center"><input type="submit" class="btn btn-success" value="Submit"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            let criteria1 = document.getElementById('criteria1').value;
            let criteria2 = document.getElementById('criteria2').value;
            let criteria3 = document.getElementById('criteria3').value;
            let criteria4 = document.getElementById('criteria4').value;
            let criteria5 = document.getElementById('criteria5').value;

            // Check if criteria are within valid ranges
            if (criteria1 > 30 || criteria1 < 0) {
                alert("Idea Originality must be between 0 and 30.");
                return false;
            }
            if (criteria2 > 30 || criteria2 < 0) {
                alert("Problem Relevance must be between 0 and 30.");
                return false;
            }
            if (criteria3 > 15 || criteria3 < 0) {
                alert("Technical Feasibility must be between 0 and 15.");
                return false;
            }
            if (criteria4 > 15 || criteria4 < 0) {
                alert("Team Skill Set must be between 0 and 15.");
                return false;
            }
            if (criteria5 > 10 || criteria5 < 0) {
                alert("Prior Hackathon Experience must be between 0 and 10.");
                return false;
            }
            return true;
        }
        // var criteria1 = document.getElementById("criteria1");
        // criteria1.addEventListener("blur", function() {
        //     if (criteria1.value > 30) {
        //         alert("Max points 30");
        //     }
        // });

        // var criteria2 = document.getElementById("criteria2");
        // criteria2.addEventListener("blur", function() {
        //     if (criteria2.value > 30) {
        //         alert("Max points 30");
        //     }
        // });

        // var criteria3 = document.getElementById("criteria3");
        // criteria3.addEventListener("blur", function() {
        //     if (criteria3.value > 15) {
        //         alert("Max points 15");
        //     }
        // });

        // var criteria4 = document.getElementById("criteria4");
        // criteria4.addEventListener("blur", function() {
        //     if (criteria4.value > 15) {
        //         alert("Max points 15");
        //     }
        // });

        // var criteria5 = document.getElementById("criteria5");
        // criteria5.addEventListener("blur", function() {
        //     if (criteria5.value > 10) {
        //         alert("Max points 10");
        //     }
        // });
    </script>
</body>

</html>
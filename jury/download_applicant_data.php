<?php
// Include database connection
include '../db_connect.php';

// Set headers to force download as CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="applicant_data.csv"');

// Output CSV headers
$output = fopen("php://output", "w");
fputcsv($output, array(
    'Full Name',
    'Contact Number',
    'Email',
    'I am',
    'Registration',
    'Application Completed',
    'Organization Name',
    'City',
    'State',
    'Postal Address',
    'Category',
    'Applying as',
    'Industry Vertical',
    'Other Industry Vertical (if any)',
    'Problems Statement',
    'Application Verticals(If Suo Moto)',
    'Website/LinkedIn',
    'Domain',
    'Your Product/Solution',
    'Product/Solution File',
    'Power Point Presentation/Video',
    'YouTube URL / LinkedIn URL(If any)',
    'Technology Readiness Level',
    'Proof of Concept',
    'products classifies as a 5G and Beyond usecase',
    'patent for your product/solution',
    'Patent Details(If Yes)',
    'Similar product/ solution available',
    'Similar Product File(If Yes)',
    '51% shareholding by Indian citizen',
    'Incorporation Certificate',
    'ID Proof/ Passport',
    'create Date',
    'Jury Name',
    'Criteria 1',
    'Criteria 2',
    'Criteria 3',
    'Criteria 4',
    'Criteria 5',
    'Total Marks',
    'Status',
    'Comments'
));

// File Path
$base_url = 'https://5g6g-hackathon2024.tcoe.in/';

// Fetch applicant table data based on the query
$sql = "SELECT fullname,u.mobile,u.email,u.categoryType,u.uniqueId AS UuniqueId,a.uniqueId AS AuniqueId,a.organizationName,a.city,a.state,a.postalAddress,a.category,a.applying,a.industry,a.otherindustry,a.problemsStatement,a.applicationVerticals,a.website,
            t.domain, t.product, t.productFile,t.presentationVideo, t.presentationURL, t.technologyLevel,t.proofPoC, t.describeProduct, t.productPatent,t.patentDetails, t.similarProduct, t.similarProductFile,
            d.shareholding, d.incorporation, d.idProof,a.createAt,
            p.juryId, p.criteria1, p.criteria2, p.criteria3, p.criteria4, p.criteria5, p.totalPoints, p.status, p.comments FROM users u 
            LEFT JOIN applicant a ON  u.uniqueId = a.uniqueId 
            LEFT JOIN technical t ON a.uniqueApplicant = t.uniqueApplicant 
            LEFT JOIN documents d ON a.uniqueApplicant = d.uniqueApplicant 
            LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant 
            WHERE u.role = 'participant' and a.status=1 GROUP BY a.email, a.problemsStatement ORDER BY a.uniqueId IS NULL,u.uniqueId";
if (isset($_GET['ps']) && isset($_GET['c'])) {
    $problemsStatement = $_GET['ps'];
    $category = $_GET['c'];
    $sql = "SELECT fullname,u.mobile,u.email,u.categoryType,u.uniqueId AS UuniqueId,a.uniqueId AS AuniqueId,a.organizationName,a.city,a.state,a.postalAddress,a.category,a.applying,a.industry,a.otherindustry,a.problemsStatement,a.applicationVerticals,a.website,
            t.domain, t.product, t.productFile,t.presentationVideo, t.presentationURL, t.technologyLevel,t.proofPoC, t.describeProduct, t.productPatent,t.patentDetails, t.similarProduct, t.similarProductFile,
            d.shareholding, d.incorporation, d.idProof,a.createAt,
            p.juryId, p.criteria1, p.criteria2, p.criteria3, p.criteria4, p.criteria5, p.totalPoints, p.status, p.comments FROM users u 
            LEFT JOIN applicant a ON  u.uniqueId = a.uniqueId 
            LEFT JOIN technical t ON a.uniqueApplicant = t.uniqueApplicant 
            LEFT JOIN documents d ON a.uniqueApplicant = d.uniqueApplicant 
            LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant 
            WHERE u.role = 'participant' and a.status=1 and a.category = '$category' and a.problemsStatement = '$problemsStatement' GROUP BY a.email, a.problemsStatement ORDER BY a.uniqueId IS NULL,u.uniqueId";
} else if (isset($_GET['c'])) {
    $category = $_GET['c'];
    $sql = "SELECT fullname,u.mobile,u.email,u.categoryType,u.uniqueId AS UuniqueId,a.uniqueId AS AuniqueId,a.organizationName,a.city,a.state,a.postalAddress,a.category,a.applying,a.industry,a.otherindustry,a.problemsStatement,a.applicationVerticals,a.website,
            t.domain, t.product, t.productFile,t.presentationVideo, t.presentationURL, t.technologyLevel,t.proofPoC, t.describeProduct, t.productPatent,t.patentDetails, t.similarProduct, t.similarProductFile,
            d.shareholding, d.incorporation, d.idProof,a.createAt,
            p.juryId, p.criteria1, p.criteria2, p.criteria3, p.criteria4, p.criteria5, p.totalPoints, p.status, p.comments FROM users u 
            LEFT JOIN applicant a ON  u.uniqueId = a.uniqueId 
            LEFT JOIN technical t ON a.uniqueApplicant = t.uniqueApplicant 
            LEFT JOIN documents d ON a.uniqueApplicant = d.uniqueApplicant 
            LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant 
            WHERE u.role = 'participant' and a.status=1 and a.category = '$category' GROUP BY a.email, a.problemsStatement ORDER BY a.uniqueId IS NULL,u.uniqueId";
} else if (isset($_GET['ps'])) {
    $problemsStatement = $_GET['ps'];
    $sql = "SELECT fullname,u.mobile,u.email,u.categoryType,u.uniqueId AS UuniqueId,a.uniqueId AS AuniqueId,a.organizationName,a.city,a.state,a.postalAddress,a.category,a.applying,a.industry,a.otherindustry,a.problemsStatement,a.applicationVerticals,a.website,
            t.domain, t.product, t.productFile,t.presentationVideo, t.presentationURL, t.technologyLevel,t.proofPoC, t.describeProduct, t.productPatent,t.patentDetails, t.similarProduct, t.similarProductFile,
            d.shareholding, d.incorporation, d.idProof,a.createAt,
            p.juryId, p.criteria1, p.criteria2, p.criteria3, p.criteria4, p.criteria5, p.totalPoints, p.status, p.comments FROM users u 
            LEFT JOIN applicant a ON  u.uniqueId = a.uniqueId 
            LEFT JOIN technical t ON a.uniqueApplicant = t.uniqueApplicant 
            LEFT JOIN documents d ON a.uniqueApplicant = d.uniqueApplicant 
            LEFT JOIN points p ON a.uniqueApplicant = p.uniqueApplicant 
            WHERE u.role = 'participant' and a.status=1 and a.problemsStatement = '$problemsStatement' GROUP BY a.email, a.problemsStatement ORDER BY a.uniqueId IS NULL,u.uniqueId";
}

$result = $conn->query($sql);

// Output each row of data as CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['mobile'] = '' . $row['mobile'];
        $juryId = $row['juryId'];
        $q1 = "SELECT * FROM users where uniqueId ='$juryId' ";
        $res1 = $conn->query($q1);
        if ($res1->num_rows > 0) {
            $r1 = $res1->fetch_assoc();
            $row['juryId'] = $r1['email'];
        }

        if ($row['UuniqueId'] == "") {
            $row['UuniqueId'] = "Pending";
        } else {
            $row['UuniqueId'] = "Completed";
        }
        if ($row['AuniqueId'] == "") {
            $row['AuniqueId'] = "Yet to be Completed";
        } else {
            $row['AuniqueId'] = "Completed";
        }
        if ($row['status'] == 1) {
            $row['status'] = "Hold";
        }
        if ($row['status'] == 2) {
            $row['status'] = "Accepted";
        }
        if ($row['status'] == 3) {
            $row['status'] = "Rejected";
        }

        $row['productFile'] = !empty($row['productFile']) ? '=HYPERLINK("' . $base_url . $row['productFile'] . '", "Click Here Product File")' : '';
        $row['presentationVideo'] = !empty($row['presentationVideo']) ? '=HYPERLINK("' . $base_url . $row['presentationVideo'] . '", "Click Here Presentation Video")' : '';
        $row['presentationURL'] = !empty($row['presentationURL']) ? '=HYPERLINK("' . $base_url . $row['presentationURL'] . '", "Click Here Presentation URL")' : '';
        $row['proofPoC'] = !empty($row['proofPoC']) ? '=HYPERLINK("' . $base_url . $row['proofPoC'] . '", "Click Here Proof of Concept")' : '';
        $row['similarProductFile'] = !empty($row['similarProductFile']) ? '=HYPERLINK("' . $base_url . $row['similarProductFile'] . '", "Click Here Similar Product File")' : '';
        $row['shareholding'] = !empty($row['shareholding']) ? '=HYPERLINK("' . $base_url . $row['shareholding'] . '", "Click Here Shareholding")' : '';
        $row['incorporation'] = !empty($row['incorporation']) ? '=HYPERLINK("' . $base_url . $row['incorporation'] . '", "Click Here Incorporation Certificate")' : '';
        $row['idProof'] = !empty($row['idProof']) ? '=HYPERLINK("' . $base_url . $row['idProof'] . '", "Click Here ID Proof")' : '';
        fputcsv($output, $row);
    }
}

// Close the output stream
fclose($output);
exit;

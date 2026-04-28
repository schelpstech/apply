<?php
require "../query.php"; // starts session + loads $model

header('Content-Type: application/json');

if (isset($_GET['degree'])) {

    $degree = trim($_GET['degree']);

    // Whitelist validation (important)
    $allowed = ['PGD', 'MSc', 'MBA', 'PhD'];
    if (!in_array($degree, $allowed)) {
        echo json_encode([]);
        exit;
    }

    $courses = $model->getRows("courses", [
        "where" => [
            "degree_type" => $degree,
            "is_active" => 1
        ],
        "order_by" => "course_name ASC"
    ]);

    // Return only needed fields (clean API)
    $result = [];

    if (!empty($courses)) {
        foreach ($courses as $c) {
            $result[] = [
                "course_id" => $c['course_id'],
                "course_name" => $c['course_name']
            ];
        }
    }

    echo json_encode($result);
    exit;
}

echo json_encode([]);

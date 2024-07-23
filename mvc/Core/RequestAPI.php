<?php
header('Content-Type: application/json');
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $datarequest = json_decode(file_get_contents('php://input'), true);
    $name = $datarequest['name'];
    if ($name == 'chapter') {

        $idclass = $datarequest['idclass'];
        $idsubject = $datarequest['idsubject'];

        $sql = "select * from chapters where levels_id = $idclass and subjects_id = $idsubject";
        $stmt = $db->query($sql);
        $datares = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo json_encode($datares);

    } elseif ($name == 'subject') {
        echo json_encode(['day la subject']);

    } else {
            echo json_encode(['khong co nao duoc chon']);
    }

}

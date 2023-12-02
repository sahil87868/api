<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_data') {
    
    echo json_encode(['data' => 'Your data from the MVC project']);
}
?>

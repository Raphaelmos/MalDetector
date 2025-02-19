<?php
require 'VirusTotalAPI.php'; // Include the VirusTotalAPI class

header('Content-Type: application/json');

$apiKey = 'YOUR_API_KEY'; // Replace with your actual API key
$vtApi = new VirusTotalAPI($apiKey);

$data = json_decode(file_get_contents('php://input'), true);
$url = $data['url'] ?? '';

// Validate the URL
if (filter_var($url, FILTER_VALIDATE_URL)) {
    $response = $vtApi->scanURL($url);
    echo json_encode($response);
} else {
    echo json_encode(['response_code' => -1, 'message' => 'Invalid URL']);
}
?>

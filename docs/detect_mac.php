<?php
header('Content-Type: application/json');
$mac = $_GET['mac'] ?? '';

function is_random_mac($mac) {
    $parts = explode(':', $mac);
    if (count($parts) !== 6) return true;
    $firstByte = hexdec($parts[0]);
    return ($firstByte & 0x02) === 0x02;
}

echo json_encode([
    'mac' => $mac,
    'is_random' => is_random_mac($mac)
]);
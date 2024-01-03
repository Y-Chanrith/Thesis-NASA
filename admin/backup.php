<?php
session_start();

// Your database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nasa_computer_shop');

// Directory to store backup files
define('DIR', 'C:\Thesis/');

// Google Drive API settings
$clientId ='701969510453-0i7ommn75s7jqqaoiq7khr446ucdbst0.apps.googleusercontent.com';
$clientSecret ='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';
$redirectUri ='https://developers.google.com/oauthplayground';

// Google Drive API endpoints
$tokenEndpoint = 'https://www.googleapis.com/oauth2/v4/token';
$uploadEndpoint = 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart';

// Google Drive API credentials
$refreshToken = '1//046hsAppAsPgXCgYIARAAGAQSNwF-L9Ir5FMH404z9GUxUw7gcihWaEVO5CUEHzToevtlCmP6UhvrQ64EF_wO-L0P9k-8Em9YDb0';

// Set the timezone
date_default_timezone_set("Asia/Bangkok");

// Create a backup file
$date = date('Y-m-d_H-i-s');
$backup_file = DB_NAME . '-' . $date . '.sql';
$backup_path = DIR . $backup_file;

$command = "C:\wampserver\bin\mysql\mysql5.7.40\bin/mysqldump --user=" . DB_USER . " --password=" . DB_PASS . " " . DB_NAME . " > " . $backup_path;
system($command);

if (!$command) {
    echo "Backup File Fail!!";
} else {
    // Get access token using curl
    $accessToken = getAccessToken($clientId, $clientSecret, $refreshToken, $tokenEndpoint);

    // Upload the backup file to Google Drive using curl
    uploadFile($accessToken, $uploadEndpoint, $backup_path);
var_dump($accessToken);
    // Redirect after the upload
    // header("Location: ../admin/backup_data.php");
}

function getAccessToken($clientId, $clientSecret, $refreshToken, $tokenEndpoint) {
    $postData = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'refresh_token' => $refreshToken,
        'grant_type' => $refreshToken,
    ];

    $ch = curl_init($tokenEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL error: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);

        if (isset($data['access_token'])) {
            echo "Access Token: " . $data['access_token'];
            return $data['access_token'];
        } else {
            echo "Error in response: " . $response;
            return null;
        }
    }

    curl_close($ch);
}

function uploadFile($accessToken, $uploadEndpoint, $filePath) {
    $ch = curl_init($uploadEndpoint);

    $headers = [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ];

    $postData = [
        'name' => $filePath,
    ];

    $postData = json_encode($postData);

    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Content-Length: ' . strlen($postData);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($filePath));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL error: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);

        if (isset($data['id'])) {
            echo "File uploaded successfully. File ID: " . $data['id'] . "\n";
        } else {
            echo "Error uploading file.\n";
        }
    }

    curl_close($ch);
}


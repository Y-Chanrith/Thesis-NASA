<?php
session_start();

// Your database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nasa_computer_shop');

// define('DIR', 'C:/xampp/htdocs/Thesis/admin/backupDB/');
    // define('DIR', 'D:\DB_backUp/');
    define('DIR', 'C:\Thesis/');
    // GOOGLE_DRIVE_CLIENT_ID=762089516501-u9jsj6ei768jbvepanrvp8f3ojk9pegp.apps.googleusercontent.com
    // GOOGLE_DRIVE_CLIENT_SECRET=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
    // GOOGLE_DRIVE_REFRESH_TOKEN=1//04ZOYSYlUnZ1DCgYIARAAGAQSNwF-L9IrQgJBcgffgbvRqhJD2deutkQBxCxGQAR0LoBqFXyuciYW7aXlAKt_5U5tB7SrfmZiO9k
// Google Drive API settings
$clientId ='701969510453-0i7ommn75s7jqqaoiq7khr446ucdbst0.apps.googleusercontent.com';
$clientSecret ='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';

// $clientId ='762089516501-u9jsj6ei768jbvepanrvp8f3ojk9pegp.apps.googleusercontent.com';
// $clientSecret ='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';

$redirectUri ='https://developers.google.com/oauthplayground';

// Google Drive API endpoints
$tokenEndpoint = 'https://www.googleapis.com/oauth2/v4/token';
$uploadEndpoint = 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart';

// Google Drive API credentials
$refreshToken = '1//046hsAppAsPgXCgYIARAAGAQSNwF-L9Ir5FMH404z9GUxUw7gcihWaEVO5CUEHzToevtlCmP6UhvrQ64EF_wO-L0P9k-8Em9YDb0';

// $refreshToken = '1//04ZOYSYlUnZ1DCgYIARAAGAQSNwF-L9IrQgJBcgffgbvRqhJD2deutkQBxCxGQAR0LoBqFXyuciYW7aXlAKt_5U5tB7SrfmZiO9k';


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
// var_dump($accessToken);
    // Redirect after the upload
    // header("Location: ../admin/backup_data.php");
}

function getAccessToken($clientId, $clientSecret, $refreshToken, $tokenEndpoint) {
    $postData = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'refresh_token' => $refreshToken,
        'grant_type' => 'refresh_token',
    ];

    $ch = curl_init($tokenEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL error: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);

        if (isset($data['access_token'])) {
            // echo "Access Token: " . $data['access_token'];
            return $data['access_token'];
        } else {
            // echo "Error in response: " . $response;
            return null;
        }
    }

    curl_close($ch);
}



function uploadFile($accessToken, $uploadEndpoint, $filePath) {
    // Check if the file exists and can be opened
    if (!file_exists($filePath) || !is_readable($filePath)) {
        echo "Error: File does not exist or cannot be opened.\n";
        return;
    }


    // Create cURL resource
    $ch = curl_init($uploadEndpoint);

    // Set cURL options
    $headers = [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ];

    // Metadata for the file being uploaded
    $fileMetadata = [
        'name' => 'backup.sql',  // Change the filename if needed
    ];

    // Convert metadata to JSON
    $fileMetadataJson = json_encode($fileMetadata);

    // Add the Content-Length header
    $headers[] = 'Content-Length: ' . strlen($fileMetadataJson);
    // var_dump( $fileMetadataJson);

    // Set headers using CURLOPT_HTTPHEADER
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileMetadataJson);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Read file content and set it as the POST field
    $fileContent = file_get_contents($filePath);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileContent);

    // Execute cURL and capture the result
    $response = curl_exec($ch);
    // var_dump($response);
    // Check for cURL errors
    if ($response === false) {
        echo "cURL error: " . curl_error($ch) . "\n";
    } else {
        $data = json_decode($response, true);
        if (isset($data['id'])) {
            echo "File uploaded successfully. File ID: " . $data['id'] . "\n";
        } else {
            echo "Error uploading file.\n";
        }
    }

    // Close cURL handle
    curl_close($ch);
}

// function uploadFile($accessToken, $uploadEndpoint, $filePath) {
//     // Check if the file exists and can be opened
//     if (!file_exists($filePath) || !is_readable($filePath)) {
//         echo "Error: File does not exist or cannot be opened.\n";
//         return;
//     }

//     // Create cURL resource
//     $ch = curl_init($uploadEndpoint);

//     // Set cURL options
//     $headers = [
//         'Authorization: Bearer ' . $accessToken,
//         'Content-Type: application/json',
//     ];

//     // Metadata for the file being uploaded
//     $fileMetadata = [
//         'name' => 'backup.sql',  // Change the filename if needed
//     ];

//     // Convert metadata to JSON
//     $fileMetadataJson = json_encode($fileMetadata);

//     // Add the Content-Length header
//     $headers[] = 'Content-Length: ' . strlen($fileMetadataJson);

//     // Set headers using CURLOPT_HTTPHEADER
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//     // Set cURL options
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//     $fileContent = file_get_contents($filePath);
//     // Set both metadata and file content as POST fields
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $fileMetadataJson . $fileContent);

//     // Set the option to receive the response as a string
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//     // Execute cURL and capture the result
//     $response = curl_exec($ch);

//     // Check for cURL errors
//     if ($response === false) {
//         echo "cURL error: " . curl_error($ch) . "\n";
//     } else {
//         $data = json_decode($response, true);
//         if (isset($data['id'])) {
//             echo "File uploaded successfully. File ID: " . $data['id'] . "\n";
//         } else {
//             echo "Error uploading file.\n";
//         }
//     }

//     // Close cURL handle
//     curl_close($ch);
// }






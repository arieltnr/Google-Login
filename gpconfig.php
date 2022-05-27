<?php 
session_start(); // Include Librari Google Client (API)

include_once 'libraries/google-client/google-client/Google_Client.php';
include_once 'libraries/google-client/google-client/contrib/Google_Oauth2Service.php';

$client_id = '459970845985-jbfd16vojiohg9ijjb4r645ktc043koj.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/refactory/google.php'; // Callback URL// Call Google API

$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
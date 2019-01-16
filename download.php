<?php // download.php
require_once ('core/init.php');
$file = escape($_GET['vid']);

if (file_exists($file)) {
    // send headers that indicate file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    // send file (must read comments): http://php.net/manual/en/function.readfile.php
    readfile($file);
    exit;
}
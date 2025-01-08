<?php

// Header content type
$finfo = pathinfo($_GET['document']);
$filename = $finfo['filename'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

// Read the file
$file = $_GET['document'];
@readfile($file);


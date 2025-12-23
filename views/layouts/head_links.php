<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$domainName = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['SCRIPT_NAME']);

$path = str_replace('\\', '/', $path);

if (substr($path, -1) !== '/') {
  $path .= '/';
}

$base = $protocol . $domainName . $path;
?>

<base href="<?php echo $base; ?>">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Best Icons for developers</title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="assets/vendors/selectFX/css/cs-skin-elastic.css">
<link rel="stylesheet" href="assets/vendors/chosen/chosen.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<link href='https://fonts.google.com/icons?selected' rel='stylesheet' type='text/css'>
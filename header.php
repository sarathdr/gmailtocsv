<!doctype html>
<html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/jumb.css" type="text/css" media="screen" title="no title" charset="utf-8">

</head>
<body>
<div class="container">
    <div class="header">
       <ul class="nav nav-pills pull-right">
         <li class="active"><a href="#">Home</a></li>
		 <?php   if(isset($_SESSION['access_token'])): ?>
         <li><a href="logout.php">Logout</a></li>
		 <?php endif; ?>
       </ul>
       <h3 class="text-muted">Gmail - Download email as CSV </h3>
     </div>
	
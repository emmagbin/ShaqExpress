<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $status_code; ?></title>
<link rel="stylesheet" type="text/css" href="assets/errorStyle.css">
<body class="loading">
  <!-- <h1>404</h1> -->

  
  <h1> <?php echo $status_code; ?></h1>
  <h2><?php echo $message; ?> </h2>
  <div class="gears">
    <div class="gear one">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="gear two">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="gear three">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>
  <script src="assets/error.js" type="text/javascript"></script>
    <script>
    $(function() {
  setTimeout(function(){
    $('body').removeClass('loading');
  }, 1000);
});
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Siaga Stempat</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/datepicker3.css" />
  
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><?php echo (isset($title))? ucwords($title) : 'Untitled';?></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
        if (isset($menu) && !is_null($menu)) {
            foreach ($menu as $key => $value) { ?>
              <li><a href="<?php echo $value;?>"><?php echo ucfirst($key);?></a></li>
            <?php 
          }
        }?>
      </ul>
      <?php if(isset($user)): ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $user['user_name'];?></a></li>
        <form class="navbar-form navbar-right">
        <a href="logout.php" type="submit" class="btn btn-default">Logout</a>
      </form>
      </ul>
      <?php endif;?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php echo (isset($notif))? $notif : '';?>
<div class="container">
  <div class="row">
      <?php echo (isset($content))? $content : 'no content laoded';?>
  </div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.id.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
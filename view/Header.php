
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="<?php echo SITE_ROOT;?>/css/style.css" type="text/css" rel="stylesheet" />
    
    <title>Привет товарищи АСУшники</title>
  </head>
  <body>

	<div class="header ">
        <div class="row">
            <div class="col-xs-10" style="margin: 25px;"> 
                <h1 style="padding: 15px 40px;">СКУД отдела АСУ</h1>              
            </div>      
            <div>
                <p><?php if($_SESSION['user']){ echo "Вы зашли как ".$_SESSION['user']['fullname']." ";}?></p>
            </div>
            <?php if($_SESSION['user']):?>
            <a href="<?php echo SITE_ROOT?>/login/logout.php?logout=yes" onClick="javascript:return confirm('Вы уверены, что хотите разлогиниться?');">
                <button class="form-button">Выйти</button>
            </a>
            <?php endif;?>
            <?php if($_SESSION['user']['priv'] == 1):?>
       <div> 
            <a href="<?php echo SITE_ROOT;?>/admin/">
                <button class="form-button">Админка</button>
            </a>
       </div><br>
    <?php endif;?>
        </div>
    </div>


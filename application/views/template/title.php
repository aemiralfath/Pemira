
<!DOCTYPE html>
<html lang="en">    
<head>
    <title><?=$title?></title>
    <link rel="shortcut icon" href=<?= base_url("assets/frontpage/img/favicon.png")?> />
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport content=" width="device-width, initial-scale=1">
<meta name="M. Ridwan Zalbina" content="root" >


<link rel="stylesheet" href=<?= base_url("assets/frontpage/bootstrap/css/bootstrap.min.css") ?>>
<link href=<?= base_url("assets/frontpage/css/style.css") ?> rel="stylesheet" type="text/css">
<link href=<?= base_url("assets/frontpage/css/careers.css")?> rel="stylesheet" type="text/css">
<link href=<?= base_url("assets/frontpage/css/animate.css")?> type="text/css" rel="stylesheet">
<link href=<?= base_url("assets/frontpage/css/font-awesome.min.css")?> type="text/css" rel="stylesheet"> 
<link href='http://fonts.googleapis.com/css?family=Lato:300,400|Lato+Text' rel='stylesheet' type='text/css'>
<body><nav class="navbar navbar-default navbar-top navbar-shadow navbar-custom" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-left" href=<?=base_url()?>><img src=<?= base_url("assets/frontpage/img/logo_main.png")?> class="logo" alt="akad"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                        if($content == 'table'){
                            ?>
                                <a href="<?=site_url('logout');?>">Logout</a>
                            <?php
                        }
                    ?>
                    
                </li>
            </ul>
        </div>
    </div>
</nav><div class="banner-job">
    <div class="banner-overlay"></div>
    <div class="container text-center">
        <h1 class="title">Intern at <b>Scafol</b></h1>
        <h3>Work with Purpose</h3>
    </div>
</div>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/main.css"  media="screen,projection"/>
    </head>

    <body>
        <div class="navbar-fixed">
            <nav class="white">
                <div class="nav-wrapper container">
                    <a class="brand-logo black-text"  href="<?php $data['link'] ?>" ><i class="material-icons black-text">dashboard</i>CertiSys Template</a>
                </div>
            </nav>
        </div>
        <div class="container"><?php echo"".$data['link'].""?></div>

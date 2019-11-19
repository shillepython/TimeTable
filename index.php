<?php
session_start();
use app\UserObject;
include "autoload.php";
$userObject = new UserObject();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="public/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrap">
<div class="wrapper">
    <nav class="cyan lighten-2">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center"><img src="http://kitit.com.ua/wp-content/uploads/2018/12/cropped-logo_kit_w-1.png" width="65" height="65" alt=""></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="http://kitit.com.ua/">kitit.com.ua</a></li>
                </ul>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/">Registation</a></li>
                    <li><a href="signin">Sign in</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="http://kitit.com.ua/">kitit.com.ua</a></li>
                    <li><a href="/">Registation</a></li>
                    <li><a href="signin">Sign in</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="wrap-center">
            <div class="group-header">
                <h1>KIT-IT</h1>
                <span>Смотри расписание заняйти в любое удобное время</span>
                <div class="btn-header">
                    <button>Зарегистрироватся</button>
                </div>
            </div>
        </div>
        <div class="cont">
            <div class="mouse">
                <span></span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="wrap" style="height: 100vh;">

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="public/js/materialize.min.js"></script>
<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav();
    })

    var anchors = [];
    var currentAnchor = -1;
    var isAnimating  = false;

    $(function(){

        function updateAnchors() {
            anchors = [];
            $('.wrap').each(function(i, element){
                anchors.push( $(element).offset().top );
            });
        }

        $('body').on('mousewheel', function(e){
            e.preventDefault();
            e.stopPropagation();
            if( isAnimating ) {
                return false;
            }
            isAnimating  = true;
            // Increase or reset current anchor
            if( e.originalEvent.wheelDelta >= 0 ) {
                currentAnchor--;
            }else{
                currentAnchor++;
            }
            if( currentAnchor > (anchors.length - 1)
                || currentAnchor < 0 ) {
                currentAnchor = 0;
            }
            isAnimating  = true;
            $('html, body').animate({
                scrollTop: parseInt( anchors[currentAnchor] )
            }, 500, 'swing', function(){
                isAnimating  = false;
            });
        });

        updateAnchors();

    });
</script>
</body>
</html>
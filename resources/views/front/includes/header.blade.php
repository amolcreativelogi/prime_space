<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pryme Space</title>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/custom.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/animate.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet"> 
</head>
<body class="<?php echo   (URL::to('/') == Request::url()) ? 'home' : ''; ?>">
<header class="site-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12 logodiv">
        <a href="{{ URL::to('/') }}" class="logo"><img src="{{ URL::asset('public') }}/assets/front-design/images/psw-logo.png" alt=""></a>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12 menudiv">
         <nav class="navbar navbar-default pullright">
            <ul class="nav navbar-nav">
              <li class="demandpark"><a href="all-property.html">Try on-demand parking</a></li>
              <li class="dropdown"><a href="#" dropdown-toggle" data-toggle="dropdown">Get started <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Get started</a></li>
                <li><a href="#">Get started</a></li>
                <li><a href="#">Get started</a></li>
              </ul>
              </li>
              <li><a href="#">Help</a></li>
              <li><a href="{{ URL::asset('sign_up') }}/">Sign up</a></li>
              <li><a href="{{ URL::asset('login') }}/">Log in</a></li>
            </ul>
        </nav>
      </div>
    </div>
  </div>
</header><!-- site-header -->
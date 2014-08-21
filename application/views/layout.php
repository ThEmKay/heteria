<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>&copy; 2014</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        
        .alert{
            margin-bottom: 10px;
            padding: 5px
        } 
        
        .nopad-l{
            padding-left: 0px !important
        }
        
        .nopad-r{
            padding-right: 0px !important
        }
        
        .thumbnail{
            min-height: 120px;
            background-color: #d4d4d4 !important
        }
        
        .maintop{
            background-color: #efebe2 !important;
            margin-bottom: 0 !important
        }
        
        .mainnav{
            background-color: #e6e6de !important;
            border-radius: 0;
        }
        
        .mainnav li{
            padding: 15px 0px 15px 0px;
            font-size: 110%
        }
        
        .mainnav li.active{
            font-weight: bold !important;
            text-decoration: underline !important
        }
        
        .navbar-brand{
            margin: 0px 10px 0px 10px !important
        }
        
        .subnav{
            background-color: #eeebe4 !important;
        }        
        
        
        .container-small{
            margin: 0px 10px 40px 10px;
            background-color: #ececec !important;
            padding-bottom: 10px;
            text-align: justify
        }
        
        .container-full{
            margin: 0px 10px 40px 10px;
            background-color: #ececec !important;
            border-right: 20px solid #f8f5ec;
            padding-bottom: 10px           
        }
        
        .container-medium{
            margin: 0px 10px 40px 10px;
            background-color: transparent !important;
            padding-bottom: 10px;
            text-align: justify;
            vertical-align: middle;
        }
        
        h4{
            padding-top: 20px;
            padding-bottom: 20px;
            color: #695f56
        }
        /*
        .nav li a{
            color: #fff !important
        }
        
        .nav li:hover{
            background-color: green !important
        }
        
        .nav li.active a{
            background-color: #9FF781 !important;
            color: #333 !important
        } 
        
        .nav li:active{
            background-color: #9FF781 !important;
            color: #333 !important
        }        
        */
        
        .content{
            min-height:300px;
            background-color:#c0c0c0
        }
        
        body{
            padding: 0;
            margin: 0;
            background-color: #f8f5ec;
            text-align: justify
        }
        
        .footer-1{
            margin-top: 30px;
            background-color: #4a433d;
            padding: 0px 80px 0px 80px;
            color: #fff;
            text-align: center
        }
        
        .footer-1 div{
            margin: 30px 0px 30px 0px
        }
        
        .footer-2{
            background-color: #6b5c59;
            padding: 30px 120px 30px 120px;
            color: #fff;
            text-align: left
        }
        
        .footer-2 h5{
            color: #413936;
            font-size: 120%
        }
        
        
        
        .sitemap-list{
            font-family: 'Tahoma';
            padding: 0;
            margin: 0;
            list-style-type: none;
            color: #fff;
            font-size: 90%
        }
        
        .sitemap-list li{
            margin-bottom: 5px
        }
        
        .footer-3{
            background-color: #615350;
            padding: 30px
        }
          
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default maintop">
        <div class="container-fluid">
            <div class="navbar-form navbar-right">
                <a href="<?php echo site_url('login'); ?>">
                    <button type="submit" class="btn btn-default">
                         Kundenlogin
                    </button></a>
                <input type="text" name="fldSuche" class="form-control" placeholder="Suche">
                <span class="glyphicon glyphicon-scope form-control-feedback"></span>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-default mainnav" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <a class="navbar-brand" href="#">
             <img src="<?php echo base_url('gfx/logo.png'); ?>" />
          </a>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="{aktiv_netzwerk}">
                  <a href="#">DAS NETZWERK</a>
              </li>
              <li class="{aktiv_about}">
                  <a href="#">&Uuml;BER UNS</a>
              </li>
              <li class="{aktiv_mitglieder}">
                  <a href="<?php echo site_url('mitglieder'); ?>">MITGLIEDER</a>
              </li>
              <li class="{aktiv_projekte}">
                  <a href="#">PROJEKTE</a>
              </li>              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>  

      
    <div class="container-fluid">
       {content}
    </div>
    <div class="container-fluid">
        <div class="row footer-1">
            <div class="col-md-3">Wir werden unterst&uuml;tzt durch:</div>
            <div class="col-md-2">
                <img src="<?php echo base_url('gfx/dummylogo-1.png'); ?>" />
            </div>
            <div class="col-md-1">
                <img src="<?php echo base_url('gfx/dummylogo-2.png'); ?>" />
            </div>
            <div class="col-md-4">
                <img style="width:60%" src="<?php echo base_url('gfx/dummylogo-3.png'); ?>" />
            </div>
            <div class="col-md-1">
                <img src="<?php echo base_url('gfx/dummylogo-4.png'); ?>" />
            </div>
        </div>
        <div class="row footer-2">
            <div class="col-md-4">
                <img src="<?php echo base_url('gfx/logo.png'); ?>" style="margin-bottom:20px" />
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                <h5 style="color:#fff">tele:</h5>
                <h5 style="color:#fff">e-mail:</h5>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-2">
                <h5>Netzwerk</h5>
                <ul class="sitemap-list">
                    <li>&Uuml;ber uns</li>
                    <li>FAQ</li>
                    <li>Kontakt</li>
                    <li>Mitgliedschaft</li>
                    <li>Impressum</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Genossenschaften</h5>
                <ul class="sitemap-list">
                    <li>Navi 1</li>
                    <li>Navi 2</li>
                    <li>Navi 3</li>
                    <li>Navi 4</li>
                    <li>Navi 5</li>
                </ul>
            </div>
        </div>
        <div class="row footer-3"></div>
    </div>      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-49984939-1', 'genossenschaftscluster.de');
        ga('send', 'pageview');
    </script>
  </body>
</html>
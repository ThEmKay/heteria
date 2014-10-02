<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>&copy; 2014</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!--<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <!-- Zusätzliches CSS -->
    <link href="<?php echo base_url('css/layout.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/navigation.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/flaggen.css'); ?>" rel="stylesheet">
    <style>
    @import url(http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic);
    @import url(http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic);
        
        
    .thumbnail{
        min-height: 180px;
        background-color: #d4d4d4 !important
    }

    .container-small{
        /*margin: 0px 10px 40px 10px;*/
        background-color: #fff !important;
        padding: 0px 10px 10px 10px;
        text-align: left;
        margin: 0px 0px 25px 0px;
    }

    .container-small p{
        /*padding: 0px 5px 0px 5px;*/
    }  

    .container-small h4{
        /*padding: 0px 5px 0px 5px;*/
    }         

    .container-full{
       /* margin: 0px 10px 40px 10px;/*/
        background-color: #fff !important;
        /*border-right: 20px solid #f8f5ec;*/
        /*padding-bottom: 10px*/           
    }

    .container-medium{
        margin: 0px 10px 40px 10px;
        background-color: transparent !important;
        padding-bottom: 10px;
        text-align: justify;
        vertical-align: middle;
    }

    .content{
        background-color: #fff;
        padding-bottom: 40px;
        margin-top: 80px
    }
    
    .content .inner{
        margin: 5px 0px 15px 0px
    }
    

        
    body{
        padding: 0;
        margin: 0;
        background-color: #615350;
        text-align: justify;
        font-size: 18px !important;
        color: #1d1d1b !important;
        font-family: 'PT Sans', sans-serif;
    }
    
    h1{
        font-size: 36px !important;
        font-weight: bold !important
    }
    
    h2{
        font-size: 18px !important;
        font-weight: bold !important;
        letter-spacing: 1px;
        margin-bottom: 10px !important
    }
    
    .inner{
        margin-top: 20px !important
    }
        
    </style>
  </head>
  <body>
      <script type="">
      $(function(){
      
        $(document).on('scroll', function(){

           if(($(this).scrollTop() >= 100)){
               
               $('#navigation').css({'margin-top': '-75px'}, 100);
               
               $('#navigation').bind('mouseover', function(){
                  $(this).css({'margin-top': '0px'}, 100); 
               });

               $('#navigation').bind('mouseout', function(){
                  $(this).css({'margin-top': '-75px'}, 100); 
               });            
           }else if(($(this).scrollTop() <= 100)){
               $('#navigation').css({'margin-top': '0px'});
               $('#navigation').unbind('mouseover');
               $('#navigation').unbind('mouseout');
           }
        });
      
       
          
      });
      </script>    
    <nav id="navigation" class="navbar navbar-default mainnav navbar-fixed-top" role="navigation">
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
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="{aktiv_}">
                  <a href="<?php echo site_url(''); ?>">Startseite</a>
              </li>                
              <li class="{aktiv_heteria}">
                  <a href="<?php echo site_url('heteria'); ?>">&Uuml;ber Uns</a>
              </li>
              <li class="{aktiv_mitglieder}">
                  <a href="<?php echo site_url('mitglieder'); ?>">Mitglieder</a>
              </li>             
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {login_bereich}
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="flag flag-Germany"></span>
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu sprache" role="menu">
                        <li>
                            <a>
                                <span class="flag flag-Germany"></span> Deutsch
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="flag flag-United-Kingdom"></span> Englisch
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>  

    <div class="container-fluid content">
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
                <h5>Portal</h5>
                <ul class="sitemap-list">
                    <li><a href="<?php echo site_url('heteria'); ?>">&Uuml;ber uns</a></li>
                    <li><a href="<?php echo site_url('mitglieder'); ?>">Mitglieder</li>
                </ul>
            </div>
            <div class="col-md-4">
                <!--<h5>Genossenschaften</h5>
                <ul class="sitemap-list">
                    <li>Navi 1</li>
                    <li>Navi 2</li>
                    <li>Navi 3</li>
                    <li>Navi 4</li>
                    <li>Navi 5</li>
                </ul>-->
            </div>
        </div>
        <div class="row footer-3"></div>
    </div>      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
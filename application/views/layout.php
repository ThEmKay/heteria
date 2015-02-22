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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>
    <!-- Zusätzliches CSS -->
    <link href="<?php echo base_url('css/layout.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/navigation.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/flaggen.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cutive+Mono|Open+Sans:400,700' rel='stylesheet' type='text/css'> 
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
        background-color: #031B30;
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
      <script type="text/javascript">
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
      
    {hilfesystem}
    
    <div style="background-color:#fff">
    <div class="container-fluid limit">
        <div class="row">
            <div class="col-md-1">
                &nbsp;
            </div>
            <div class="col-md-10">
                <div class="user-navigation">
                    <ul>
                        <li class="{aktiv_projekte}">
                            <a href="<?php echo site_url('mitglieder'); ?>">Kontakt</a>
                        </li>                        
                        {login_bereich}
                    </ul>
                    
                </div>
                <div class="" style="clear:both;font-size:30pt;line-height:26pt;font-weight:bold">
                    <u><a href="<?php echo site_url(); ?>">Das Werk</a></u>
                </div>
                <div class="navigation">
                    <ul>
                        <li class="{aktiv_mitglieder}">
                            <a href="<?php echo site_url('mitglieder'); ?>">Genossenschaft finden</a>
                        </li>  
                        <li class="{aktiv_projekte}">
                            <a href="<?php echo site_url('mitglieder'); ?>">Projekte</a>
                        </li>                         
                        <li class="{aktiv_login}">
                            <a href="<?php echo site_url(''); ?>">Mitglied werden</a>
                        </li>                
                        <li class="{aktiv_heteria}">
                            <a href="<?php echo site_url('heteria'); ?>">&Uuml;ber Uns</a>
                        </li>
                    </ul>
                </div>
            </div>              
            <div class="col-md-1">
                &nbsp;
            </div>            
        </div>
    </div>
    <div class="container-fluid limit"> 
        <div class="border-top">
            &nbsp;    
        </div>
    </div>
    {content}
    </div>
    <div class="container-fluid footer-2">
        <div class="container-fluid" style="max-width:1440px">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url('gfx/logo.png'); ?>" style="margin-bottom:20px" />
                    <p><span class="glyphicon glyphicon-earphone"></span> 0160 - 66 77 888</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> hallo@heteria.de</p>
                </div>
                <div class="col-md-2">
                    <ul class="sitemap-list">
                        <li><a href="<?php echo site_url(''); ?>">Startseite</a></li>
                        <li><a href="<?php echo site_url('heteria'); ?>">&Uuml;ber uns</a></li>
                        <li><a href="<?php echo site_url('mitglieder'); ?>">Suchmaschine</a></li>
                        <li><a href="<?php echo site_url('mitglieder'); ?>">Projekte</a></li>
                    </ul>                
                </div>
                <div class="col-md-2">
                    <ul class="sitemap-list">
                        <li><a href="<?php echo site_url('impressum'); ?>">Inhalt melden</a></li>
                        <li style="margin-top:20px"><a href="<?php echo site_url('impressum'); ?>">Impressum</a></li>
                        <li><a href="<?php echo site_url('impressum'); ?>">Datenschutz</a></li>
                        <li><a href="<?php echo site_url('impressum'); ?>">Kontakt</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="sitemap-list">
                        <li><a href="<?php echo site_url('meinheteria'); ?>">Mein heteria</a></li>
                        <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>      
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
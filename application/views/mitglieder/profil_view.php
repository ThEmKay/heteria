<style>
    
    .profil-header{
        margin:-20px -15px 20px -15px;
        background-image: url(<?php echo base_url('gfx/_MG_9690-als-Smartobjekt-1.jpg'); ?>);
        background-position: 50% 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    
    .profil-header .container{
        /*padding: 50px 0px 50px 0px*/
    }
    
    .profil-header .container p{
        padding: 20px 10px 20px 10px;
        background-image: url(<?php echo base_url('gfx/opacity30.png'); ?>);
        color: #fff
    }    
    
    .profil-navbar{
        font-size: 120%;
        border: 0;
        font-weight: bold;
        background-color: #dbd7ce;
        color: #db5e58;
        margin:-20px -15px 40px -15px;
        border-radius:0
    }
    
    .profil-navbar ul li{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    
    
</style>
<!--<script src="<?php echo base_url('plugins/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>-->
<script src="//cdn.ckeditor.com/4.4.4/basic/ckeditor.js"></script>
<script>

$(function()
{
    CKEDITOR.replace('beschreibung');
});


</script>
{profil}
<div class="jumbotron profil-header">
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>
                <img alt="Logo" src="<?php echo base_url(); ?>/{logo}" />
            </h1>
            <p>
                <span>Hier ist Platz f&uuml;r einen kurzen Beschreibungstext, der ziemlich genau so lang ist, wie der aus der Vorlage! Noch nicht ganz, aber jetzt.</span>
            </p>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<nav class="navbar navbar-default profil-navbar">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <ul class="nav navbar-nav">
        <li class="">
            <a href="#">Philosophie</a>
        </li>
        <li class="">
            <a href="#">Produkte</a>
        </li>
        <li class="">
            <a href="">Projekte</a>
        </li>
        <li class="">
            <a href="#">Genossenschaft</a>
        </li>              
        <li class="">
            <a href="#">Kontakt</a>
        </li>
    </ul>  
    </div>
    <div class="col-md-1"></div>
</nav>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3 container-medium nopad-l nopad-r">
        <img src="<?php echo base_url('gfx/windows-8-default-wallpaper.jpg'); ?>" style="max-width:100%;border-radius: 5px" />
    </div> 
    <div class="col-md-7 nopad-l container-medium">
        <h3>{name}</h3>
        <div class="col-md-12 nopad-l">
            <textarea id="beschreibung">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</textarea>
        </div>
    </div>
    <div class="col-md-1"></div> 
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3 container-small droppable">
        <div>
        <h4>EIGENE HEADLINE 1</h4>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
    </div>
    <div class="col-md-3 container-small droppable">
        <div>
        <h4>EIGENE HEADLINE 2</h4>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
    </div>
    <div class="col-md-4 container-small droppable">
        <h4>EIGENES VIDEO?</h4>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </div>    
    <div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <h4>WIR SIND</h4>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </div>
    <div class="col-md-7">
        
    </div>
    <div class="col-md-1"></div>
</div>
{/profil}

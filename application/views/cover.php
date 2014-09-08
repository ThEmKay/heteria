<script type="text/javascript"> 
$(function(){
   $('#carousel-example-generic').css('height', (window.innerHeight)-($('.navbar').height()));
   
   $('.carousel-inner').children().each(function(){
        $(this).children('[name="picture"]').css('height', (window.innerHeight)-($('.navbar').height()));
   });
       
});   
</script>
<div class="row" style="margin-bottom:40px">
    <div class="col-md-12 container-full" style="padding:0 !important">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
                <div name="picture" style="height:300px;width:100%;background-image: url(<?php echo site_url('gfx/luna_background.jpg'); ?>)">
                    &nbsp;
                </div>
                <div class="carousel-caption">
                    Das ist ein sch&ouml;nes Bild!
                </div>
            </div>
            <div class="item">
                <div name="picture" style="height:300px;width:100%;background-image: url(<?php echo site_url('gfx/nazIMG_5768.jpg'); ?>)">
                    &nbsp;
                </div>
                <div class="carousel-caption">
                    Das ist ein sch&ouml;nes Bild!
                </div>
            </div>              
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>GEMEINSAM</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/Bildschirmfoto_2014-09-08_um_14.44.52.png'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>Wir geben Genossenschaften eine Plattform, um sich auszutauschen, &uuml;ber gemeinschaftliche Projekte zu informieren und so insgesamt eine bessere Zusammenarbeit zu erm&ouml;glichen.</p>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>MEHR</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/4109130904_90a0c504b0_o.jpg'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>Ziel ist es au&szlig;erdem, den teilnehmenden Genossenschaften direkten Zugriff auf einen Pool aus Genossenschaftsverb&auml;nden zu geben und im Gegenzug den Verb&auml;nden erm&ouml;glichen, neue Mitglieder zu gewinnen.</p>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>ERREICHEN</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/Bildschirmfoto_2014-09-08_um_14.45.46.png'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>Das Netzwerk soll dazu beitragen, dass sich mehr Genossenschaften gr&uuml;nden und den Gedanken des gemeinschaftlichen und sozialen Wirtschaftens weiter verbreiten.</p>
    </div>   
</div>
<div class="row">
    <div class="col-lg-4 container-small">
        <h4>DABEI SEIN</h4>
        <form>
        <div class="form-group">
            <label>Mitgliedsnummer</label>
            <input type="email" class="form-control">
            <label>Passwort</label>
            <input type="email" class="form-control">
        </div>            
        <button type="submit" class="btn btn-success">Einloggen</button>
        <button type="button" class="btn btn-info">Registrieren</button>
        </form>
    </div>
    <div class="col-lg-8 container-small" style="height:200px">
        <h4>GENOSSENSCHAFTEN ENTDECKEN</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
</div>
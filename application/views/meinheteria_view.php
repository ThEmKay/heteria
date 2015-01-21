<style>
    .ui-autocomplete{
        list-style-type: none;
        background-color: #fff;
        width: 250px;
        padding: 0;
        border: 1px solid #e6e6de
    }
    
    .ui-menu-item{
        padding: 5px;
        cursor: pointer
    }
    
</style>
<script>
$(function(){    
    
    $('#msg').delay(3000).fadeOut();
    
    $('.glyphicon-remove').bind('click', function(){
        $('#lokal').val('');
        $('#lokal').attr('readonly', false);
    });
    
    $("#lokal").autocomplete({
        minLength: 3,
        select: function(event, ui){
            $('#lokal').attr('readonly', true);
        },
        source: function(request, response){
            $('#indicator').show(); 
            $.getJSON('<?php echo site_url('ajax/util_ajax/autocomplete_lokalisierung'); ?>', request, function(data){
            response(data.results);
            $('#indicator').hide(); 
        });}
    });
});
</script>
<div class="row" style="margin-top:20px">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="well alert-info">
            <span class="glyphicon glyphicon-info-sign"></span>
            <b>Nutzen Sie heteria so, wie Sie es m&ouml;chten.</b>
            <br />
            Sie k&ouml;nnen Sie heteria so einstellen, dass Sie vorrangig Inhalte
            aus Ihrer Region angezeigt bekommen (dazu ist kein Login notwendig). Mithilfe der Session Ihres Internetbrowsers
            bleiben Ihre Eingaben eine Zeit lang erhalten. Der <b>Vorteil</b> ist, dass Sie beim St&ouml;bern durch interessante Unternehmen,
            Projekte und Angebote <b>anonym</b> bleiben.
        </div>
        {msg}
        <form action="<?php echo current_url(); ?>" method="post">
            <div class="form-group has-feedback">
                <label class="control-label">
                    heteria lokalisieren
                    <img id="indicator" style="display:none" src="<?php echo base_url('gfx/ajax-loader.gif'); ?>" />
                </label>
                <div class="input-group">
                    <input style="border-right:0" {lokal_readonly} name="fldLokal" value="{set_lokal}" id="lokal" type="text" class="form-control" placeholder="Heimatstadt / Gemeinde" />
                    <div class="input-group-addon">
                        <span style="cursor:pointer" class="glyphicon glyphicon-remove"></span>
                    </div>
                </div>
            </div>
            <div class="checkbox">
            <label>
              <input name="chkHilfe" value="1" type="checkbox" {hilfe_checked}> Hilfesystem anzeigen
            </label>
            </div>
            <input type="submit" name="btnSpeichern" class="btn btn-success" value="Einstellungen speichern">
        </form>
    </div>
    <div class="col-lg-3"></div>
</div>
<style>
    
           
    
    .profil-navbar{
        border: 0;
        font-weight: bold;
        background-color: #fff;
        color: #1b1b1d;
        border-radius: 0;
    }
                
    .profil{
        background-color: #fff;
    }
    
    .profil-logo{
        text-align: center;
        padding: 40px 0px 40px 0px
    }
    
    .profil-header{
        background-image: url(../../gfx/mood_vb_frau.png);
        height: 300px;
        background-size: 100%;
        background-position: 50% 50%
    }
    
    .profil-intro{
        text-align: center;
        padding: 20px 0px 70px 0px
    }
    
    .profil-titel{
        padding-bottom: 10px
    }
    
    .v1{
        font-size: 24px
    }
    
    .profil-content{
        text-align: left
    }
        
    
</style>
<script src="<?php echo base_url('plugins/nicedit/nicEdit.js'); ?>"></script>
<script>

var myNicEditor = new nicEditor({buttonList : ['bold','italic','underline','fontSize']});

function bind(){
    $('.editable').bind('click', function(){
        
        $('.editable').removeAttr('id');
        oThis = $(this);
        oThis.css('border', '1px solid');
        oThis.attr('id', 'bearbeiten');
        $('#backup').html(oThis.html());
        
        $('#panel').css({'left': oThis.offset().left,
                         'top': oThis.offset().top-30});
        $('#actions').css({'left': oThis.offset().left+200,
                           'top': oThis.offset().top-32});                     
        
        $('#panel').show();
        $('#actions').show();
        
        myNicEditor.addInstance(oThis.attr('id'));
        
        $('.editable').unbind('click');
    });    
}

$(function(){
 
    bind();
    myNicEditor.setPanel('panel');
        
    $('#save').bind('click', function(){
        myNicEditor.removeInstance('bearbeiten');
                
        // AJAX REQUEST - Daten speichern
        $.post('<?php echo site_url('ajax/profil_ajax/speichern'); ?>', {'inhalt': $('#bearbeiten').html(),
                                                                         'feld' : $('#bearbeiten').attr('data-feld')}, function(data){
            if(data === 'true'){
            }else{
                $('#bearbeiten').html($('#backup').html());
                $('#message').css({top: $('#bearbeiten').offset().top-40});
                $('#message').html(data);
                $('#message').show();
                setInterval("$('#message').hide()", 2000);
            }
        });
        
        $('#panel').hide();
        $('#actions').hide();        
        $('.editable').css('border', '0');
        bind();
    });
    
    $('#abort').bind('click', function(){
        $('#bearbeiten').html($('#backup').html());
        $('#panel').hide();
        $('#actions').hide();        
        $('.editable').css('border', '0');
        bind();    
    });
    
});



</script>
{profil}
<div id="message" style="display:none;position:absolute;left:50%;margin-left:-200px;width:500px;z-index:99999"></div>
<div id="backup" style="display:none"></div>
<div id="panel" style="display:none;z-index:99999;position:absolute;width:200px;"></div>
<div id="actions" style="display:none;z-index:99999;position:absolute;color:green">&nbsp;
    <button id="save" type="button" class="btn btn-success btn-md" style="padding: 3px 4px 3px 4px">
        <span class="glyphicon glyphicon-ok"></span>
    </button>
    <button id="abort" type="button" class="btn btn-danger btn-md" style="padding: 3px 4px 3px 4px">
        <span class="glyphicon glyphicon-remove"></span>
    </button>    
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="profil">
            <div class="profil-logo" id="logo">
                <img style="width:400px" src="<?php echo base_url('gfx/logos/logo_vb.png'); ?>" />
            </div>
            <nav class="navbar navbar-default profil-navbar">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="#ueber">&Uuml;ber</a>
                    </li>
                    <li class="">
                        <a href="#leitbild">Leitbild</a>
                    </li>
                    <li class="">
                        <a href="#projekte">Projekte</a>
                    </li>
                    <li class="">
                        <a href="#kontakt">Kontakt</a>
                    </li>              
                </ul>  
                </div>
                <div class="col-md-1"></div>
            </nav>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row">
    <div class="col-lg-12 profil-header"></div>
</div>
<div class="row">
    <a name="ueber"></a>
    <div class="col-lg-1"></div>
    <div class="col-lg-10 profil-intro">
        <div class="col-lg-12">
            <h1 class="profil-titel">
                <span class="editable" data-feld="titel">
                    {titel}
                </span>
            </h1>
            <span class="v1 editable" data-feld="text">
                {text}
            </span> 
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 profil-content">
        <div class="col-lg-4 editable">
            Unsere Bank
            Eine Bank - alle Wege. Zu unserem Selbstverständnis gehört die Nähe zu unseren Mitgliedern und Kunden. Dabei stellen wir sicher, dass sie uns von überall erreichen können. Wir geben unseren Kunden die größtmögliche Freiheit moderne und klassische Kanäle zu nutzen und flexibel miteinander zu kombinieren: immer sicher, immer persönlich und mit maximalem Service.
        </div>
        <div class="col-lg-4 editable">
            <h2>Unsere Mitglieder</h2>
            Ihnen gilt unsere besondere Wertschätzung, denn sie sind zugleich Teilhaber der Volksbank Mittelhessen und besitzen ein aktives Mitspracherecht. Durch persönliche Gespräche und einen offenen Meinungsaustausch entsteht Transparenz. Diese ist zugleich die Basis für eine vertrauensvolle, partnerschaftliche Beziehung.
            Mit unserem attraktiven Mitgliederprogramm schaffen wir nachhaltige Mehrwerte und geben unseren Anteilseignern die Möglichkeit über wichtige Themen ihrer Volksbank mitzuentscheiden.
        </div>
        <div class="col-lg-4">
           <h2>Unsere Kunden</h2>
           Als fairer und verlässlicher Partner stellen wir unsere Kunden mit ihren individuellen Wünschen und Zielen in den Mittelpunkt genossenschaftlicher Beratung. Finanzdienstleistungen sind bei uns nach ihren Bedürfnissen ausgerichtet. Dabei setzen wir stets auf Transparenz und höchste Qualität.
           Entsprechend unserer genossenschaftlichen Werte beraten wir unsere Kunden solidarisch, partnerschaftlich und persönlich. 
        </div>           
    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 profil-content">
        <div class="col-lg-4">
            <h2>Unsere Bank</h2>
            Eine Bank - alle Wege. Zu unserem Selbstverständnis gehört die Nähe zu unseren Mitgliedern und Kunden. Dabei stellen wir sicher, dass sie uns von überall erreichen können. Wir geben unseren Kunden die größtmögliche Freiheit moderne und klassische Kanäle zu nutzen und flexibel miteinander zu kombinieren: immer sicher, immer persönlich und mit maximalem Service.
        </div>        
    </div>
    <div class="col-lg-1"></div>    
</div>
<a name="leitbild"></a>
<a name="projekte"></a>
<a name="kontakt"></a>
{/profil}
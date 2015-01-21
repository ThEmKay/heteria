<script src="<?php echo base_url('plugins/nicedit/nicEdit.js'); ?>"></script>
<script type="text/javascript">

var myNicEditor = new nicEditor({buttonList : ['bold','italic','underline','removeformat']});

var edit = '';

function test(){
    alert(123);
}

function bind(){
    
     $('.editable').bind('mouseover', function(){
        edit = $(this);
        $('#profil-content-panel').css({top: $(this).offset().top-$('#profil-content-panel').height()+2,
                                        left: $(this).offset().left+$(this).width()-$('#profil-content-panel').width()});
        $('#profil-btn-delete').show();
        $('#profil-content-panel').show();    
    });
    
    $('.editable-fixed').bind('mouseover', function(){
        edit = $(this);
        
        var width = $(this).width();
        if(width === 0){
            width = $(document).width()/2;
        }
        $('#profil-content-panel').css({top: $(this).offset().top-$('#profil-content-panel').height()+2,
                                        left: $(this).offset().left+width-$('#profil-content-panel').width()});
        
        $('#profil-btn-delete').hide();
        $('#profil-content-panel').show(); 
    });    
}

function bindUpload(){
    /**
     * MOUSEOVER BINDS - Titelbild
     */
    $('#titelbild').bind('mouseover', function(){
        $('#profil-btn-titelbild-upload').css({top: $('#titelbild').offset().top+5,
                                               left: $('#titelbild').offset().left+5});
        $('#profil-btn-titelbild-upload').show();       
    });
    $('#profil-btn-titelbild-upload').bind('mouseover', function(){
        $(this).show();
    });     
    $('#titelbild').bind('mouseout', function(){
        $('#profil-btn-titelbild-upload').hide();
    });
    /**
     * MOUSEOVER BINDS - Logo
     */
    $('#logo').bind('mouseover', function(){
        $('#profil-btn-logo-upload').css({top: $('#profil-logo-img').offset().top-30,
                                          left: $('#profil-logo-img').offset().left+$('#profil-logo-img').width()-$('#profil-btn-logo-upload').width()});
        $('#profil-btn-logo-upload').show();
    });
    $('#profil-btn-logo-upload').bind('mouseover', function(){
        $(this).show();
    });
    $('#logo').bind('mouseout', function(){
        $('#profil-btn-logo-upload').hide();
    });    
}

/**
 * Diese Funktion entfernt während eines Dateiuploads alle Keybindings, die 
 * Logo und Titelbildupload einblenden.
 */
function unbindUpload(){
    $('#profil-btn-titelbild-upload').hide();
    $('#titelbild').unbind('mouseover');
    $('#profil-btn-titelbild-upload').unbind('mouseover');
    $('#profil-btn-logo-upload').hide(); 
    $('#logo').unbind('mouseover');
    $('#profil-btn-logo-upload').unbind('mouseover');     
}


$(function(){
 
    bind();
    bindUpload();
    myNicEditor.setPanel('panel');
    
    /************************************************************** BINDS ****** 
    /**
     * MOUSEOVER BINDS - Neuer Content 
     */
    $('#profil-content-neu-uber').bind('mouseover', function(){
        $('.profil-content-neu-panel').show();
    });
    
    $('.profil-content-neu-panel').bind('mouseover', function(){
        $(this).show();  
    })
    
    $('#profil-content-neu-uber').bind('mouseout', function(){
        $('.profil-content-neu-panel').hide();
    });
    /*
     * MOUSEOVER BINDS - Content Bearbeiten
     */
    $('.editable').bind('mouseout', function(){   
        $('#profil-content-panel').hide();
    });    
    
    $('.editable-fixed').bind('mouseout', function(){   
        $('#profil-content-panel').hide();    
    });
    
    $('#profil-content-panel').bind('mouseover', function(){   
        $(this).show();
    });
    
    $('#profil-content-panel').bind('mouseout', function(){   
        $(this).hide();
    });    
    //************************************************************* BINDS ******
    
    /*
     * TEXTINHALT HINZUFÜGEN - BUTTON
     */
    $('#profil-text-neu').bind('click', function(){
         
          $.post('<?php echo site_url('ajax/profil_ajax/neu'); ?>', {'token': '{token}'}, function(data){
          
             $('#profil-content-neu-uber').before('<div class="col-lg-4">'+
             '   <div class="profil-content-inner editable" id="inhalt'+data+'" data-feld="inhalt'+data+'">'+
             '       '+
             '   </div>'+
             '</div>');
             bind();

             $('#inhalt'+data).trigger('mouseover');
             $('#profil-btn-edit').trigger('click');
             $('#inhalt'+data).focus();
          });
                
         

    });
    
    
    /*
     * TEXTINHALT BEARBEITEN - BUTTON
     * Schaltfläche zum Bearbeiten von Inhalt wurde geklickt
     */ 
    $('#profil-btn-edit').bind('click', function(){
        $('.editable').each(function(){
            $(this).unbind('mouseover');
        });
        $('.editable-fixed').each(function(){
            $(this).unbind('mouseover');
        });        
        
        edit.css('border', '1px dotted');
        
        // Inhalt als Backup speichern  
        $('#backup').html(edit.html());
        // Ausrichten der Panels zum aktuellen Inhaltselement
        $('#panel').css({'left': edit.offset().left,
                         'top': edit.offset().top-30});
        $('#actions').css({'left': edit.offset().left+100,
                           'top': edit.offset().top-33});                     
        
        // Panel mit den Bearbeitungsoptionen für Inhalt ausblenden
        $('#profil-content-panel').hide();
        // Panels zum Bearbeiten des aktuellen Elements einblenden
        $('#panel, #actions').show();
        
        // Instanz für neuen WYSIWYG Editor für Textinhalt erzeugen
        myNicEditor.addInstance(edit.attr('id'));
    });
    
    /*
     * INHALTSCONTAINER LÖSCHEN - BUTTON
     * Schaltfläche zum Bearbeiten von Inhalt wurde geklickt
     */
    $('#profil-btn-delete').bind('click', function(){
        if(confirm("Dieser Inhalt wird unwiderruflich entfernt!")){
            // AJAX REQUEST - Inhalt entfernen
            $.post('<?php echo site_url('ajax/profil_ajax/entfernen'); ?>', {'token': '{token}',
                                                                             'feld' : edit.attr('data-feld')}, function(data){
                $('#message').css({top: edit.offset().top-40});
                if(data === 'true'){
                    edit.parent().hide("explode");    
                    $('#message').html('<div class="alert alert-success" role="alert">Inhalt erfolgreich entfernt!</div>');
                    edit = '';
                }else{
                    $('#message').html(data);
                }
                $('#message').show();
                setInterval("$('#message').hide()", 3000);
            });
        }
    });
    
    
    $('#save').bind('click', function(){
    
        myNicEditor.removeInstance(edit.attr('id'));
         
        // AJAX REQUEST - Daten speichern
        $.post('<?php echo site_url('ajax/profil_ajax/speichern'); ?>', {'token': '{token}',
                                                                         'inhalt': edit.html(),
                                                                         'feld' : edit.attr('data-feld')}, function(data){
            $('#message').css({top: edit.offset().top-40});
            if(data === 'true'){
                $('#message').html('<div class="alert alert-success" role="alert">Erfolgreich gespeichert!</div>');
            }else{
                edit.html($('#backup').html());
                $('#message').html(data);
            }
            $('#message').show();
            setInterval("$('#message').hide()", 3000);
        });
        
        $('#panel').hide();
        $('#actions').hide();        
        $('.editable').css('border', '0');
        edit = '';
        bind();
    });
    
    $('#abort').bind('click', function(){
        myNicEditor.removeInstance(edit.attr('id'));
        
        $(edit).html($('#backup').html());
        $('#panel').hide();
        $('#actions').hide();        
        $('.editable, .editable-fixed').css('border', '0');
        bind();    
    });
    
       
    
    /**
     * LOGO HOCHLADEN
     * 
     */
    $('#profil-btn-logo-upload').bind('click', function(){
        $('#logo-upload').trigger('click');
        $('#profil-btn-logo-upload').hide();
    });
    
    $('#logo-upload').bind('change', function(){
        $('#profil-logo-img').attr('src', '../../gfx/ajax-loader-big.gif');
    });
    
    $('#profil-logo-upload').submit(function(){
        // Mouseover für Titelbild und Logo während des Upload-Vorganges deaktivieren.
        unbindUpload();
        
        $('#message').css({top: $(this).offset().top});
        $(this).ajaxSubmit({success: function(datastring){
                                data = $.parseJSON(datastring);
                                if(data.success){
                                    $('#message').html('<div class="alert alert-success" role="alert">Logo erfolgreich hochgeladen!</div>');                                   
                                }else{
                                    
                                    $('#message').html(data.message);
                                }
                                $('#profil-logo-img').attr('src', '../../data/{permaname}/logo/'+data.file);                    
                                $('#message').show();
                                setInterval("$('#message').hide()", 3000);
                                bindUpload();
                             }
                            });
        return false;
    });
    
    
    /**
     * TITELBILD HOCHLADEN
     * 
     */
    $('#profil-btn-titelbild-upload').bind('click', function(){
        $('#titelbild-upload').trigger('click');
        $('#profil-btn-titelbild-upload').hide();
    });
    
    $('#titelbild-upload').bind('change', function(){
        $('#titelbild').css('background-size', '3%');
        $('#titelbild').css('background-image', 'url(../../gfx/ajax-loader-big.gif)');
    });

    $('#profil-titelbild-upload').submit(function(){
        // Mouseover für Titelbild und Logo während des Upload-Vorganges deaktivieren.
        unbindUpload();
         
        $('#message').css({top: $(this).offset().top+30});
        $(this).ajaxSubmit({success: function(datastring){
                                data = $.parseJSON(datastring); 
                                if(data.success){
                                    $('#message').html('<div class="alert alert-success" role="alert">Titelbild erfolgreich hochgeladen!</div>');                                   
                                }else{
                                    $('#message').html(data.message);
                                }
                                $('#titelbild').css('background-size', '100%');
                                $('#titelbild').css('background-image', 'url(../../data/{permaname}/mood/'+data.file+')');                                
                                $('#message').show();
                                setInterval("$('#message').hide()", 3000);
                                bindUpload();
                             }
                            });
        return false;
    });    

    
    
    /*
    $('.editable').bind('mousedown', function(){
        $('#profil-content-panel').hide();
        $('.editable').each(function(){
            $(this).unbind('mouseover');
        });
    });
    */
    
    /*
    $('.editable').bind('mouseup', function(){
        bind();
    });    
      
    */
    
    /*
    $('.profil-content').sortable({
        containment: '.profil-content',
        tolerance: 'pointer',
        connectWith: '.profil-content',
        placeholder: 'col-md-4 profil-sort-placeholder'});*/
    
});




</script>
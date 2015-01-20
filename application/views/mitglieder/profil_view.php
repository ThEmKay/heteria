<style>
    
    .editable{
        min-height: 40px
    }       
    
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
    
    .profil-indicator{
        cursor: url(../../gfx/ajax-loader.gif), progress
    }
    
    .profil-btn-logo-upload{
        position: absolute;
        display: none;
    }
    
    .profil-sort-placeholder{
        border: 1px dotted #3071a9;
        height: 50px
    }
    
    .profil-content-neu-panel{
        padding: 0;
        margin: 0;
        list-style-type: none;
        display: none
    }
    
    .profil-content-neu-panel li{
        padding: 2px
    }   
    
    .profil-content-neu-panel li button{
        width: 140px
    }    
    
    
        
    
</style>

{profil}

{admin_javascript}
{admin_panels}

<script>




</script>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="profil">
            <form id="profil-logo-upload" method="post" enctype="multipart/form-data" action="<?php echo site_url('ajax/profil_ajax/logo'); ?>">
                <div class="profil-logo" id="logo">
                    <img id="profil-logo-img" style="max-width:400px" src="{logo}" />
                </div>
                <input type="hidden" name="token" value="{token}" />
                <input type="file" id="logo-upload" style="display:block;width:0;height:0"
                       onchange="$('#profil-logo-upload').submit();" name="input-logo-upload" />
            </form>
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
    <div id="titelbild" class="col-lg-12 profil-header" style="background-repeat:no-repeat;background-image: url('{mood}');"></div>
    <form id="profil-titelbild-upload" method="post" enctype="multipart/form-data" action="<?php echo site_url('ajax/upload'); ?>">
        <input type="hidden" name="token" value="{token}" />
        <input type="file" id="titelbild-upload" style="display:block;width:0;height:0"
               onchange="$('#profil-titelbild-upload').submit();" name="input-titelbild-upload" />
    </form>    
</div>
<div class="row">
    <a name="ueber"></a>
    <div class="col-lg-1"></div>
    <div class="col-lg-10 profil-intro">
        <div class="col-lg-12">
            <h1 class="profil-titel">
                <span class="editable-fixed" id="titel" data-feld="titel">
                    {titel}
                </span>
            </h1>
            <span class="v1 editable-fixed" id="text" data-feld="text">
                {text}
            </span> 
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 profil-content">
        {inhalte}
        <div class="col-lg-4">
            <div class="profil-content-inner editable" id="inhalt{inhalt_id}" data-feld="inhalt{inhalt_id}">
                {inhalt}
            </div>
        </div>
        {/inhalte}
        <div class="col-lg-4" id="profil-content-neu-uber">
            <div>
                <span class="glyphicon glyphicon-plus"></span>
                <ul class="profil-content-neu-panel">
                    <li>
                        <button class="btn btn-success" id="profil-text-neu">
                            <span class="glyphicon glyphicon-font"></span>
                            &nbsp;Text hinzuf&uuml;gen
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-camera"></span>
                            &nbsp;Bild hinzuf&uuml;gen
                        </button>
                    </li>                    
                </ul>
            </div>
        </div>        
    </div>
    <div class="col-lg-1"></div>
</div>
<a name="leitbild"></a>
<a name="projekte"></a>
<a name="kontakt"></a>
{/profil}
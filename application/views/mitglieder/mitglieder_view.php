<style>
h4.media-heading{
	padding: 0px
}
.media{
	margin-top: 3px;
	padding: 20px 0px 20px 0px
}
.media-object{
	margin: 0px 5px 0px 5px
}
.alt1{
	background-color: #e6e6de
}
.alt0{
	background-color: #efebe2
}

    .profil-header{
        margin:-20px -15px 20px -15px;
        background-image: url(<?php echo base_url('gfx/5662903848_1450f814c1_o.jpg'); ?>);
        background-position: 50% 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    
    .profil-header .container{
        /*padding: 50px 0px 50px 0px*/
    }
    
    .profil-header .container p{
        padding: 10px 5px 10px 5px;
        background-image: url(<?php echo base_url('gfx/opacity30.png'); ?>);
        color: #fff
    } 


</style>
<div class="jumbotron profil-header">
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <p>
                <span>
                    Durchsuchen Sie unsere Datenbank mit mehr als <span style="font-size:200%">{genos}</span> Genossenschaften!
                </span>
            </p>
        </div>
        <div class="col-md-5"></div>
    </div>
</div>
<div class="row" style="margin-top:20px">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<?php echo validation_errors() ?>
    	<form name="frmSuche" role="form" action="<?php echo current_url(); ?>" method="POST">
		  <div class="form-group">
		    <input onchange="frmSuche.submit()" type="text" value="<?php echo set_value('fldSuche'); ?>" name="fldSuche" class="form-control input-lg" placeholder="Suchbegriff eingeben...">
		  </div>
		</form>
        {statistik}
        <div style="text-align:right;margin-bottom:10px">
            Es wurden {x} Genossenschaften gefunden.
        </div>
        {/statistik}
        {suchergebnis}
        <div class="media alt{alt}">
          <div class="pull-left" style="text-align:center;width:80px;height:60px;margin-left:5px">
              <img src="{logo}" style="max-height:60px;max-width:80px">
          </div>
          <div class="media-body alt{alt}">
            <h4 class="media-heading"><a href="{link}">{name}</a></h4>
            {strasse} | {plz} {ort} - {branche}
          </div>
        </div>
        {/suchergebnis}
    </div>
    <!-- 
    <div class="col-md-10">
        {genossenschaften}    
        <div class="col-md-3">
            <div class="thumbnail" style="min-height:0;padding: 10px">
                <a href="<?php echo site_url('mitglieder/profil'); ?>/{permalink}">
                    <img style="max-width:100%" src="<?php echo base_url('data'); ?>/{shaid}/logo/{logo}" />
                </a>
            </div> 
        </div>
        {/genossenschaften}    
    </div> -->
    <div class="col-md-1"></div> 
</div>
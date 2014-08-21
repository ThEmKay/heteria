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
</style>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<?php echo validation_errors() ?>
    	<form name="frmSuche" role="form" action="<?php echo current_url(); ?>" method="POST">
		  <div class="form-group">
		    <input onchange="frmSuche.submit()" type="text" value="<?php echo set_value('fldSuche'); ?>" name="fldSuche" class="form-control input-lg" placeholder="F&uuml;tter mich">
		  </div>
		  
		</form>
		{suchergebnis}
		<div class="media alt{alt}">
		  <a class="pull-left" href="#">
		    <img class="media-object" src="<?php echo base_url('gfx/193967.png'); ?>" alt="...">
		  </a>
		  <div class="media-body alt{alt}">
		    <h4 class="media-heading"><a href="{link}">{name}</a></h4>
		    {strasse} | {plz} {ort}
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
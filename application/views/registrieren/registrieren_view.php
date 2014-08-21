<script type="text/javascript">
$('#submitRegistrieren').bind('click', function()
{
    frmRegistrieren.submit();
});    
    
</script>
<div class="row">
    <div class="col-xs-12">
         <?php echo form_open(current_url(), array('name' => 'frmRegistrieren',
                                                  'class' => 'form-horizontal',
                                                  'role' => 'form'));
         echo validation_errors(); ?>
          <div class="form-group">
            <label for="inputName" class="col-sm-3 control-label">Genossenschaft</label>
            <div class="col-sm-9">
              <input value="<?php echo set_value('fldName'); ?>" type="text" name="fldName" class="form-control" id="inputName" placeholder="Name der Genossenschaft">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPerson" class="col-sm-3 control-label">Ansprechpartner</label>
            <div class="col-sm-9">
                <input value="<?php echo set_value('inputPerson'); ?>" type="text" name="inputPerson" class="form-control" id="inputPerson" placeholder="Ansprechpartner">
            </div>
          </div>         
          <div class="form-group">
            <label for="inputEmail" class="col-sm-3 control-label">E-Mail</label>
            <div class="col-sm-9">
                <input value="<?php echo set_value('fldEmail'); ?>" type="text" name="fldEmail" class="form-control" id="inputEmail" placeholder="E-Mail Adresse">
            </div>
          </div>        
          <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-9">
                <input type="checkbox" name="chkAGB" id="checkAGB" />
                <label for="checkAGB" style="font-weight:normal">AGBs gelesen und akzeptiert.</label>
            </div>
          </div>        
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" id="submitRegistrieren" class="btn btn-default">
                  Genossenschaft registrieren
              </button>
            </div>
          </div>
        </form>
    </div>
</div>
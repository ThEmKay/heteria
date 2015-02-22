<div class="container-fluid limit">
    <div class="border-content">
        <div class="row">
            <div class="col-lg-3">
                &nbsp;
            </div>
            <div class="col-lg-4">
                <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                {custom_error}
                <form method="post" role="form" action="<?php echo site_url('login'); ?>">
                    <div class="form-group">
                        <label for="fld_mitgliedsnr">Mitgliedsnummer</label>
                        <input type="text" value="<?php echo set_value('fld_mitgliedsnr'); ?>" class="form-control" name="fld_mitgliedsnr" id="fld_mitgliedsnr" placeholder="Mitgliedsnummer eingeben">
                    </div>
                    <div class="form-group">
                        <label for="fld_passwort">Passwort</label>
                        <input type="password" class="form-control" name="fld_passwort" id="fld_passwort" placeholder="Passwort">
                    </div>
                    <input type="submit" value="Einloggen" class="btn btn-success" />
                    <button type="button" class="btn btn-info">Passwort vergessen</button>
                </form>
            </div>
            <div class="col-lg-2">
                :)
            </div>
            <div class="col-lg-3">
                &nbsp;
            </div>
        </div>
    </div>
</div>

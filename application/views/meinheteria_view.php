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
        <form action="<?php echo current_url(); ?>" method="post">
            <div class="form-group">
                <label>
                    heteria lokalisieren
                </label>
                <input type="text" class="form-control" size="6" maxlength="6" placeholder="PLZ" />
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
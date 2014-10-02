<?php

function getAge($tag, $monat, $jahr){
    $jahrEins = date('z', mktime(0, 0, 0, 12, 31, $jahr))+1;
    $restEins = date('z', mktime(0, 0, 0, $monat, $tag, $jahr))+1;

    $lebenstage = $jahrEins-$restEins;
    
    $lebensjahre = 0;
    for($i = $jahr+1; $i < date('Y'); $i++){
       $lebensjahre++;  
    }

    $restDies = date('z', time())+1;
    

    if(($restDies+$lebenstage) >= 365){
        $lebensjahre++;
    }

    return $lebensjahre;
}

?>
<div class="row" style="margin-top:20px">
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>THOMAS G&Uuml;CKEL (<?php echo getAge(24, 9, 1987); ?>)</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/Bildschirmfoto_2014-09-08_um_14.44.52.png'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>
            Nach  Abschluss des Abiturs habe ich eine Ausbildung als Bankkaufmann bei einer Sparkasse gemacht und mit Erfolg abgeschlossen (IHK). Im Anschluss habe ich mich als Fachberater f&uuml;r Finanzierung selbstst&auml;ndig gemacht und arbeite erfolgreich seit zwei Jahren in der Branche. Neben der Arbeit habe ich mich der Hessnatur Genossenschaft angeschlossen, bei der ich erst Aufsichtsratsmitglied und seit November 2012 als Vorstand t&auml;tig bin. Innerhalb des zu gr&uuml;ndenden Unternehmens &uuml;bernehme ich unter anderem den Bereich Finanzen, Kommunikation und Pr&auml;sentation, Projektarbeit, sowie sonstige anfallende Gesch&auml;ftlichen T&auml;tigkeiten, die mir von meinen Kollegen &uuml;bertragen werden.
        </p>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>MIRIAM G&Uuml;CKEL (24)</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/Bildschirmfoto_2014-09-08_um_14.44.52.png'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>
            Nach dem Abitur habe ich bei dem &Ouml;ko-Textilunternehmen <i>hessnatur</i> meine Ausbildung zur Kauffrau f&uuml;r Marketingkommunikation gemacht. W&auml;hrend den &Uuml;bernahmeverhandlungen des Unternehmens habe ich die Hessnatur Genossenschaft mit aufgebaut, dem Vorstand assistiert und war selbst im Aufsichtsrat t&auml;tig. Seit M&auml;rz 2013 studiere ich Kommunikationsdesign in Mainz und arbeite nebenbei selbstst&auml;ndig im Bereich Fotografie und Grafik. Innerhalb des zu gr&uuml;ndenden Unternehmens &uuml;bernehme ich die Bereiche der Markenkommunikation und werde bei Pr&auml;sentationen und Projektarbeit unterst&uuml;tzen.
        </p>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 container-small">
        <h4>SEBASTIAN KOINE (<?php echo getAge(8, 1, 1989); ?>)</h4>
        <div class="thumbnail" style="background-image:url(<?php echo base_url('gfx/Bildschirmfoto_2014-09-08_um_14.44.52.png'); ?>); background-size: 100%; background-position: 50% 50%">
        </div>
        <p>
            Nach meinem Abitur und anschlie&szlig;endem Zivildienst habe ich eine Ausbildung zum Fachinformatiker f&uuml;r Anwendungsentwicklung in einem mittelst&auml;ndischen Unternehmen in Fulda begonnen. Im Jahr 2012 legte ich meine Abschlusspr&uuml;fung bei der IHK Fulda mit Auszeichnung ab. Bereits w&auml;hrend meiner Ausbildungszeit habe ich Kundenprojekte betreut, Web-Anwendungen konzeptioniert und erfolgreich umgesetzt. In meinem Ausbildungsunternehmen war ich im Anschluss an meine Ausbildung bis M&auml;rz 2014 besch&auml;ftigt. Im Oktober 2013 habe ich dann ein Studium f&uuml;r Gymnasiallehramt mit der F&auml;cherkombination Informatik und Englisch begonnen. Innerhalb des zu gr&uuml;ndenden Unternehmens bin ich zust&auml;ndig f&uuml;r die Programmierung und allgemeine technische Betreuung des Portals.
        </p>
    </div>    
</div>
<?php

/**
 * VitexSoftware - další balíčky
 *
 * @package    VS
 * @subpackage WebUI
 * @author     Vitex <vitex@hippy.cz>
 * @copyright  2012 Vitex@hippy.cz (G)
 */
require_once 'includes/VSInit.php';



$oPage->addItem(new VSPageTop(_('Imap2MX for Roundcube and Squirrelmail')));
$oPage->AddPageColumns();

$prehled = $oPage->column2->addItem(new EaseHtmlDivTag());
$prehled->addItem('Plugin <strong>Imap2mx</strong> allow IMAP login to user\'s email address MX ip. This is special configuration for multiplete dedicated (ISPConfig) mailservers.');


$oPage->column2->addItem('<hr>');

$oPage->column1->addItem(new EaseHtmlH3Tag(_('Download')));


$oPage->column1->addItem('<div style="background-color: #CAAAAA; margin: 2px; padding: 5px;">imap2mx package<br>');

$dwDir = "/var/www/download/";
$d = dir($dwDir);
$downloads = array();
while (false !== ($entry = $d->read())) {
    if ($entry[0] == '.') {
        continue;
    }
    $downloads[$entry] = VSWebPage::_format_bytes(filesize($dwDir . $entry));
}
$d->close();
ksort($downloads);
$SquirelPackage = array();
$RoundcubePackage = array();
foreach ($downloads as $file => $size) {
    if (strstr($file, 'squirrelmail-imap2mx_')) {
        $SquirelPackage = array($file => $size);
    }
}



//echo '<pre>'; print_r($Downloads); echo '</pre>';

$oPage->column1->addItem(new EaseHtmlATag('download/' . key($SquirelPackage), '<img style="width: 42px;" src="img/deb-package.png">&nbsp;' . key($SquirelPackage) . ' ' . current($SquirelPackage), array('class' => 'btn btn-success')));

$oPage->column1->addItem('</div>');




$oPage->column3->addItem(new EaseHtmlH3Tag(_('Download')));


$oPage->column3->addItem('<div style="background-color: #CAAAAA; margin: 2px; padding: 5px;">imap2mx package<br>');

$dwDir = "/var/www/download/";
$d = dir($dwDir);
$downloads = array();
while (false !== ($entry = $d->read())) {
    if ($entry[0] == '.') {
        continue;
    }
    $downloads[$entry] = VSWebPage::_format_bytes(filesize($dwDir . $entry));
}
$d->close();
ksort($downloads);
$SquirelPackage = array();
$RoundcubePackage = array();
foreach ($downloads as $file => $size) {
    if (strstr($file, 'roundcube-plugin-imap2mx')) {
        $SquirelPackage = array($file => $size);
    }
}


//echo '<pre>'; print_r($Downloads); echo '</pre>';

$oPage->column3->addItem(new EaseHtmlATag('download/' . key($SquirelPackage), '<img style="width: 42px;" src="img/deb-package.png">&nbsp;' . key($SquirelPackage) . ' ' . current($SquirelPackage), array('class' => 'btn btn-success')));

$oPage->column3->addItem('</div>');





$oPage->column2->addItem('<h4>Debian installation</h4>');
$oPage->column2->addItem('<li><code>wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -</code></li>');
$oPage->column2->addItem('<li><code>echo deb http://v.s.cz/ stable main &gt; /etc/apt/sources.list.d/ease.list </code></li>');
$oPage->column2->addItem('<li><code>aptitude update</code></li>');
$oPage->column2->addItem('<strong><li><code>aptitude install squirrelmail-imap2mx</code></li></strong>');
$oPage->column2->addItem('<strong><li><code>aptitude install roundcube-plugin-imap2mx</code></li></strong>');

$oPage->column2->addItem('<h5>Compatible with</h5>');
$oPage->column2->addItem('<a href="http://debian.org/"><img style="width: 60px;" title="Debian Linux" src="img/debian.png"></a>');
$oPage->column2->addItem('<a href="http://ubuntu.com/"><img style="width: 60px;" title="Ubuntu Linux" src="img/ubuntulogo.png"></a>');


$oPage->column1->addItem(new EaseHtmlATag('http://squirrelmail.org/', '<img style="height: 32px;" src="img/sm_logo.png">&nbsp; Official project homepage', array('class' => 'btn btn-info')));
$oPage->column3->addItem(new EaseHtmlATag('http://www.roundcube.net/', '<img style="height: 32px;" src="img/rc_logo.png">&nbsp; Official project homepage', array('class' => 'btn btn-info')));

$oPage->addItem(new VSPageBottom());


$oPage->draw();


<?php

$Locale = QUI::getLocale();
$Engine = QUI::getTemplateManager()->getEngine();

/**
 * Emotion
 */
QUI\Utils\Site::setRecursivAttribute($Site, 'image_emotion');


/**
 * Logo
 */
$alt = "";
$Logo = false;
if ($Project->getMedia()->getLogoImage()) {
    $alt = $Project->getMedia()->getLogoImage()->getAttribute('title');
    $Logo = $Project->getMedia()->getLogo();
}


$Engine->assign(array(
    'Locale' => $Locale,
    'Logo' => $Logo,
    'alt' => $alt
));

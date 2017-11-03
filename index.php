<?php

$Locale = QUI::getLocale();

/**
 * Emotion
 */
QUI\Utils\Site::setRecursivAttribute($Site, 'image_emotion');

/**
 * Logo
 */
$alt  = "";
$Logo = false;

if ($Project->getMedia()->getLogoImage()) {
    $Logo = $Project->getMedia()->getLogoImage();
}

/**
 * Background
 */
$background = false;

if ($Project->getConfig('templateSimple.settings.pageBackground')) {
    $background = $Project->getConfig('templateSimple.settings.pageBackground');
}

/**
 * Colors
 */

$backgroundColor = '#fff';
$fontColor = '#5d5d5d';
$mainColor = '#787281';

if ($Project->getConfig('templateSimple.settings.backgroundColor')) {
    $backgroundColor = $Project->getConfig('templateSimple.settings.backgroundColor');
}

if ($Project->getConfig('templateSimple.settings.fontColor')) {
    $fontColor = $Project->getConfig('templateSimple.settings.fontColor');
}

if ($Project->getConfig('templateSimple.settings.fontColor')) {
    $mainColor = $Project->getConfig('templateSimple.settings.mainColor');
}


$Engine->assign(array(
    'Locale'   => $Locale,
    'Logo'     => $Logo,
    'children' => $Project->firstChild()->getNavigation(),
    'background' => $background,
    'fontColor' => $fontColor,
    'mainColor' => $mainColor,
    'backgroundColor' => $backgroundColor

));

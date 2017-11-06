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
$background            = false;
$ownImage              = false;
$backgroundColor       = '#503677';
$transparency          = 70;
$secondBackgroundColor = false;

// page background?
switch ($Project->getConfig('templateSimple.settings.pageBackground')) {
    // own image?
    case 'ownImage':
        if ($Project->getConfig('templateSimple.settings.ownImage')) {
            $ownImage = $Project->getConfig('templateSimple.settings.ownImage');
        }
        $background = true;
        break;

    case 'none':
        $background = false;
        break;

    default:
        $background = true;
}

// set transparency
if ($Project->getConfig('templateSimple.settings.transparency')) {
    $number = intval($Project->getConfig('templateSimple.settings.transparency'));

    if ($number < 1 || $number > 100) {
        $number = $transparency;
    }

    $transparency = $number;
}

// second background?
switch ($Project->getConfig('templateSimple.settings.secondBackgroundColor')) {
    case 'dark':
        $transparency          = $transparency / 100;
        $secondBackgroundColor = "rgba(0,0,0,$transparency)";
        break;

    case 'none':
        $secondBackgroundColor = false;
        break;

    default:
        $transparency          = $transparency / 100;
        $secondBackgroundColor = "rgba(255,255,255,$transparency)";
}


// background color
if ($Project->getConfig('templateSimple.settings.backgroundColor')) {
    $backgroundColor = $Project->getConfig('templateSimple.settings.backgroundColor');
}

/**
 * Colors
 */


$fontColor = '#5d5d5d';
$mainColor = '#787281';

if ($Project->getConfig('templateSimple.settings.fontColor')) {
    $fontColor = $Project->getConfig('templateSimple.settings.fontColor');
}

if ($Project->getConfig('templateSimple.settings.fontColor')) {
    $mainColor = $Project->getConfig('templateSimple.settings.mainColor');
}


$Engine->assign(array(
    'Locale'                => $Locale,
    'Logo'                  => $Logo,
    'children'              => $Project->firstChild()->getNavigation(),
    'ownImage'              => $ownImage,
    'background'            => $background,
    'fontColor'             => $fontColor,
    'mainColor'             => $mainColor,
    'backgroundColor'       => $backgroundColor,
    'secondBackgroundColor' => $secondBackgroundColor

));

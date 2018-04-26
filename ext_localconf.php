<?php
if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

// register pageNotFound_handling
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = 'USER_FUNCTION:AawTeam\\Pagenotfoundhandling\\Controller\\PagenotfoundController->main';

// Register an XCLASS for the realurl UrlDecoder
// Realurl versions below 1.12.8 are not supported, as of realurl version 2.0.12 $_GET['L'] will be provided anyway
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['DmitryDulepov\\Realurl\\Decoder\\UrlDecoder'] = [
    'className' => \AawTeam\Pagenotfoundhandling\Realurl\Decoder\UrlDecoder::class,
];
// version 1.12.8 was the first realurl version with official TYPO3 6.2 support
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['tx_realurl'] = [
    'className' => \AawTeam\Pagenotfoundhandling\Realurl\RealurlV1::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\Tx\Realurl\Hooks\UrlRewritingHook::class] = [
    'className' => \AawTeam\Pagenotfoundhandling\Realurl\RealurlV1::class,
];

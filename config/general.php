<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$isDev = App::env('ENVIRONMENT') === 'dev';
$isProd = App::env('ENVIRONMENT') === 'production';



return [
    'aliases' => [
        '@rootUrl' => craft\helpers\App::env('ROOT_URL'),
    ],
    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 1,

    // Whether generated URLs should omit "index.php"
    'omitScriptNameInUrls' => true,

    // The URI segment that tells Craft to load the control panel
    'cpTrigger' => App::env('CP_TRIGGER') ?: 'admin',

    // The secure key Craft will use for hashing and encrypting data
    'securityKey' => App::env('SECURITY_KEY'),

    // Whether Dev Mode should be enabled (see https://craftcms.com/guides/what-dev-mode-does)
    'devMode' => true,

    // Whether administrative changes should be allowed
    'allowAdminChanges' => true,

    // Whether crawlers should be allowed to index pages and following links
    'disallowRobots' => !$isProd,

    //'postLoginRedirect' => '/account',

    'postLogoutRedirect' => '/keycloak',

    'postLoginRedirect' => '/bgetemintranet',

    'verifyEmailSuccessPath' => '/keycloak/registrierung-abgeschlossen',

    'activateAccountSuccessPath' => '/login',

    'setPasswordPath' => 'passwort-setzen',

    'setPasswordRequestPath' => 'passwort-neu-anfordern',

    'setPasswordSuccessPath' => 'passwort-neu-erfolg',

    'limitAutoSlugsToAscii' => false,

    //'slugWordSeparator' => '',

    //'allowUppercaseInSlug' => true,

    'pageTrigger' => 'seite/',

    'maxUploadFileSize' => 100000000,
];

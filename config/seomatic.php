<?php 
return [
    // The public-facing name of the plugin
    'pluginName' => 'SEOmatic',

    // Should SEOmatic render metadata?
    'renderEnabled' => true,

    // Should SEOmatic render frontend sitemaps?
    'sitemapsEnabled' => getenv('SEO_SITEMAPS_ENABLED'),

    // Should sitemaps be regenerated automatically?
    'regenerateSitemapsAutomatically' => getenv('SEO_SITEMAPS_REGENERATE'),

    // Should sitemaps be submitted to search engines automatically whenever there are changes?
    'submitSitemaps' => true,

    // Should SEOmatic add to the http response headers?
    'headersEnabled' => true,

    // The server environment, either `live`, `staging`, or `local`
    'environment' => 'live',

    // Should SEOmatic display the SEO Preview sidebar?
    'displayPreviewSidebar' => true,

    // Should SEOmatic add a Social Media Preview Target?
    'socialMediaPreviewTarget' => true,

    // The social media platforms that should be displayed in the SEO Preview sidebar
    'sidebarDisplayPreviewTypes' => [
        'google',
        'twitter',
        'facebook'
    ],

    // Should SEOmatic display the SEO Analysis sidebar?
    'displayAnalysisSidebar' => true,

    // If `devMode` is on, prefix the <title> with this string
    'devModeTitlePrefix' => '&#x1f6a7; ',

     //  Prefix the Control Panel <title> with this string
    'cpTitlePrefix' => '&#x2699; ',

    // If `devMode` is on, prefix the Control Panel <title> with this string
    'devModeCpTitlePrefix' => '&#x1f6a7;&#x2699; ',

    // The separator character to use for the `<title>` tag
    'separatorChar' => '|',

    // The max number of characters in the `<title>` tag
    'maxTitleLength' => 70,

    // The max number of characters in the `<meta name="description">` tag
    'maxDescriptionLength' => 155,

    // Site Groups define logically separate sites
    'siteGroupsSeparate' => true,

    // Whether to dynamically include the hreflang tags
    'addHrefLang' => true,

    // Whether to dynamically include the `x-default` hreflang tags
    'addXDefaultHrefLang' => true,

    // Whether to dynamically include hreflang tags on paginated pages
    'addPaginatedHreflang' => true,

    // Should the Canonical URL be automatically lower-cased?
    'lowercaseCanonicalUrl' => true,

    // Should the meta generator tag and X-Powered-By header be included?
    'generatorEnabled' => true,

    // SEOmatic uses the Craft `siteUrl` to generate the external URLs.  If you
    // are using it in a non-standard environment, such as a headless GraphQL or
    // ElementAPI server, you can override what it uses for the `siteUrl` below.
    'siteUrlOverride' => '',

    // The duration of the SEOmatic meta cache in seconds. Null means always cached until explicitly broken
    // If devMode is on, caches last 30 seconds.
    'metaCacheDuration' => null,

    // Determines whether the meta container endpoint should be enabled for anonymous frontend access
    'enableMetaContainerEndpoint' => false,

    // Determines whether the JSON-LD endpoint should be enabled for anonymous frontend access
    'enableJsonLdEndpoint' => false,

    // SeoElementInterface[] The default SeoElement type classes
    'defaultSeoElementTypes' => [
    ],
];
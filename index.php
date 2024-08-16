<?php

define('ENV_FILE', '.env');

///////////////////////////////////////

loadEnv(ENV_FILE);

///////////////////////////////////////

define('PREVIEW_URL', env('PREVIEW_URL', ''));

///////////////////////////////////////

/**
 * Load environment variables
 */
function loadEnv(string $filename) {
    global $_ENV;

    if(file_exists(__DIR__ . '/' . $filename)) {
        $_ENV = parse_ini_file($filename, false, INI_SCANNER_TYPED);
    }
}

function env(string $key, $default = null) {
    return $_ENV[$key] ?? $default;
}

/////////////////////////////////////

/**
 * Differents values are: production, development, maintenance
 */
$mode = env('APP_MODE', 'production');

if($mode === 'maintenance')
{
    require_once 'maintenance.php'; 
}
else 
{
    require_once 'index.html';
}

exit;
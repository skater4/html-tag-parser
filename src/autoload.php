<?php
use Symfony\Component\Dotenv\Dotenv;
require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    // Define the base directory for the namespace prefix
    $base_dir = __DIR__ . '/';

    // Replace the namespace prefix with the base directory, replace namespace separators with directory separators, append with .php
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    // Use recursive function to go through directories
    $file = recursiveAutoload($file);

    // If the file exists, require it
    if ($file) {
        require $file;
    }
});

function recursiveAutoload($file)
{
    if (file_exists($file)) {
        return $file;
    }

    if (!is_dir(dirname($file))) {
        return false;
    }

    foreach (scandir(dirname($file)) as $item) {
        if ($item == '.' || $item == '..' || $item == '.git') continue;

        $path = dirname($file) . '/' . $item;
        if (is_dir($path)) {
            $recursiveFile = recursiveAutoload($path . '/' . basename($file));
            if ($recursiveFile) {
                return $recursiveFile;
            }
        }
    }

    return false;
}

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');
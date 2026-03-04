#!/usr/bin/env php
<?php
/**
 * CLI dispatcher. Run from the command line:
 *   php commands/cli.php <command>
 *   php commands/cli.php help
 *   php commands/cli.php hello
 *
 * Each command lives in its own file: commands/<command>.php
 */

if (php_sapi_name() !== 'cli') {
    fwrite(STDERR, "This script can only be run from the command line.\n");
    exit(1);
}

// List of available commands (each has a matching commands/<name>.php file)
$CLI_COMMANDS = [
    'hello'   => 'Say hello',
    'help'    => 'Show this help',
    'migrate' => 'Run migrations to latest',
];

$command = $argv[1] ?? 'help';

if (!isset($CLI_COMMANDS[$command])) {
    fwrite(STDERR, "Unknown command: {$command}\n");
    fwrite(STDERR, "Run: php " . basename($argv[0]) . " help\n");
    exit(1);
}

$commandFile = __DIR__ . DIRECTORY_SEPARATOR . $command . '.php';
if (!is_file($commandFile)) {
    fwrite(STDERR, "Command file missing: {$command}.php\n");
    exit(1);
}

require $commandFile;

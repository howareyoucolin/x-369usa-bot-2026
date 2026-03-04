<?php
/**
 * Run all pending migrations to latest. No rollback.
 * Migration files: public/migrations/*.php (run in filename order).
 * Each file receives $db; use $db->query(...) etc.
 */

$migrationsDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'migrations';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'db.php';

$db = new DB();

// Ensure migrations table exists
$db->query("
    CREATE TABLE IF NOT EXISTS migrations (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255) NOT NULL,
        batch INT UNSIGNED NOT NULL,
        UNIQUE KEY (migration)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
");

$run = $db->get_results("SELECT migration FROM migrations");
$runNames = array_column($run, 'migration');

$files = glob($migrationsDir . DIRECTORY_SEPARATOR . '*.php');
if ($files === false) {
    $files = [];
}
sort($files);

$batch = 1;
$existing = $db->get_var("SELECT MAX(batch) FROM migrations");
if ($existing !== false && $existing !== null) {
    $batch = (int) $existing + 1;
}

$ran = 0;
foreach ($files as $path) {
    $name = basename($path, '.php');
    if (in_array($name, $runNames, true)) {
        continue;
    }
    echo "Running: {$name}\n";
    (function () use ($path, $db) {
        include $path;
    })();
    $db->query("INSERT INTO migrations (migration, batch) VALUES ('" . $db->escape($name) . "', " . (int) $batch . ")");
    $ran++;
}

if ($ran === 0) {
    echo "Already up to date.\n";
} else {
    echo "Ran {$ran} migration(s).\n";
}

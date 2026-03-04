<?php
$script = basename($argv[0]);
echo "Usage: php {$script} <command>\n\n";
echo "Commands:\n";
foreach ($CLI_COMMANDS as $name => $desc) {
    echo "  " . str_pad($name, 8) . " {$desc}\n";
}

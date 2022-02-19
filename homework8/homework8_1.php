<?php
$path = "../";

$dir = new DirectoryIterator($path);
$level = 0;

function dirExplorer($directory, $level)
{
//    echo $level . "\n";
    foreach ($directory as $item) {
        if ($item->isDot()) continue;
        $name = $item->getBasename();
        if ($name[0] == ".") continue;
        echo str_repeat("  ", $level) . $item . "\n";
        if ($item->isDir()) {
           $path = new DirectoryIterator(str_replace("\\", "/", $item->getPathname()));
           dirExplorer($path, $level + 1);
        }

    }
}

dirExplorer($dir, $level);

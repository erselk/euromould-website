<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("resources/views"));
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() === "php") {
        $content = file_get_contents($file->getPathname());
        $newContent = preg_replace("/\{\{\s*asset\((.+?)\)\s*\}\}/", "{{ asset(\$1) . \"?v=3\" }}", $content);
        if ($newContent !== $content) {
            file_put_contents($file->getPathname(), $newContent);
            echo "Updated " . $file->getPathname() . "\n";
        }
    }
}


<?php

$dir = __DIR__ . '/resources/views';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

$count = 0;
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $content = file_get_contents($file->getPathname());
        
        if (strpos($content, 'btn-sm') !== false) {
            // Hapus 'btn-sm'
            $newContent = str_replace('btn-sm', '', $content);
            
            // Rapikan spasi ganda yang mungkin tertinggal di atribut class
            $newContent = preg_replace('/\s+class="([^"]*?)\s{2,}([^"]*?)"/', ' class="$1 $2"', $newContent);
            $newContent = preg_replace('/class="\s+/', 'class="', $newContent);
            $newContent = preg_replace('/\s+"/', '"', $newContent);
            
            file_put_contents($file->getPathname(), $newContent);
            echo "Memperbarui: " . $file->getFilename() . "\n";
            $count++;
        }
    }
}

echo "Selesai! $count file telah diperbarui.\n";

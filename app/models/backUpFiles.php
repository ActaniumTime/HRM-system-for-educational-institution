<?php
    $sourceDir = 'G:\Job\MAMP\htdocs\diploma\Files'; // Укажи здесь путь к каталогу с документами
    $backupDir = '../../backupsFiles/';
    $timestamp = date('Y-m-d_H-i-s');
    $zipFile = $backupDir . 'documents_' . $timestamp . '.zip';

    // Создание директории для архивов, если не существует
    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
        $zip->setPassword('rubicon_protocol');

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($sourceDir, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($sourceDir) + 1);

            if ($zip->addFile($filePath, $relativePath)) {
                // Шифруем добавленный файл
                $zip->setEncryptionName($relativePath, ZipArchive::EM_AES_256);
            }
        }

        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);
        exit;
    } else {
        echo "Не удалось создать архив.";
    }
?>

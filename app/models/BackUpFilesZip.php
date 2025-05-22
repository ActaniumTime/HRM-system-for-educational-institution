<?php
    $sourceDir = 'G:\Job\MAMP\htdocs\diploma\Files';
    $backupDir = '../../backupsFiles/';
    $timestamp = date('Y-m-d_H-i-s');
    $zipFile = $backupDir . 'documents_' . $timestamp . '.zip';
    $password = 'rubicon_protocol';

    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    $sevenZip = '"C:\\Program Files\\7-Zip\\7z.exe"';

    $command = "$sevenZip a -tzip \"$zipFile\" \"$sourceDir\\*\" -p$password -mem=AES256";

    exec($command, $output, $resultCode);

    if ($resultCode === 0 && file_exists($zipFile)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);
        exit;
    } else {
        echo "Не удалось создать архив. Код ошибки: $resultCode";
    }
?>

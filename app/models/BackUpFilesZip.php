<?php
    $sourceDir = 'G:\Job\MAMP\htdocs\diploma\Files';
    $backupDir = '../../backupsFiles/';
    $timestamp = date('Y-m-d_H-i-s');
    $zipFile = $backupDir . 'documents_' . $timestamp . '.zip';
    $password = 'rubicon_protocol';

    // Убедись, что директория для архивов существует
    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    // Путь к 7z — обязательно укажи полный путь, если не в системной переменной PATH
    $sevenZip = '"C:\\Program Files\\7-Zip\\7z.exe"';

    // Команда на создание зашифрованного архива
    $command = "$sevenZip a -tzip \"$zipFile\" \"$sourceDir\\*\" -p$password -mem=AES256";

    // Выполняем команду
    exec($command, $output, $resultCode);

    // Если архив создан успешно — отдать на скачивание
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

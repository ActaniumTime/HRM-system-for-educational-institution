<?php
require_once __DIR__ . '/UserVerify.php';

$mysqldumpPath = 'G:\\Job\\MAMP\\bin\\mysql\\bin\\mysqldump.exe';
$backupDir = '../../backups/';
if (!is_dir($backupDir)) {
    mkdir($backupDir, 0755, true);
}

$timestamp = date('Y-m-d_H-i-s');
$backupFile = $backupDir . 'backup_' . $timestamp . '.sql';
$zipFile = $backupDir . 'backup_' . $timestamp . '.zip';

$command = sprintf(
    '"%s" --default-character-set=utf8mb4 --set-charset --result-file="%s" --skip-comments %s -h %s -P %d -u %s --password=%s 2>&1',
    $mysqldumpPath,
    $backupFile,
    $database,
    $host,
    $port,
    $username,
    $password
);

exec($command, $output, $returnVar);

if ($returnVar === 0) {
    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
        $zip->setPassword('rubicon_protocol');
        $zip->addFile($backupFile, basename($backupFile));
        $zip->setEncryptionName(basename($backupFile), ZipArchive::EM_AES_256);
        $zip->close();
        unlink($backupFile);

        // Отдаем архив
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);
        exit;
    } else {
        echo "Не удалось создать архив.";
    }
} else {
    echo "Ошибка при дампе базы данных:";
    echo "<pre>";
    print_r($output);
    echo "</pre>";
}
?>

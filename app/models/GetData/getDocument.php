<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../models/UserVerify.php'; 
    require_once __DIR__ . '/../../models/Position.php';
    require_once __DIR__ . '/../../models/Document.php';

    if (!isset($_GET['documentID']) || !is_numeric($_GET['documentID'])) {
        http_response_code(400);
        echo "Некорректный запрос.";
        exit;
    }

    $docID = intval($_GET['documentID']);
    $document = new Document($connection);
    $document->loadByID($docID);

    $filePath = __DIR__ . '/../../../Files/documents/' . $document->getLinkToFile();

    if (!file_exists($filePath)) {
        http_response_code(404);
        echo "Документ не найден.";
        exit;
    }

    function getMimeType($filePath) {
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $filePath);
            finfo_close($finfo);
            return $mimeType;
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png'  => 'image/png',
            'gif'  => 'image/gif',
            'txt'  => 'text/plain',
            'csv'  => 'text/csv',
            'zip'  => 'application/zip'
        ];

        return $mimeTypes[$extension] ?? 'application/octet-stream';
    }

    // Получаем MIME-тип
    $mimeType = getMimeType($filePath);

    header("Content-Type: $mimeType");
    header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));

    readfile($filePath);
    exit;
?>

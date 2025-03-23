<?php
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';
    require_once __DIR__ . '/../../models/classes/Accreditation.php';

header('Content-Type: application/json');

try {
    // Получение и декодирование входных данных
    $inputData = json_decode(file_get_contents('php://input'), true);
    if (!$inputData) {
        throw new Exception('Некорректные данные');
    }

    // Проверка обязательных полей
    if (empty($inputData['employerID'])) {
        throw new Exception('Ошибка: отсутствует employerID');
    }

    // Инициализация объектов
    $accreditation = new Accreditation($connection);
    $document = new Document($connection);

    // Если указан accreditationID, загружаем существующую аккредитацию
    if (!empty($inputData['accreditationID'])) {
        $accreditation->loadByID($inputData['accreditationID']);
    }

    // Устанавливаем данные аккредитации
    $accreditation->setEmployerID($inputData['employerID']);
    $accreditation->setAccreditationPlan($inputData['accreditationPlan']);
    $accreditation->setDocumentYears($inputData['documentYears']);
    $accreditation->setFinishDay($inputData['finishDay']);
    $accreditation->setExperienceYears($inputData['currentYear']);

    // Обновление или создание аккредитации
    if (!empty($inputData['accreditationID'])) {
        $accreditation->updateData();
    } else {
        throw new Exception('Создание новой аккредитации не поддерживается этим модулем');
    }

    // Обработка документов
    $addedDocuments = [];
    foreach ($inputData['categories'] as $category) {
        if (empty($category['docID']) && !empty($category['docName'])) {
            $docID = $document->addDocument(
                $inputData['employerID'],
                $category['docName'],
                $category['sphere'],
                $category['purpose'],
                $category['docType'],
                '' // Файлы загружаются отдельно
            );
            $addedDocuments[] = $docID;
        }
    }

    // Возвращаем результат
    echo json_encode([
        'status' => 'success',
        'message' => 'Аккредитация успешно обновлена',
        'accreditationID' => $accreditation->getAccreditationID(),
        'addedDocumentIDs' => $addedDocuments
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
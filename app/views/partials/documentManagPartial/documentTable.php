
<div class="card" style="margin-top: 25px;">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Номер <br>документу</th>
                    <th scope="col">Властник</th>
                    <th scope="col">Назва документу</th>
                    <th scope="col">Категорія</th>
                    <th scope="col">Призначення</th>
                    <th scope="col">Тип <br>документ</th>
                    <th scope="col">Дії</th>
                </tr>
            </thead>
            <tbody id="documentTable">
                <?php 

                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $tempDoc = new Document($connection);
                    $documentList[] = new Document($connection);
                    $documentList = $tempDoc->getAll($connection);
                    $counter = 1;

                    foreach ($documentList as $document)
                    {   
                        echo "<tr class=\"table-row\">";
                        echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                        echo "<td>{$document->getDocumentID()}</td>";
                        echo "<td>{$document->getOwnerID()}</td>";
                        echo "<td>{$document->getDocumentName()}</td>";
                        echo "<td>{$document->getSphere()}</td>";
                        echo "<td>{$document->getPurpose()}</td>";
                        echo "<td>{$document->getDocType()}</td>";
                        echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";
                        echo "<a href=\"#\" class=\"docViewBtn\" data-documentID=\"{$position->getDocumentID()}\">

                        
                        <button type=\"button\" class=\"editEmployerBtn \" id=\"docViewBtn\"
                            data-documentID = \"{$document->getDocumentID()}\"
                            data-ownerID = \"{$document->getOwnerID()}\"
                            data-documentName = \"{$document->getDocumentName()}\"
                            data-sphere = \"{$document->getSphere()}\"
                            data-purpose = \"{$document->getPurpose()}\"
                            data-docType = \"{$document->getDocType()}\"
                            title=\"Переглянути документ\">
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 22\" class=\"icon_white no-click\">
                                <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                            </svg>
                            
                        </button>
                        </a>";

                        echo "<button type=\"button\" class=\"editEmployerBtn editPositionBtn\" 
                            data-documentID = \"{$document->getDocumentID()}\"
                            data-ownerID = \"{$document->getOwnerID()}\"
                            data-documentName = \"{$document->getDocumentName()}\"
                            data-sphere = \"{$document->getSphere()}\"
                            data-purpose = \"{$document->getPurpose()}\"
                            data-docType = \"{$document->getDocType()}\"

                            data-bs-toggle=\"modal\" 
                            data-bs-target=\"#EditPositionModal\"
                            title=\"Змінити дані про документ\">
                
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                            <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                            </svg>
                            
                        </button>";

                        echo "<button type=\"button\" class=\"Delete-button\" 
                            data-documentID = \"{$document->getDocumentID()}\"
                            data-ownerID = \"{$document->getOwnerID()}\"
                            data-documentName = \"{$document->getDocumentName()}\"
                            data-sphere = \"{$document->getSphere()}\"
                            data-purpose = \"{$document->getPurpose()}\"
                            data-docType = \"{$document->getDocType()}\"

                            data-bs-toggle=\"modal\"
                            data-bs-target=\"#deletePositionModal\"
                            title=\"Видалити документ\">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z\"/>
                            </svg>
                        </button>";

                        echo "</td>";

                        echo "</tr>";
                    }

                ?>

            </tbody>
            
        </table>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('positionsTable').addEventListener('click', event => {
        const button = event.target.closest('.docViewBtn');
        if (button) {
            const docID = button.getAttribute('data-documentID');
            window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
        }
    });
});

</script>



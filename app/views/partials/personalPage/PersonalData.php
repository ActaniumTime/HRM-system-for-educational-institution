<div class="card p-4">
    <h5 class="mb-3 text-center">Персональна інформація</h5>
    <div class="row">

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="../../../Files/photos/<?= $employerPage->getAvatar() ?: '/default-avatar.png' ?>" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <table class="table align-middle">
                <tbody>

                    <tr>
                        <th>ID співробітника</th>
                        <td><?= $employerPage->getEmployerID() ?></td>
                    </tr>

                    <tr>
                        <th>Рівень доступу у системі</th>
                        <?= $AccID = $employerPage->getAccessLevelID();
                        switch ($AccID) {
                            case 1:
                                echo "<td>Адміністратор/Директор</td>";
                                break;
                            case 2:
                                echo "<td>HR-менеджер</td>";
                                break;
                            case 3:
                                echo "<td>Співробітник</td>";
                                break;
                            default:
                                echo "<td>Не визначен</td>";
                                break;
                        }
                        ?>
                    </tr>
                    
                    <tr>
                        <th>ПІБ</th>
                        <td><?= $employerPage->getSurname() . ' ' . $employerPage->getName() . ' ' . $employerPage->getFathername(); ?></td>
                    </tr>
                    <tr>
                        <th>Дата народження</th>
                        <td><?= $employerPage->getBirthday(); ?></td>
                    </tr>
                    <tr>
                        <th>Стать</th>
                        <td><?= $employerPage->getGender(); ?></td>
                    </tr>
                    <tr>
                        <th>Паспорт</th>
                        <td><?= $employerPage->getPassportID(); ?></td>
                    </tr>
                    <tr>
                        <th>Адреса</th>
                        <td><?= $employerPage->getHomeAddress(); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $employerPage->getEmail(); ?></td>
                    </tr>
                    <tr>
                        <th>Телефон</th>
                        <td><?= $employerPage->getPhoneNumber(); ?></td>
                    </tr>
                    <tr>
                        <th>Відділ</th>
                        <td><?= $employerPage->getDepartment(); ?></td>
                    </tr>
                    <tr>
                        <th>Дата прийняття</th>
                        <td><?= $employerPage->getDateAccepted(); ?></td>
                    </tr>
                    <tr>
                        <th>Тип зайнятості</th>
                        <td><?= $employerPage->getEmploymentType(); ?></td>
                    </tr>
                    <tr>
                        <th>Поточний статус</th>
                        <td><?= $employerPage->getCurrentStatus(); ?></td>
                    </tr>
                    <?php if ($employerPage->getDateFired()) : ?>
                    <tr>
                        <th>Дата звільнення</th>
                        <td><?= $employerPage->getDateFired(); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Підстава прийняття</th>
                        <td><?= $employerPage->getAdmissionBasis(); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
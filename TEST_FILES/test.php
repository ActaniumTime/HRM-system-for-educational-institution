<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    set_include_path(__DIR__ . '/../');

    require_once 'app/models/Employer.php';
    require_once 'app/models/Position.php';
    require_once 'app/models/Vocations.php';
    require_once 'app/models/ContinuingEducation.php';
    require_once 'app/models/Order.php';
    require_once 'app/models/Document.php';
    require_once 'app/models/AccessLevel.php';
    require_once 'app/models/EmployerPositions.php';
    require_once 'app/models/Continuingeducationhistory.php';
    require_once 'app/models/EmploymentContracts.php';

    require_once 'config/database.php'; 

    echo "<br><br>";    

    $emp = new Employer($connection);
    $emp->loadByID(1);
    $emp->Show();
    
    echo "<br>";


    // $emp1 = new Employer($connection);
    // $dateFired = NULL; 
    // $emp1->addEmployer(
    //     1,              // accessLevelID
    //     "password789",  // Пароль
    //     "Al5555ex",         // Имя
    //     "Johnson",      // Фамилия
    //     "Michael",      // Отчество
    //     "1985-07-23",   // Дата рождения
    //     "male",         // Пол
    //     "CD4567890",    // Номер паспорта
    //     "789 Pine Street", // Домашний адрес
    //     "alex.joh44nson@example.com", // Электронная почта
    //     "+14523456780",   // Номер телефона
    //     "IT Department",// Кафедра/отделение
    //     "2015-06-01",   // Дата приема на работу
    //     "Active",       // Статус
    //     $dateFired,     // Дата увольнения (если нет, то NULL)
    //     "Contract #003",// Основание для приема
    //     "Full-time"     // Тип занятости
    // );


    // $courseEng = new ContinuingEducation($connection);
    // $courseEng->addNewCourse(1, 'English', 'English school', '2020-01-01', '2020-02-01', 'Ongoing', 1, 100, 10);

    // $doc = new Document($connection);

    // $doc->addDocument(
    //     1, // ownerID
    //     "Certificate of Completion", // documentName
    //     "Education", // sphere
    //     "Completion of English course", // purpose
    //     "PDF", // docType
    //     "./files/pdf/somefile.pdf" // linkToFile
    // );
    

    // $order = new Order($connection);
    // $order->addOrder("2020-01-01", "Employment", 1, "./files/pdf/somefile.pdf");
    

    // $AC = new AccessLevel($connection);
    // $AC->addNewLevel("Admin-root");

    // $pos = new Position($connection);
    // $pos->addNewPosition("Senior Engineer", "Senior", "5 years of experience", 50000);


    // $vocation = new Vocations($connection);
    // $vocation->addVocation(
    //     1,            
    //     "Sick Leave",   
    //     "2025-01-10",    
    //     "2025-01-20",  
    //     "Ongoing",       
    //     32              
    // );


    // $contract = new Employmentcontracts($connection);
    // $contract->addContract(1, 1, 1, "Contract #001", "2020-01-01", "2020-12-31");


    // $EP = new EmployerPositions($connection);
    // $EP->addEmployerPosition(1, 2);



    // $emp1 = new Employer($connection);
    // $dateFired = NULL; 
    // $emp1->addEmployer(
    //     1,              // accessLevelID
    //     "password789",  // Пароль
    //     "Al5555ex",         // Имя
    //     "Johnson",      // Фамилия
    //     "Michael",      // Отчество
    //     "1985-07-23",   // Дата рождения
    //     "male",         // Пол
    //     "CD4567890",    // Номер паспорта
    //     "789 Pine Street", // Домашний адрес
    //     "alex.joh44nson@example.com", // Электронная почта
    //     "+14523456780",   // Номер телефона
    //     "IT Department",// Кафедра/отделение
    //     "2015-06-01",   // Дата приема на работу
    //     "Active",       // Статус
    //     $dateFired,     // Дата увольнения (если нет, то NULL)
    //     "Contract #003",// Основание для приема
    //     "Full-time"     // Тип занятости
    // );
    
    
   // $emp1->create();


    // $emp1 = new Employer($connection);
    // $emp1->addEmp("Ivan", "Ivanov", "Ivanovich", "12.12.2000", "man", "dfkwjfio", "anal_street", "lolo@gmail.com", "88005535", "himic", "12.12.2000", "Active", "NONE", "big boss", "Contract #001", "1", "password111" );
    // $emp1->create();
    
    
    // $empl = new Employer($connection);
    // $empl->addEmployer("John", "Doe", "Smith", "01.01.1990", "male", "123456789", "example_street", "john.doe@example.com", "1234567890", "engineer", "01.01.2010", "Active", "NONE", "senior engineer", "Contract #002", "2", "password123");



    // echo "<br>";

    // $pos = new Position($connection);
    // $pos->loadByID(2);

    // $pos->Show();

    // echo "<br>";

    // $CE = new ContinuingEducation($connection);
    // $CE->loadByID(1);
    // $CE->Show();

    // echo "<br>";

    // $vocation = new Vocations($connection);
    // $vocation->LoadByID(1);
    // $vocation->Show();

    // echo "<br>";

    // $order = new Order($connection);
    // $order->LoadByID(1);
    // $order->Show();

    // echo "<br>";

    // $doc = new Document($connection);
    // $doc->loadByID(1);
    // $doc->Show();
    // $doc->showOwner();

    // echo "<br>";

    // $access = new AccessLevel($connection);
    // $access->loadByID(1);   
    // $access->Show();

    // echo "create new level <br>";
    //$access->createLevel("Admin", 2);

    // echo "<br>";

    // $docEmp = new Document($connection);
    // $docEmp->loadByID(1);
    // $docEmp->Show();

    // echo "<br>";

    // $empPos = new EmployerPositions($connection);
    // $empPos->loadByID(1);
    // $empPos->Show();

    // echo "<br>";

    
    // $his = new Continuingeducationhistory($connection);
    // $his->loadByID(1);
    // $his->Show();




?>
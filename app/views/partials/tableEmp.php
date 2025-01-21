<div class="container my-4">
    <h1 class="text-center mb-4">All Employees</h1>

    <div class="row">
        <!-- Table Section -->
        <div class="col-lg-9">

            <div class="table-responsive card">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Employer's ID</th>
                            <th scope="col">Access Level</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Fathername</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Passport ID</th>
                            <th scope="col">Home Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Department</th>
                            <th scope="col">Accepted From</th>
                            <th scope="col">Current Status</th>
                            <th scope="col">Fired From</th>
                            <th scope="col">Admission Basis</th>
                            <th scope="col">Employment Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTable">
                        <?php 
                            $EmployersList[] = new Employer($connection);
                            $EmployersList = $emp->getAll($connection);
                            $counter = 1;


                            foreach ($EmployersList as $employer)
                            {   
                                echo "<tr>";
                                echo "<th scope=\"row\">" . $counter++ . "</th>";
                                echo "<td><img src=\"../../../Files/photos/{$employer->getAvatar()}\" alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\"  id=\"employerAvatar\"></td>";
                                echo "<td>{$employer->getEmployerID()}</td>";
                                echo "<td>{$employer->getAccessLevelID()}</td>";
                                echo "<td>{$employer->getName()}</td>";
                                echo "<td>{$employer->getSurname()}</td>";
                                echo "<td>{$employer->getFathername()}</td>";
                                echo "<td>{$employer->getBirthday()}</td>";
                                echo "<td>{$employer->getGender()}</td>";
                                echo "<td>{$employer->getPassportID()}</td>";
                                echo "<td>{$employer->getHomeAddress()}</td>";
                                echo "<td>{$employer->getEmail()}</td>";
                                echo "<td>{$employer->getPhoneNumber()}</td>";
                                echo "<td>{$employer->getDepartment()}</td>";
                                echo "<td>{$employer->getDateAccepted()}</td>";
                                echo "<td>{$employer->getCurrentStatus()}</td>";
                                echo "<td>{$employer->getDateFired()}</td>";
                                echo "<td>{$employer->getAdmissionBasis()}</td>";
                                echo "<td>{$employer->getEmploymentType()}</td>";   
                                echo "<td>";
                                echo "<button type=\"button\" class=\"btn btn-primary editEmployerBtn\" 
                                        data-employer-avatar=\"../../../Files/photos/{$employer->getAvatar()}\"
                                        data-employer-id=\"{$employer->getEmployerID()}\"
                                        data-access-level-id=\"{$employer->getAccessLevelID()}\"
                                        data-name=\"{$employer->getName()}\"
                                        data-surname=\"{$employer->getSurname()}\"
                                        data-fathername=\"{$employer->getFathername()}\"
                                        data-birthday=\"{$employer->getBirthday()}\"
                                        data-gender=\"{$employer->getGender()}\"
                                        data-passport-id=\"{$employer->getPassportID()}\"
                                        data-home-address=\"{$employer->getHomeAddress()}\"
                                        data-email=\"{$employer->getEmail()}\"
                                        data-phone-number=\"{$employer->getPhoneNumber()}\"
                                        data-department=\"{$employer->getDepartment()}\"
                                        data-date-accepted=\"{$employer->getDateAccepted()}\"
                                        data-current-status=\"{$employer->getCurrentStatus()}\"
                                        data-date-fired=\"{$employer->getDateFired()}\"
                                        data-admission-basis=\"{$employer->getAdmissionBasis()}\"
                                        data-employment-type=\"{$employer->getEmploymentType()}\"
                                        data-bs-toggle=\"modal\" data-bs-target=\"#employerModal\">
                                        Edit Employer
                                      </button>";
                                echo "</td>";
                                
                                echo "</tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="col-lg-3">
            
            <div class="search-container mb-4 card">
                <input type="text" class="form-control search-input" id="searchInput" placeholder="Search by Name, Surname, or Fathername">
                <span class="search-icon" id="searchIcon">&#128269;</span>
            </div>

            <div class="filter-menu card" style="padding: 1rem;">
                <div class="mb-4">
                    <label for="accessLevelFilter" class="form-label">Access Level</label>
                    <select class="form-select" id="accessLevelFilter">
                        <option value="">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="genderFilter" class="form-label">Gender</label>
                    <select class="form-select" id="genderFilter">
                        <option value="">All</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="departmentFilter" class="form-label">Department</label>
                    <select class="form-select" id="departmentFilter">
                        <option value="">All</option>
                        <!-- Dynamic options from server -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="employmentTypeFilter" class="form-label">Employment Type</label>
                    <select class="form-select" id="employmentTypeFilter">
                        <option value="">All</option>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                    </select>
                </div>

                <div class="d-grid gap-3">
                    <button class="btn btn-outline-primary" id="sortByBirthday">Sort by Birthday</button>
                    <button class="btn btn-outline-primary" id="sortByDateAccepted">Sort by Date Accepted</button>
                    <button class="btn btn-outline-primary" id="sortByDateFired">Sort by Date Fired</button>
                    <button class="btn btn-outline-danger" id="resetFilters">Reset Filters</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("employeeTable");
    const tableRows = Array.from(table.rows); // Сохраняем строки таблицы, исключая заголовок
    const sortState = {
        birthday: true,
        dateAccepted: true,
        dateFired: true,
    };

    // Делегирование событий для фильтров
    document.addEventListener("change", (event) => {
        if (event.target.matches("#accessLevelFilter, #genderFilter, #departmentFilter, #employmentTypeFilter")) {
            applyFilters();
        }
    });

    // Делегирование событий для сортировки
    document.addEventListener("click", (event) => {
        if (event.target.matches("#sortByBirthday")) {
            sortTable(7, true, "birthday");
        } else if (event.target.matches("#sortByDateAccepted")) {
            sortTable(14, true, "dateAccepted");
        } else if (event.target.matches("#sortByDateFired")) {
            sortTable(16, true, "dateFired");
        } else if (event.target.matches("#resetFilters")) {
            resetFilters();
        }
    });

    function applyFilters() {
        const filters = {
            accessLevel: document.getElementById("accessLevelFilter").value,
            gender: document.getElementById("genderFilter").value.toLowerCase(),
            department: document.getElementById("departmentFilter").value.toLowerCase(),
            employmentType: document.getElementById("employmentTypeFilter").value.toLowerCase(),
        };

        tableRows.forEach((row) => {
            const cells = row.cells;
            if (!cells.length) return; // Пропуск строк заголовков

            const matchesAccessLevel = !filters.accessLevel || cells[3].textContent.trim() === filters.accessLevel;
            const matchesGender = !filters.gender || cells[8].textContent.trim().toLowerCase() === filters.gender;
            const matchesDepartment = !filters.department || cells[13].textContent.trim().toLowerCase().includes(filters.department);
            const matchesEmploymentType = !filters.employmentType || cells[18].textContent.trim().toLowerCase().includes(filters.employmentType);

            row.style.display = matchesAccessLevel && matchesGender && matchesDepartment && matchesEmploymentType ? "" : "none";
        });
    }

    function sortTable(columnIndex, isDate = false, sortKey) {
        const rows = tableRows.filter((row) => row.cells.length > 0 && row.style.display !== "none"); // Только видимые строки
        const ascending = sortState[sortKey];

        rows.sort((a, b) => {
            const valA = a.cells[columnIndex].textContent.trim();
            const valB = b.cells[columnIndex].textContent.trim();

            if (isDate) {
                return ascending ? new Date(valA) - new Date(valB) : new Date(valB) - new Date(valA);
            }
            return ascending ? valA.localeCompare(valB) : valB.localeCompare(valA);
        });

        rows.forEach((row) => table.appendChild(row));
        sortState[sortKey] = !ascending;
    }

    function resetFilters() {
        document.getElementById("accessLevelFilter").value = "";
        document.getElementById("genderFilter").value = "";
        document.getElementById("departmentFilter").value = "";
        document.getElementById("employmentTypeFilter").value = "";

        tableRows.forEach((row) => {
            row.style.display = "";
            table.appendChild(row);
        });
    }
});


</script>


<div class="modal fade" id="employerModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employerModalLabel">Employer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employerForm"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img id="employerAvatar" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="border: 3px solid #5a5af7; margin-bottom: 15px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="employerID" class="form-label">Employer ID</label>
                            <input type="text" class="form-control" id="employerID" name="employerID" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="accessLevelID" class="form-label">Access Level ID</label>
                            <input type="text" class="form-control" id="accessLevelID" name="accessLevelID">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fathername" class="form-label">Fathername</label>
                            <input type="text" class="form-control" id="fathername" name="fathername">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Passport ID</label>
                            <input type="text" class="form-control" id="passportID" name="passportID">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="homeAddress" class="form-label">Home Address</label>
                            <input type="text" class="form-control" id="homeAddress" name="homeAddress">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Date Accepted</label>
                            <input type="date" class="form-control" id="dateAccepted" name="dateAccepted">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="currentStatus" class="form-label">Current Status</label>
                            <input type="text" class="form-control" id="currentStatus" name="currentStatus">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Date Fired</label>
                            <input type="date" class="form-control" id="dateFired" name="dateFired">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="admissionBasis" class="form-label">Admission Basis</label>
                            <input type="text" class="form-control" id="admissionBasis" name="admissionBasis">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="employmentType" class="form-label">Employment Type</label>
                            <input type="text" class="form-control" id="employmentType" name="employmentType">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="employerForm">Save Changes</button>
                <button id="downloadJson" class="btn btn-success">Download JSON</button>

            </div>
        </div>
    </div>
</div>


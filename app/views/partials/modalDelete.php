<!-- Delete Employer Modal -->
<div class="modal fade" id="deleteEmployerModal" tabindex="-1" aria-labelledby="deleteEmployerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEmployerModalLabel">Delete Employer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this employer?</p>
                <p><strong>Employer ID:</strong> <span id="deleteEmployerId"></span></p>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Confirm with your password:</label>
                    <input type="password" id="adminPassword" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteEmployer">Delete</button>
            </div>
        </div>
    </div>
</div>



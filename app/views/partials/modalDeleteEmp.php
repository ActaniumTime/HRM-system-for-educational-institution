<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Employer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="deleteEmployerForm">
          <input type="hidden" id="deleteEmployerID" name="employerID">
          <div class="mb-3">
            <label for="verifyPassword" class="form-label">Enter Your Password</label>
            <input type="password" class="form-control" id="verifyPassword" name="password" placeholder="Password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="confirmDeletion" required>
            <label class="form-check-label" for="confirmDeletion">I confirm that I want to delete this employer</label>
          </div>
          <div class="text-danger" id="errorText" style="display: none;">Invalid password or confirmation.</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>

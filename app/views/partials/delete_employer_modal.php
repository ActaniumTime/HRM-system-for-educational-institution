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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteEmployer">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript for handling modal interactions
    document.querySelectorAll('.Delete-button').forEach(button => {
        button.addEventListener('click', event => {
            const employerId = button.getAttribute('data-employer-id');
            document.getElementById('deleteEmployerId').textContent = employerId;

            const confirmButton = document.getElementById('confirmDeleteEmployer');
            confirmButton.onclick = () => deleteEmployer(employerId);
        });
    });

    function deleteEmployer(employerId) {
        fetch('../../app/models/delete-endpoint.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ employerID: employerId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Refresh the page or remove the row from the table
                tab
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the employer.');
        });
    }
</script>

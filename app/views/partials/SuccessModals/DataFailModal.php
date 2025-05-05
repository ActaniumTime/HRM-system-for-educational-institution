<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorModalLabel">Помилка</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Закрити"></button>
      </div>
      <div class="modal-body">
        <p id="errorModalMessage" class="mb-0">Щось пішло не так...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>

<script>
function showErrorModal(message) {
  const msgElement = document.getElementById('errorModalMessage');
  msgElement.textContent = message || 'Невідома помилка.';

  const modal = new bootstrap.Modal(document.getElementById('errorModal'));
  modal.show();
}
</script>

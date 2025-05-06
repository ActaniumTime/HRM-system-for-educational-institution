function showSuccessAddEmpModal() {
    // Создать кастомный затемнитель
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successAddEmpModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); // удалить затемнитель
      location.reload();
    }, 3000);
  }
  
  function showSuccessModal() {
    // Создать кастомный затемнитель
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); // удалить затемнитель
      location.reload();
    }, 3000);
  }

  function showSuccessAddPosModal() {
    // Создать кастомный затемнитель
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successAddPosModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); // удалить затемнитель
      location.reload();
    }, 3000);
  }









  function closeAllModals() {
    // Найти все открытые модалки
    const modals = document.querySelectorAll('.modal.show');

    modals.forEach(modal => {
        // Используем Bootstrap API для скрытия
        const modalInstance = bootstrap.Modal.getInstance(modal);
        if (modalInstance) {
            modalInstance.hide();
        }
    });
}
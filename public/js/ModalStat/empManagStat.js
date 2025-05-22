function showSuccessAddEmpModal() {

    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successAddEmpModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }
  
  function showSuccessModal() {

    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }

  function showSuccessAddPosModal() {

    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successAddPosModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300);
      location.reload();
    }, 3000);
  }



  function showSuccessDeleteModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successDelEmpModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300);
      location.reload();
    }, 3000);
  }

    function showSuccessDelPosModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('SuccessDelPosModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }




  function showSuccessUpdAccredModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successUpdAccredModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }


    function showSuccessAddCourseModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('SuccessAddCourseModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }


  function showSuccessUpdateCourseModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('SuccessUpdateCourseModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }


  function showSuccessDeleteCourseModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('SuccessDeleteCourseModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
    }, 3000);
  }

  function showSuccessUpdDocModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('successUpdDocModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
      location.reload();
    }, 3000);
  }

    function showSuccesDelDoccModal() {
    const backdrop = document.createElement('div');
    backdrop.classList.add('custom-backdrop');
    document.body.appendChild(backdrop);
    setTimeout(() => backdrop.classList.add('show'), 10);
  
    const modal = new bootstrap.Modal(document.getElementById('SuccessDeleteDocModal'));
    modal.show();
  
    setTimeout(() => {
      modal.hide();
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300); 
    }, 3000);
  }










  function closeAllModals() {

    const modals = document.querySelectorAll('.modal.show');

    modals.forEach(modal => {

        const modalInstance = bootstrap.Modal.getInstance(modal);
        if (modalInstance) {
            modalInstance.hide();
        }
    });
}
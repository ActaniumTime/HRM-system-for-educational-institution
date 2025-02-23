document.addEventListener("DOMContentLoaded", function () {
    let tooltipTimeouts = new Map();

    document.addEventListener("mouseover", event => {
        let target = event.target.closest("button, a[data-bs-toggle='tooltip']");
        if (target && !tooltipTimeouts.has(target)) {
            let title = target.getAttribute("title") || target.getAttribute("data-bs-original-title");
            if (title) {
                target.setAttribute("data-bs-original-title", title);
                target.removeAttribute("title");
            }

            let timeout = setTimeout(() => {
                if (document.body.contains(target)) {
                    if (target.tooltipInstance) {
                        target.tooltipInstance.dispose();
                    }
                    target.tooltipInstance = new bootstrap.Tooltip(target, {
                        title: title,
                        customClass: "custom-tooltip",
                        container: "body"
                    });
                    target.tooltipInstance.show();
                }
            }, 1000);

            tooltipTimeouts.set(target, timeout);
        }
    });

    document.addEventListener("mouseout", event => {
        let target = event.target.closest("button, a[data-bs-toggle='tooltip']");
        if (target) {
            clearTimeout(tooltipTimeouts.get(target));
            tooltipTimeouts.delete(target);
            if (target.tooltipInstance) {
                target.tooltipInstance.dispose();
                target.tooltipInstance = null;
            }
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', (event) => {

        if (event.target && event.target.classList.contains('editDocumentBtn')) {
            console.log("JS work 2");

            const documentID = event.target.getAttribute('data-documentID');
            const ownerID = event.target.getAttribute('data-ownerID');
            const documentName = event.target.getAttribute('data-documentName');
            const sphere = event.target.getAttribute('data-sphere');
            const purpose = event.target.getAttribute('data-purpose');
            const docType = event.target.getAttribute('data-docType');
            
            document.getElementById('editDocID').value = documentID;
            document.getElementById('editDocName').value = documentName;
            document.getElementById('editSphere').value = sphere;
            document.getElementById('editPurpose').value = purpose;
            document.getElementById('editDocType').value = docType;

        }
    });
});



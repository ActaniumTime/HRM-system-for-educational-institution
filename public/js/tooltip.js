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
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

require('./bootstrap');

window.MiniBook = window.MiniBook || {};

/**
 * Show a Bootstrap toast. Used across customer and admin pages.
 *
 * @param {string} message
 * @param {'success'|'danger'|'warning'|'info'} variant
 */
window.MiniBook.toast = function (message, variant = 'success') {
    const container = document.getElementById('mb-toast-container');

    if (!container) {
        return;
    }

    const icons = {
        success: 'bi-check-circle-fill',
        danger: 'bi-exclamation-octagon-fill',
        warning: 'bi-exclamation-triangle-fill',
        info: 'bi-info-circle-fill',
    };

    const toastEl = document.createElement('div');
    toastEl.className = 'toast align-items-center border-0 mb-card';
    toastEl.setAttribute('role', 'status');
    toastEl.setAttribute('aria-live', 'polite');
    toastEl.setAttribute('aria-atomic', 'true');
    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body d-flex align-items-start gap-2">
                <i class="bi ${icons[variant] || icons.info} text-${variant}"></i>
                <span>${message}</span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Tutup"></button>
        </div>
    `;

    container.appendChild(toastEl);

    const toast = new bootstrap.Toast(toastEl, { delay: 4500 });
    toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
    toast.show();
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-auto-dismiss]').forEach((element) => {
        const delay = Number(element.dataset.autoDismiss) || 6000;

        window.setTimeout(() => {
            bootstrap.Alert.getOrCreateInstance(element).close();
        }, delay);
    });

    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((element) => {
        new bootstrap.Tooltip(element);
    });
});

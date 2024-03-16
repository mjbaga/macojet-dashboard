export function confirmModal(callback, form) {
    const btnConfirm = document.querySelector('.confirm-modal #btn-confirm');

    btnConfirm.addEventListener('click', () => {
        callback(true, form);
    });
};
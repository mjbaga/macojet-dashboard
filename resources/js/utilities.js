export function confirmModal(callback) {
    const btnConfirm = document.querySelector('.confirm-modal #btn-confirm');

    btnConfirm.addEventListener('click', () => {
        callback(true);
    });
};
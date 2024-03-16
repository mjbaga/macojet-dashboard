import './bootstrap';
import '../sass/app.scss'

import { Modal } from "bootstrap";
import ContractPage from './components/ContractPage';

import Alpine from 'alpinejs';

import { confirmModal } from './utilities';

window.Alpine = Alpine;

Alpine.start();

Alpine.store('boarder-tabs', {
    current: 'personal',
    items: ['personal', 'contact', 'type']
});

(()=> {

    const contractPage = document.querySelector('.contract-form');

    if(contractPage) {
        new ContractPage();
    }

    const deleteButtons = document.querySelectorAll('.index-delete-btn');

    deleteButtons.forEach((btn) => {

        btn.addEventListener('click', () => {
            const form = btn.parentElement;

            confirmModal((confirm) => {
                if(confirm) {
                    form.submit();
                }
            }, form);
        })
    });

})();
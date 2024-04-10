import './bootstrap';

import ContractPage from './components/ContractPage';

import { confirmModal } from './utilities';
import NotesFormComponent from './components/NotesFormComponent';

(()=> {

    const contractPage = document.querySelector('.contract-form');

    if(contractPage) {
        new ContractPage();
    }

    const notesForm = document.querySelector('#note-form');

    if(notesForm) {
        new NotesFormComponent();
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
import './bootstrap';

import ContractForm from './components/ContractForm';

import { confirmModal } from './utilities';
import NotesFormComponent from './components/NotesFormComponent';

(()=> {

    // const contractForm = document.querySelector('.contract-form');

    // if(contractForm) {
        // new ContractForm();
    // }

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
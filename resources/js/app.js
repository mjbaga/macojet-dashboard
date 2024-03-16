import './bootstrap';
import '../sass/app.scss'

import { Modal } from "bootstrap";
import ContractPage from './components/ContractPage';

import Alpine from 'alpinejs';

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
    
})();
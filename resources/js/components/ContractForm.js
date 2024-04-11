'use strict';

import { confirmModal } from "../utilities";

export default class ContractForm {

    constructor() {
    
        const unitSelect = document.querySelector('#unit_id');
        const roomSelect = document.querySelector('#room_id');

        const defaultOptionStr = `<option>Select Room</option>`;

        unitSelect.addEventListener('change', (e) => {
            const id = e.target.value;

            // clear select options
            roomSelect.innerHTML = '';
            roomSelect.insertAdjacentHTML('beforeend', defaultOptionStr);

            // return if no unit is selected
            if(id <= 0) return;
    
            // fetch rooms and append as option
            fetch(`/api/units/${id}/rooms`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(response => {
                
                const roomOptions = response.data;

                roomOptions.forEach(room => {
                    const option = `<option value="${room.id}">${room.room_number}</option>`;
                    roomSelect.insertAdjacentHTML('beforeend', option);
                });
            });
        });

        const terminateForm = document.querySelector('#terminate-contract-form');

        confirmModal((confirm) => {
            if(confirm) {
                terminateForm.submit();
            }
        }, terminateForm);
        
    }

}
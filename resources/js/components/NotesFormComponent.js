'use strict';

export default class NotesFormComponent {

    constructor() {
        const notesTypeDropdown = document.querySelector('#note_type');
        const reminderAlarm = document.querySelector('#reminder_alarm_container');

        notesTypeDropdown.addEventListener('change', (e) => {
            const val = e.target.value;

            console.log(val);

            if(val === 'reminder') {
                reminderAlarm.classList.remove('hidden');
            } else {
                reminderAlarm.classList.add('hidden');
            }
        });
    }
}
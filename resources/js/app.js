import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Alpine.store('boarder-tabs', {
    current: 'personal',
    items: ['personal', 'contact', 'type']
});

(()=> {
    const newRoomBtn = document.querySelector('#new-room');

    newRoomBtn.addEventListener('click', (e)=> {
        e.preventDefault();
        
        
    });
})();
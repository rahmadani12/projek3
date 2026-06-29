import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import './editor';

window.Echo.channel('notes')
    .listen('.note.updated', (e) => {

        console.log("Realtime berhasil");

        console.log(e.note);

    });
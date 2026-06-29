const title = document.getElementById('title');
const content = document.getElementById('content');
const status = document.getElementById('status');

if (title && content) {

    const noteId = window.location.pathname.split('/')[2];

    let timer;

    function save() {

        clearTimeout(timer);

        timer = setTimeout(() => {

            fetch(`/notes/${noteId}`, {

                method: 'PUT',

                headers: {

                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .content,

                },

                body: JSON.stringify({

                    title: title.value,

                    content: content.value,

                }),

            }).then(() => {

                status.innerHTML = 'Tersimpan...';

            });

        }, 500);

    }

    title.addEventListener('keyup', save);
    content.addEventListener('keyup', save);

    window.Echo.channel('notes')
        .listen('.note.updated', (e) => {

            if (e.note.id == noteId) {

                title.value = e.note.title;
                content.value = e.note.content;

                status.innerHTML = 'Diupdate oleh user lain';

            }

        });

}
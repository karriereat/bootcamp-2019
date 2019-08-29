var form = document.getElementById('comments');

function submitForm(event) {
    event.preventDefault();

    clearErrors();

    var errors = [];

    var data = {
        name: form.name.value,
        comment: form.comment.value,
    };

    if (!data.name.length) {
        errors.push('Bitte einen Namen eingeben.');
    }

    if (!data.comment.length) {
        errors.push('Bitte ein Kommentar eingeben.');
    }

    if (errors.length) {
        showErrors(form, errors);
    } else {
        sendJSON(
            'http://localhost:8000/comments.php', 
            data, 
            function(response) {
                if (response.errors) {
                    showErrors(form, errors);
                } else {
                    // TODO Kommentar anzeigen
                }
            }
        );
    }
}

form.addEventListener('submit', submitForm);

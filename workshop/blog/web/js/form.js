function validateForm() {
    var errors = [];

    var title = document.querySelector('[name="title"]');
    var text = document.querySelector('[name="text"]');

    if (!title.value.trim().length) {
        errors.push('Bitte Titel angeben.');
    }

    if (!text.value.trim().length) {
        errors.push('Bitte Text angeben.');
    }

    return errors;
}

function submitForm(event) {
    event.preventDefault();

    clearErrors();

    var errors = validateForm();

    if (errors.length) {
        showErrors(form, errors);
        return;
    }

    form.submit();
}

var form = document.querySelector('form');
form.addEventListener('submit', submitForm);

function showErrors(errors) {
    var list = document.createElement('ul');
    list.setAttribute('class', 'errors');
    form.insertAdjacentElement('afterbegin', list);

    for (var i = 0; i < errors.length; i++) {
        var error = errors[i];
        var item = document.createElement('li');
        item.innerHTML = error;
        list.insertAdjacentElement('beforeend', item);
    }
}

function clearErrors() {
    var errors = document.querySelector('.errors');
    if (errors) {
        form.removeChild(errors);
    }
}

function validateForm() {
    var errors = [];

    var title = document.querySelector('[name="title"]');
    var email = document.querySelector('[name="email"]');
    var text = document.querySelector('[name="text"]');

    if (!title.value.trim().length) {
        errors.push('Bitte Titel angeben.');
    }

    if (!email.value.trim().length || !email.value.includes('@')) {
        errors.push('Bitte E-Mail angeben.');
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
        showErrors(errors);
        return;
    }

    form.submit();
}

var form = document.querySelector('form');
form.addEventListener('submit', submitForm);

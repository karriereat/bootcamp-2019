import '../css/app.scss';
import { sendJSONPOSTRequest as sendRequest } from './xhr';

const form = document.querySelector('[action="form.php"]');
if (form) {
    form.addEventListener('submit', submitForm);
}

function clearErrors() {
    const errors = document.querySelector('.errors');
    if (errors) {
        errors.parentNode.removeChild(errors);
    }
}

function showErrors(errors) {
    const list = document.createElement('ul');
    list.classList.add('errors');
    form.insertAdjacentElement('afterbegin', list);

    errors.forEach((error) => {
        const item = document.createElement('li');
        item.innerHTML = error;
        list.insertAdjacentElement('beforeend', item);
    })
}

function validateForm() {
    const title = document.querySelector('[name="title"]');
    const text = document.querySelector('[name="text"]');

    // `date` and `author` are always valid,
    // except the user circumvents the date picker and <select> element.

    const errors = [];

    if (!title.value.length) {
        errors.push('Bitte Titel angeben');
    }

    if (!text.value.length) {
        errors.push('Bitte Text angeben');
    }

    return errors;
}

function submitForm(event) {
    event.preventDefault();

    clearErrors();

   const errors = validateForm();

    if (errors.length) {
        showErrors(errors);
        return;
    }

    sendRequest(form, (response) => {
        if (response.data.id) {
            document.location = `article.php?id=${response.data.id}`;
        }
    });
}

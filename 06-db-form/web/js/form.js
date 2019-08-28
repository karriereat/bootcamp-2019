const form = document.querySelector('form');

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

function sendURLEncodedPOSTRequest() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/form.php', true);

    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            if (response.data.id) {
                document.location = `article.php?id=${response.data.id}`;
            }
        } else {
            // TODO Error handling using `xhr.status` and `xhr.statusText`.
        }
    };

    let data = [];
    for (let i = 0; i < form.elements.length; i++) {
        const field = form.elements[i];
        const name = field.name;
        const value = encodeURIComponent(field.value);
        if (name.length) {
            data.push(`${name}=${value}`);
        }
    }
    data = data.join('&');
    xhr.send(data);
}

function sendFormDataPOSTRequest() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/form.php', true);

    xhr.setRequestHeader('Accept', 'application/json');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            if (response.data.id) {
                document.location = `article.php?id=${response.data.id}`;
            }
        } else {
            // TODO Error handling using `xhr.status` and `xhr.statusText`.
        }
    };

    const data = new FormData(form);
    xhr.send(data);
}

function sendJSONPOSTRequest() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/form.php', true);

    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            if (response.data.id) {
                document.location = `article.php?id=${response.data.id}`;
            }
        } else {
            // TODO Error handling using `xhr.status` and `xhr.statusText`.
        }
    };

    const data = {};
    for (let i = 0; i < form.elements.length; i++) {
        const field = form.elements[i];
        const name = field.name;
        const value = field.value;
        if (name.length) {
            data[field.name] = field.value;
        }
    }

    xhr.send(JSON.stringify(data));
}

function submitForm(event) {
    event.preventDefault();

    clearErrors();

   const errors = validateForm();

    if (errors.length) {
        showErrors(errors);
        return;
    }

    // sendURLEncodedPOSTRequest();
    // sendFormDataPOSTRequest();
    sendJSONPOSTRequest();
}

form.addEventListener('submit', submitForm);

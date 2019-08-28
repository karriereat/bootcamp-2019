export function sendURLEncodedPOSTRequest(form, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);

    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            callback(response);
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

export function sendFormDataPOSTRequest(form, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);

    xhr.setRequestHeader('Accept', 'application/json');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            callback(response);
        } else {
            // TODO Error handling using `xhr.status` and `xhr.statusText`.
        }
    };

    const data = new FormData(form);
    xhr.send(data);
}

export function sendJSONPOSTRequest(form, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);

    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = () => {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            callback(response);
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

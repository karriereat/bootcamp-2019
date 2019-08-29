function showErrors(form, errors) {
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
        errors.parentNode.removeChild(errors);
    }
}

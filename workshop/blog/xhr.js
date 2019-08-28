// Ajax [ˈeidʒæks] (auch AJAX; Asynchronous JavaScript and XML) 
// https://jsonplaceholder.typicode.com/posts/1

function requestJSON(url, callback) {
    const xhr = new XMLHttpRequest();

    xhr.open('GET', url);

    xhr.onreadystatechange = function() {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.response);

            if (callback) {
                const data = JSON.parse(xhr.response);
                callback(data);
            }
        } else {
            console.error(xhr.status);
        }
    };

    xhr.send();
}

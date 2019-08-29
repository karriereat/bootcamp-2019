// Ajax [ˈeidʒæks] (auch AJAX; Asynchronous JavaScript and XML) 
// https://jsonplaceholder.typicode.com/posts/1

function requestJSON(url, callback) {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', url);

    xhr.onreadystatechange = function() {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            data = JSON.parse(xhr.response);
            callback(data);
        } else {
            console.error(xhr.status);
        }
    };

    xhr.send();
}

// string, object, function
function sendJSON(url, data, callback) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', url);

    xhr.onreadystatechange = function() {
        if (xhr.readyState !== XMLHttpRequest.DONE) {
            return;
        }

        if (xhr.status >= 200 && xhr.status < 300) {
            data = JSON.parse(xhr.response); // json_decode in PHP
            callback(data);
        } else {
            console.error(xhr.status);
        }
    };

    xhr.send(JSON.stringify(data)); // json_encode in PHP
}

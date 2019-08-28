var data = {
    name: 'Hugo',
    comment: 'Starker Artikel!'
};
sendJSON('http://localhost:8000/comments.php', data, function() {});

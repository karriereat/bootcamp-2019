<form id="comments" action="/comments.php" method="post">
    <label>
        Name
        <input type="text" name="name">
    </label>
    <label>
        Kommentar
        <textarea name="comment"></textarea>
    </label>
    <button>Speichern</button>
</form>

<!-- TODO errors.js und xhr.js in einem functions.js zusammenfassen -->
<script src="/js/errors.js"></script>
<script src="/js/xhr.js"></script>

<script src="/js/comment.js"></script>

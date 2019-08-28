<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel anlegen</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <main>
        <?php include 'adminHeader.php'; ?>
        <h1><span class="fancy-heading">Artikel anlegen</span></h1>

        <form action="form.php" method="post">
            <ul class="errors"></ul>

            <label>
                <span class="form-label">Titel</span>
                <input class="form-element"
                       type="text" name="title" placeholder="Titel"
                       value=""/>
            </label>

            <label>
                <span class="form-label">Datum</span>
                <input class="form-element"
                       type="date" name="date" placeholder="Datum"
                       value="<?php echo date('Y-m-d', $view['date']); ?>"/>
            </label>

            <label>
                <span class="form-label">Autor</span>
                <select class="form-element" name="author">
                    <?php foreach ($view['authors'] as $author): ?>
                        <option value="<?php echo $author['id']; ?>">
                            <?php echo $author['username']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>
                <span class="form-label">Text</span>
                <textarea
                    class="form-element"
                    name="text"
                    placeholder="Es war einmal …"
                ></textarea>
            </label>

            <button class="form-element" type="submit">Speichern</button>
        </form>
    </main>
    <script src="/js/form.js"></script>
</body>
</html>

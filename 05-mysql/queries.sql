/* SELECT -------------------------------------- */

/* Alle Artikel */

SELECT * FROM articles;

/* Alle Artikel absteigend nach Datum Sortiert */

SELECT * FROM articles ORDER BY date DESC;

/* Alle Artikel mit pagination */

SELECT * FROM articles LIMIT 0, 3;

/* Alle Artikel von einem User */

SELECT * FROM articles
WHERE userId = 1;
ORDER BY date DESC;

/* Alle Artikel mit eingeschränkten Feldern */

SELECT title, text, date FROM articles;

/* Alle Artikel inkl. User*/

SELECT * FROM articles
JOIN users
on articles.userId = users.id;

/* Alle Artikel inkl. User mit eingeschränkten Feldern*/

SELECT articles.id, articles.title, articles.text, articles.date, users.id, users.username
FROM articles
JOIN users
on articles.userId = users.id;

/* Alle Artikel inkl. User mit eingeschränkten Feldern und Alias*/

SELECT a.id, a.title, a.text, a.date, u.id, u.username
FROM articles as a
JOIN users as u
on a.userId = u.id;

/* Alle Artikel inkl. User mit eingeschränkten Feldern und Alias und Datetime*/

SELECT a.id, a.title, a.text, FROM_UNIXTIME(a.date), u.id, u.username
FROM articles as a
JOIN users as u
on a.userId = u.id;


/* Alle Categorien */

SELECT * FROM categories;

/* Alle Categorien eines Artikel */

SELECT c.*
FROM categories as c
JOIN articles_categories as ac
ON ac.categoryId = c.id
WHERE articleId = 4;

/* Alle Artikel einer Category */

SELECT a.*
FROM articles as a
JOIN articles_categories as ac
ON ac.articleId = a.id
WHERE categoryId = 2;

/*Alle Kategorien in denen ein User Artikel hat */

SELECT c.*
FROM categories as c
JOIN articles_categories as ac
ON ac.categoryId = c.id
JOIN articles as a
ON ac.articleId = a.id
JOIN users as u
ON u.id = a.userId
WHERE u.id = 3
GROUP BY c.id;

/* User für Login */

SELECT *
FROM users
WHERE username="markus"
AND password="test1234"
AND isActive=1;

/* UPDATE -------------------------------------- */

/* Letzten Login updaten */

UPDATE users
SET lastLogin = UNIX_TIMESTAMP();
WHERE id=1;

/* INSERT -------------------------------------- */

/* Kategorie erzeugen */

INSERT INTO categories (name)
VALUES ("Vegetarisch");

/* User erzeugen */

INSERT INTO users (email, username, password, createDate, isActive)
VALUES ("test@karriere.at", "markus", "56789adfgafdhad", UNIX_TIMESTAMP(), 1);

/* Artikel erzeugen */
INSERT INTO articles (title, text, createDate, changeDate, date, userId)
VALUES ("Der Titel", "Lorem Ipsum....", UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 3435676543, 1);

/* DELETE */


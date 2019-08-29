/* Get all Articles */
SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id;

/* Get article by id */
SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id WHERE a.id = 2

/* Get article by category_id */
SELECT a.*, firstname, surname, ca.category_id FROM article as a JOIN user as u ON a.user_id = u.id JOIN category_article as ca ON ca.article_id = a.id WHERE ca.category_id = 2

/* Get article by category.slug */
SELECT a.*, firstname, surname, ca.category_id 
FROM article as a 
JOIN user as u ON a.user_id = u.id 
JOIN category_article as ca ON ca.article_id = a.id
JOIN category as c ON ca.category_id = c.id
WHERE c.slug = 'pizza'

/* GET all categories of article*/
SELECT * FROM category as c
JOIN category_article as ca ON ca.category_id = c.id
WHERE ca.article_id = 3

/* Insert Comment*/
INSERT INTO comment 
(article_id, name, comment, created) 
VALUES 
(3, 'Markus', 'Hallo toller Artikel', CURRENT_TIME());

/* select all comments by articleId*/
SELECT * FROM comment WHERE article_id = 1

/* select user by email and password */
SELECT * FROM `user` WHERE email = ? AND password = ?;
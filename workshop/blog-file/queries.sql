/* Get all Articles */
SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id;

/* Get article by id */
SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id WHERE a.id = 2

/* Get article by category_id */
SELECT a.*, firstname, surname, ca.category_id FROM article as a JOIN user as u ON a.user_id = u.id JOIN category_article as ca ON ca.article_id = a.id WHERE ca.category_id = 2

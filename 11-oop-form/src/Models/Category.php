<?php

namespace Bootcamp\Models;

class Category extends BaseModel {

    protected $table = 'categories';

    public $id;
    public $name;

    public function loadByArticleId(int $articleId) : array {
        $stmt = $this->db->prepare(sprintf('
          SELECT c.* FROM %s AS c
          JOIN articles_categories as ac
          ON ac.categoryId = c.id
          WHERE ac.articleId = ?
          ORDER BY name ASC  
        ', $this->table));

        $stmt->execute([$articleId]);

        return $this->queryList($stmt);
    }
}

<?php

namespace Bootcamp\Models;

class Article extends BaseModel {

    protected $table = 'articles';

    public $id;
    public $text;
    public $title;
    public $date;
    public $createDate;
    public $changeDate;
    public $userId;

    public $user;
    public $categories;

    public function loadUser(){
        if($this->user == null) {
            $user = new User($this->db);
            $this->user = $user->load($this->userId);
        }

        return $this->user;
    }

    public function loadCategories(){
        if($this->categories == null) {
            $categories = new Category($this->db);
            $this->categories = $categories->loadByArticleId($this->id);
        }

        return $this->categories;
    }

    public function getArticlesByCategoryId(int $userId){
        $stmt = $this->db->prepare(sprintf("
          SELECT * FROM %s a 
          JOIN articles_categories as ac
          ON ac.articleId = a.id
          WHERE ac.categoryId = ?
          ORDER BY a.date DESC", $this->table));

        $stmt->execute([$userId]);

        return $this->queryList($stmt);
    }

    public function getArticles(){
        $stmt = $this->db->prepare(sprintf("
          SELECT * FROM %s
          ORDER BY date DESC", $this->table));

        $stmt->execute([]);

        return $this->queryList($stmt);
    }

    public function getArticlesByUserId(int $userId){
        $stmt = $this->db->prepare(sprintf("SELECT * FROM %s WHERE userId = ?", $this->table));

        $stmt->execute([$userId]);
        return $this->queryList($stmt);
    }
}

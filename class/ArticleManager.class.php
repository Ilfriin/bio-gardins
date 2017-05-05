<?php

class ArticleManager{
  private $db;

  public function __construct($db){
    $this->set_db($db);
  }

  public function get_db(){
    return $this->db;
  }

  public function set_db($db){
    $this->db = $db;
  }

  public function create_article(Article $article){
    $query = "INSERT INTO article(article_id, title, content, author, article_date, keywords)";
    $query .= "VALUES(:article_id, :title, :content, :author, :article_date, :keywords)";

    $req = $this->get_db()->prepare($query);
    $req->bindvalue('article_id', $article->get_article_id(), PDO::PARAM_STR);
    $req->bindvalue('title', $article->get_title(), PDO::PARAM_STR);
    $req->bindvalue('content', $article->get_content(), PDO::PARAM_STR);
    $req->bindvalue('author', $article->get_author(), PDO::PARAM_STR);
    $req->bindvalue('article_date', $article->get_article_date(), PDO::PARAM_STR);
    $req->bindvalue('keywords', $article->get_keywords(), PDO::PARAM_STR);
    $result = $req->execute();
    if(!$result){
      throw new Exception($req->errorInfo()[2], 900);
    }else{
      if($req->rowCount() > 0){
        return true;
      }
      return false;
    }
  }

}

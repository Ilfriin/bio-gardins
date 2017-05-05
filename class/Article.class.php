<?php

class Article{
  private $article_id;
  private $title;
  private $content;
  private $author;
  private $article_date;
  private $keywords;

  public function get_article_id(){return $this->article_id;}
  public function get_title(){return $this->title;}
  public function get_content(){return $this->content;}
  public function get_author(){return $this->author;}
  public function get_article_date(){return $this->article_date;}
  public function get_keywords(){return $this->keywords;}

  public function set_title($title){
    $this->title = $title;
  }

  public function set_content($content){
    $this->content = $content;
  }

  public function set_author($author){
    $this->author = $author;
  }

  public function set_article_date($article_date){
    $this->article_date = $article_date;
  }

  public function set_keywords($keywords){
    $this->keywords = $keywords;
  }


}

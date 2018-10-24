<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

class ArticleManager extends AbstractManager
{
    const TABLE = 'article';

    /**
     * ArticleManager constructor.
     * @param \PDO $pdo
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
    /*
    *searching article by category and by name(when searching by the client
    */
     public function searchArticle(string $category,string $search=''): array
      {   $searching = '';
          if (!empty($search)) {
              $searching = "AND name LIKE :search";
          }
          $statement=$this->pdo->prepare('SELECT * FROM ' . $this->table . " WHERE   category =:category $searching");
          $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
          $statement->bindValue('category', $category, \PDO::PARAM_STR);
          if (!empty($search)) {
              $statement->bindValue('search', "%$search%", \PDO::PARAM_STR);
          }
          if ($statement->execute()) {
              return $statement->fetchAll();
          }
      }
    /*
 *searching article by name
 */
    public function searchArticleGeneral(string $search=''): array
    { /*prepare request*/
        $statement= $this->pdo->prepare('SELECT * FROM ' . $this->table . " WHERE name LIKE :search");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('search', "%$search%", \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $statement->fetchAll();
        }
   }
    /**
     * @param Article $article
     * @return int
     */
    public function insert(Article $article): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, category, price, picture, description, review, highlight) VALUES (:name, :category, :price, :picture, :description, :review, :highlight )");
        $statement->bindValue('name', $article->getName(), \PDO::PARAM_STR);
        $statement->bindValue('category', $article->getCategory(), \PDO::PARAM_STR);
        $statement->bindValue('price', $article->getPrice(), \PDO::PARAM_STR);
        $statement->bindValue('picture', $article->getPicture(), \PDO::PARAM_STR);
        $statement->bindValue('description', $article->getDescription(), \PDO::PARAM_STR);
        $statement->bindValue('review', $article->getReview(), \PDO::PARAM_STR);
        $statement->bindValue('highlight', $article->getHighlight(), \PDO::PARAM_BOOL);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
}

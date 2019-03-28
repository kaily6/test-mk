<?php

namespace common\models;

use common\models\queries\ArticleQuery;
use common\models\queries\AuthorQuery;
use yii\db\ActiveRecord;

/**
 * Class Author
 *
 * @property int $id
 * @property int $name
 *
 * @property-read Article[] $article
 *
 * @package common\models
 */
class Author extends ActiveRecord
{
    /**
     * @return AuthorQuery
     */
    public static function find()
    {
        return new AuthorQuery(get_called_class());
    }

    /**
     * @return ArticleQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['author_id' => 'id']);
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        $totalArticlesCount = $this->getArticles()->count();

        if ($totalArticlesCount < 2) {
            return 0;
        }

        $publishedCount = $this->getArticles()->published()->count();

        return $publishedCount/$totalArticlesCount;
    }
}

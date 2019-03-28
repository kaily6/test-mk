<?php

namespace common\models;

use Carbon\Carbon;
use common\models\queries\ArticleQuery;
use common\models\queries\AuthorQuery;
use yii\db\ActiveRecord;

/**
 * Class Article
 *
 * @property int $id
 * @property int $title
 * @property int $short_description
 * @property int $description
 * @property int $author_id
 * @property int $published_at
 *
 * @property-read Author $author
 *
 * @package common\models
 */
class Article extends ActiveRecord
{
    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

    /**
     * @return void
     */
    public function publish()
    {
        $this->published_at = Carbon::now()->toDateTimeString();
    }

    /**
     * @return AuthorQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * @param Author $author
     *
     * @return void
     */
    public function setAuthor(Author $author): void
    {
        $this->author_id = $author->id;
    }
}

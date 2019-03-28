<?php

namespace common\models\queries;

use common\models\Author;
use yii\db\ActiveQuery;
use Carbon\Carbon;

/**
 * Class ArticleQuery
 *
 * @package common\models\queries
 */
class ArticleQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function sorted()
    {
        return $this->orderBy(['published_at' => SORT_ASC]);
    }

    /**
     * @return $this
     */
    public function published()
    {
        return $this->andWhere(['<=', 'published_at', Carbon::now()->toDateTimeString()]);
    }

    /**
     * @param Author $author
     *
     * @return $this
     */
    public function byAuthor(Author $author)
    {
        return $this->andWhere(['author_id' => $author->id]);
    }
}

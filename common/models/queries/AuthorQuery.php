<?php

namespace common\models\queries;

use yii\db\ActiveQuery;

/**
 * Class AuthorQuery
 *
 * @package common\models\queries
 */
class AuthorQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function sortedByName()
    {
        return $this->orderBy(['name' => SORT_ASC]);
    }
}

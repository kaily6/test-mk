<?php

use yii\db\Migration;

/**
 * Class m190328_060659_add_articles
 */
class m190328_060659_add_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->unsigned(),
            'title' => $this->string(),
            'short_description' => $this->text(),
            'description' => $this->text(),
            'published_at' => $this->string(),
        ]);

        $this->addForeignKey(
            'article__author_id__fk',
            '{{%article}}',
            ['author_id'],
            '{{%author}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('article__author_id__fk', '{{%article}}');

        $this->dropTable('{{%article}}');
    }
}

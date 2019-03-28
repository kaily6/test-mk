<?php

use yii\db\Migration;
use Faker\Factory;
use common\models\Author;
use common\models\Article;

/**
 * Class m190328_060738_populate
 */
class m190328_060738_populate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // this for mk, bad approach in real projects

        $faker = Factory::create('en_EN');

        $author1 = new Author();
        $author1->name = $faker->name;
        $author1->save();

        for ($i = 0; $i < 3; $i++) {
            $article = new Article();
            $article->title = $faker->sentence(3, true);
            $article->short_description = $faker->sentence(5, true);
            $article->description = $faker->sentence(10, true);
            $article->setAuthor($author1);
            $article->publish();
            $article->save();
        }

        $author2 = new Author();
        $author2->name = $faker->name;
        $author2->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Article::deleteAll();
        Author::deleteAll();
    }
}

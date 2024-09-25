<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m240925_104135_create_books_authors_categories_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);

        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(30),
            'surname'=>$this->string(),
            'patronymic'=>$this->string()->null(),
            'email'=>$this->string()->unique()->null(),
            'avatar'=>$this->string()->null(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'description'=>$this->text()->null(),
            'price'=>$this->decimal(8,2),
            'remainder'=>$this->integer()->defaultValue(0),
            'delivery_time_days'=>$this->integer()->null(),
            'article'=>$this->string()->unique(),
            'category_id'=>$this->bigInteger()->null(),
            'author_id'=>$this->bigInteger()->null(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);

        $this->addForeignKey(
            'fk_books_authors',
            'books',
            'author_id',
            'authors',
            'id',
            'SET NULL'
        );
        $this->addForeignKey(
            'fk_books_categories',
            'books',
            'category_id',
            'categories',
            'id',
            'SET NULL'
        );
        $this->createTable('{{%books_photos}}', [
            'id' => $this->primaryKey(),
            'photo'=>$this->string(),
            'book_id'=>$this->bigInteger(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
        $this->addForeignKey('fk_books_photos_books', 'books_photos', 'book_id', 'books', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
        $this->dropTable('{{%authors}}');
        $this->dropTable('{{%categories}}');
        $this->dropTable('{{%books_photos}}');
    }
}

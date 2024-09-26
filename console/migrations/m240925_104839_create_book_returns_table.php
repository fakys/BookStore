<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_returns}}`.
 */
class m240925_104839_create_book_returns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%conditions_books}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->unique(),
            'description'=>$this->text(),
            'returnable'=>$this->boolean(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);

        $this->createTable('{{%book_returns}}', [
            'id' => $this->primaryKey(),
            'number_returns'=>$this->string()->unique(),
            'order_id'=>$this->bigInteger(),
            'worker_id'=>$this->bigInteger()->null(),
            'condition_book_id'=>$this->bigInteger()->null(),
            'will_return'=>$this->boolean()->defaultValue(false),
            'date_return'=>$this->dateTime()->null(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
        $this->addForeignKey('fk_book_returns_conditions_books', 'book_returns', 'condition_book_id', 'conditions_books', 'id', 'SET NULL');
        $this->addForeignKey('fk_book_returns_workers', 'book_returns', 'worker_id', 'workers', 'id', 'SET NULL');
        $this->addForeignKey('fk_book_returns_order', 'book_returns', 'order_id', 'orders', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_returns}}');
        $this->dropTable('{{%conditions_books}}');
    }
}

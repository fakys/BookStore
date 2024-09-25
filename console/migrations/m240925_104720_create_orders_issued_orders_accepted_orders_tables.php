<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m240925_104720_create_orders_issued_orders_accepted_orders_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'number'=>$this->string()->unique(),
            'book_id'=>$this->bigInteger(),
            'count'=>$this->integer()->defaultValue(1),
            'client_id'=>$this->bigInteger(),
            'worker_id'=>$this->bigInteger()->null(),
            'sent'=>$this->boolean()->defaultValue(false),
            'came'=>$this->boolean()->defaultValue(false),
            'dispatch_date'=>$this->dateTime()->null(),
            'arrival_date'=>$this->dateTime()->null(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
        $this->addForeignKey('fk_orders_books', 'orders', 'book_id', 'books', 'id', 'CASCADE');
        $this->addForeignKey('fk_orders_clients', 'orders', 'client_id', 'clients', 'id', 'CASCADE');
        $this->addForeignKey('fk_orders_workers', 'orders', 'worker_id', 'workers', 'id', 'SET NULL');

        $this->createTable('{{%issued_orders}}', [
            'id' => $this->primaryKey(),
            'order_id'=>$this->bigInteger(),
            'date_issue'=>$this->dateTime(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
        $this->addForeignKey('fk_issued_orders_orders', 'issued_orders', 'order_id', 'orders', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%issued_orders}}');
        $this->dropTable('{{%orders}}');

    }
}

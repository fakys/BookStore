<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workers}}`.
 */
class m240925_110531_create_workers_positions_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%positions}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'unique_key'=>$this->string()->unique(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);

        $this->createTable('{{%workers}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(30),
            'surname'=>$this->string(),
            'patronymic'=>$this->string(),
            'passport_series'=>$this->string(),
            'passport_number'=>$this->string(),
            'email'=>$this->string()->unique(),
            'avatar'=>$this->string()->null(),
            'position_id'=>$this->bigInteger()->null(),
            'unique_key'=>$this->string()->unique(),
            'password'=>$this->string(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
        $this->addForeignKey(
            'fk-workers-positions',
            'workers',
            'position_id',
            'positions',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%workers}}');
        $this->dropTable('{{%positions}}');
    }
}

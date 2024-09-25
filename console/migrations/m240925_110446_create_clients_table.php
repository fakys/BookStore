<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clients}}`.
 */
class m240925_110446_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(30),
            'surname'=>$this->string(),
            'patronymic'=>$this->string()->null(),
            'passport_series'=>$this->string(),
            'passport_number'=>$this->string(),
            'email'=>$this->string()->unique(),
            'avatar'=>$this->string()->null(),
            'unique_key'=>$this->string()->unique(),
            'password'=>$this->string(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clients}}');
    }
}

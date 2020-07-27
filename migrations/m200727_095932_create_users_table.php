````````<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200727_095932_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%users}}',
            [
                'id'            => $this->primaryKey(),
                'username'      => $this->string(255)->notnull(),
                'password_hash' => $this->string(512)->notNull(),
                'access_token'  => $this->string(1024)->notNull(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

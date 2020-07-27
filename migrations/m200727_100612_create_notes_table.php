<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m200727_100612_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%notes}}',
            [
                'id'         => $this->primaryKey(),
                'title'      => $this->string(255),
                'body'       => $this->text(),
                'created_at' => $this->integer(11),
                'updated_at' => $this->integer(11),
                'user_id'    => $this->integer(11),
            ]
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-notes-user_id}}',
            '{{%notes}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-notes-user_id}}',
            '{{%notes}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-notes-user_id}}',
            '{{%notes}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-notes-user_id}}',
            '{{%notes}}'
        );

        $this->dropTable('{{%notes}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image_link}}`.
 */
class m240312_144235_create_image_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image_link}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string('510'),
            'is_solution' => $this->boolean()->defaultValue(false)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image_link}}');
    }
}

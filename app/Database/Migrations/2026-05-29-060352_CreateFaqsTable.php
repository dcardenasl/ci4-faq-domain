<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFaqsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'question' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'answer' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'is_published' => [
                'type' => 'TINYINT',
                'null' => false,
            ],
            'sort_order' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('question');
        $this->forge->addKey('category_id');
        $this->forge->addKey('is_published');
        $this->forge->addKey('sort_order');
        $this->forge->addForeignKey('category_id', 'faq_categories', 'id', 'CASCADE', 'CASCADE', 'fk_faqs_category_id');
        $this->forge->createTable('faqs');
    }

    public function down(): void
    {
        $this->forge->dropForeignKey('faqs', 'fk_faqs_category_id');

        $this->forge->dropTable('faqs');
    }
}

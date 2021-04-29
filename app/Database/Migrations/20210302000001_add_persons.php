<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persons extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 1,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'first_name'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => false,
                        ],
                        'last_name'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
                            'null' => false,
                        ],
                        'email'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
                            'null' => false,
                            'unique' => true,
                        ],
                        'phone'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '20',
                            'null' => true,
                        ],
                        'password'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
                            'null' => false,
                        ],
                        'reg_key'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
                            'null' => false,
                        ],
                        'mobile_token'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
                            'null' => false,
                        ],
                        'inactive'       => [
                            'type'       => 'BOOLEAN',
                            'default'   => false,
                            'null' => false,
                        ],
                        'inactive_date'       => [
                            'type'       => 'DATETIME',
                            'null' => false,
                        ],
                        'created_on'       => [
                            'type'       => 'DATETIME',
                            'null'      => false,
                            'default'   => 'CURRENT_TIMESTAMP'
                        ],
                        'user_type'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '25',
                            'default'   => 'person',
                            'null' => false,
                        ],

                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('persons');
        }

        public function down()
        {
                $this->forge->dropTable('persons');
        }
}
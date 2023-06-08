<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerawatan extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "hewan" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "treatment" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "user" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "schedule" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "phone" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('perawatan', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('perawatan', true); //If Exists drop table products
    }
}

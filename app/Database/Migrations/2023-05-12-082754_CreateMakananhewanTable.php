<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMakananhewanTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "image" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "harga" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('makanan_hewan', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('makanan_hewan', true); //If Exists drop table products
    }
}

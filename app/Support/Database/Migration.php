<?php

namespace BestPrice\Support\Database;

use Illuminate\Database\Migrations\Migration as LaravelMigration;

/**
 * Abstract Class Migration
 */
abstract class Migration extends LaravelMigration
{
    /**
     * SchemaBuilder
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Set default property scheme
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();

    }

    /**
     * Start Migration
     * @return Null
     */
    abstract function up();

    /**
     * Finish Migration
     * @return Null
     */
    abstract function down();
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tags_table_is_created_successfully()
    {
        $this->assertTrue(Schema::hasTable('tags'));
        $this->assertTrue(Schema::hasColumns('tags', ['id', 'name', 'created_at', 'updated_at']));
    }

    /** @test */
    public function job_tag_table_is_created_successfully()
    {
        $this->assertTrue(Schema::hasTable('job_tag'));
        $this->assertTrue(Schema::hasColumns('job_tag', ['id', 'job_listing_id', 'tag_id', 'created_at', 'updated_at']));

        // Testing foreign key constraints might require inserting data into the related tables
        // and ensuring that the constraints are enforced. This is more complex and might not
        // be necessary for all applications. It involves creating models and using them to
        // attempt to insert data that should fail or succeed based on the constraints.
    }
}

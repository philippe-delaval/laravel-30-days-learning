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

    use RefreshDatabase;

    /**
     * Test if the users table is created successfully.
     *
     * @return void
     */
    public function testUsersTableCreation()
    {
        $this->assertDatabaseHasTable('users');
    }

    /**
     * Test if the password_reset_tokens table is created successfully.
     *
     * @return void
     */
    public function testPasswordResetTokensTableCreation()
    {
        $this->assertDatabaseHasTable('password_reset_tokens');
    }

    /**
     * Test if the sessions table is created successfully.
     *
     * @return void
     */
    public function testSessionsTableCreation()
    {
        $this->assertDatabaseHasTable('sessions');
    }


    /**
     * Check if a table exists in the database.
     *
     * @param string $table
     * @return void
     */
    protected function assertDatabaseHasTable($table)
    {
        $this->assertTrue(\Schema::hasTable($table));
    }

    /**
     * Check if a table is missing in the database.
     *
     * @param string $table
     * @return void
     */
    protected function assertDatabaseMissingTable($table)
    {
        $this->assertFalse(\Schema::hasTable($table));
    }

}

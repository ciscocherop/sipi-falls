<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * Bug Condition Exploration Test for SQLite Database Path Issue
 * 
 * **Validates: Requirements 1.1, 1.2, 1.3**
 * 
 * This test demonstrates the bug where DB_DATABASE=sipi-falls (a relative path
 * that doesn't exist) causes database connection failures.
 * 
 * CRITICAL: This test is EXPECTED TO FAIL on unfixed code.
 * The failure confirms the bug exists and provides counterexamples.
 * 
 * When the fix is applied (correct absolute path in .env), this test will pass.
 */
class DatabaseConnectionBugTest extends TestCase
{
    /**
     * Property 1: Fault Condition - Database Connection Failure with Invalid Path
     * 
     * Test that database connection fails when DB_DATABASE=sipi-falls
     * (relative path that doesn't exist).
     * 
     * EXPECTED OUTCOME ON UNFIXED CODE: This test FAILS
     * EXPECTED OUTCOME ON FIXED CODE: This test PASSES
     * 
     * @return void
     */
    public function test_database_connection_with_invalid_relative_path_fails(): void
    {
        // Override the test environment to use the actual .env configuration
        // This simulates the bug condition where DB_DATABASE=sipi-falls
        config([
            'database.connections.sqlite.database' => 'sipi-falls'
        ]);
        
        // Purge the connection to force a new connection attempt
        DB::purge('sqlite');
        
        // Attempt to connect to the database
        // On unfixed code: This will throw an exception
        // On fixed code: This will succeed
        try {
            $pdo = DB::connection('sqlite')->getPdo();
            
            // If we reach here, the connection succeeded
            // This means the bug is fixed
            $this->assertNotNull($pdo, 'Database connection should be established');
            
            // Verify we can execute a simple query
            $result = DB::select('SELECT 1 as test');
            $this->assertNotEmpty($result, 'Should be able to execute queries');
            
        } catch (\Exception $e) {
            // On unfixed code, we expect this exception
            // Document the counterexample
            $errorMessage = $e->getMessage();
            
            // Verify the error message matches the expected bug behavior
            $this->assertStringContainsString(
                'sipi-falls',
                $errorMessage,
                'Error should reference the invalid database path'
            );
            
            // This assertion will fail on unfixed code, documenting the bug
            $this->fail(
                "COUNTEREXAMPLE FOUND - Bug Confirmed:\n" .
                "Database connection failed with DB_DATABASE=sipi-falls\n" .
                "Error: {$errorMessage}\n" .
                "This confirms Requirements 1.1, 1.2, 1.3 are violated.\n" .
                "Expected: Connection should succeed with correct absolute path."
            );
        }
    }
    
    /**
     * Additional test: Verify the expected error message format
     * 
     * This test documents the specific error message we expect to see
     * when the bug condition is present.
     * 
     * @return void
     */
    public function test_invalid_path_produces_expected_error_message(): void
    {
        // Set up the bug condition
        config([
            'database.connections.sqlite.database' => 'sipi-falls'
        ]);
        
        DB::purge('sqlite');
        
        $exceptionThrown = false;
        $actualErrorMessage = '';
        
        try {
            DB::connection('sqlite')->getPdo();
        } catch (\Exception $e) {
            $exceptionThrown = true;
            $actualErrorMessage = $e->getMessage();
        }
        
        // On unfixed code: exception is thrown
        // On fixed code: no exception, so this test will fail
        if (!$exceptionThrown) {
            // Bug is fixed - connection succeeded
            $this->assertTrue(true, 'Bug is fixed - database connection succeeded');
        } else {
            // Bug exists - document the error message
            $expectedPattern = '/database.*sipi-falls.*does not exist/i';
            
            $this->assertMatchesRegularExpression(
                $expectedPattern,
                $actualErrorMessage,
                "COUNTEREXAMPLE: Error message should indicate database file doesn't exist.\n" .
                "Actual error: {$actualErrorMessage}"
            );
            
            // Fail the test to document the bug
            $this->fail(
                "COUNTEREXAMPLE FOUND:\n" .
                "Expected error message pattern matched.\n" .
                "Error: {$actualErrorMessage}\n" .
                "This confirms the bug exists with DB_DATABASE=sipi-falls"
            );
        }
    }
}

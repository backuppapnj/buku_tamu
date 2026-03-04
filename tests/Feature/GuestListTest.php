<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * @internal
 */
final class GuestListTest extends CIUnitTestCase
{
    use FeatureTestTrait;
    use DatabaseTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $refresh     = true;
    protected $namespace   = 'App';

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testAdminTamuViewUsesMetronicDataTables()
    {
        $result = $this->withSession(['isLoggedIn' => true, 'role' => 'admin'])->get('/admin/tamu');
        
        $result->assertStatus(200);
        
        // Assert layout and specific Metronic DataTables structure exist
        $result->assertSee('kt_body');
        $result->assertSee('id="kt_table_tamu"');
    }

    public function testAdminPengunjungViewUsesMetronicDataTables()
    {
        $result = $this->withSession(['isLoggedIn' => true, 'role' => 'admin'])->get('/admin/pengunjung');
        
        $result->assertStatus(200);
        
        $result->assertSee('kt_body');
        $result->assertSee('id="kt_table_pengunjung"');
    }
}

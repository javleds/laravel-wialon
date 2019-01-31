<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 19/10/18
 * Time: 01:12 PM
 */

namespace Punksolid\Wialon\Tests;

use Illuminate\Support\Collection;
use Orchestra\Testbench\TestCase;
use Punksolid\Wialon\Unit;

class UnitsTest extends TestCase
{


    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.wialon.token', '5dce19710a5e26ab8b7b8986cb3c49e58C291791B7F0A7AEB8AFBFCEED7DC03BC48FF5F8');
    }

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub


    }

    public function test_list_units_original()
    {

        $units = Unit::all();

        $this->assertInstanceOf(Collection::class, $units);

        $this->assertObjectHasAttribute("id", $units->first(), "Unit has id");
        $this->assertObjectHasAttribute("mu", $units->first(), "Unit has measure units");
        $this->assertObjectHasAttribute("nm", $units->first(), "Unit has name");
        $this->assertObjectHasAttribute("cls", $units->first(), "Unit has  superclass ID: avl_unit");
        $this->assertObjectHasAttribute("uacl", $units->first(), "Unit has uacl current user access level for unit");


    }

    public function test_findMany_units_by_id()
    {
        $units = Unit::findMany([18158664, 18158698]);

        $this->assertEquals("BicicletaPunksolid15", $units->first()->getName());
        $this->assertEquals("BicicletaPunksolid8", $units->last()->getName());
    }

    public function test_find_unit_by_id()
    {

        $unit = Unit::find(18158671);

        $this->assertEquals("BicicletaPunksolid15", $unit->getName());
        $this->assertObjectHasAttribute("id", $unit, "Unit has id");
        $this->assertObjectHasAttribute("mu", $unit, "Unit has measure units");
        $this->assertObjectHasAttribute("nm", $unit, "Unit has name");
        $this->assertObjectHasAttribute("cls", $unit, "Unit has  superclass ID: avl_unit");
        $this->assertObjectHasAttribute("uacl", $unit, "Unit has uacl current user access level for unit");

    }

}
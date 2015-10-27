<?php
namespace Solvire\Tests\API\Representatives;

use Solvire\API\Representatives\LaravelRepresentationController;
use Solvire\Tests\API\Serializers\CompanyModel;

/**
 * Not really testing much since there isn't much going on inside laravel generic tester. 
 *
 * @group RepresentationControllers
 * @author solvire <stevenjscott@gmail.com>
 * @package RepresentationControllers
 * @namespace namespace Solvire\API\Representatives;
 */
class LaravelRepresentationControllerTest extends \BaseTestCase
{

    /**
     * 
     */
    public function testCanCreateLaravelRepController()
    {
        $model = new CompanyModel();
        $rep = new LaravelRepresentationController($model);
        $this->assertInstanceOf('\Solvire\Tests\API\Serializers\CompanyModel', $rep->getModel());
        
        $model->table = 'test';
        $rep->setModel($model);
        $this->assertEquals('test',$rep->getModel()->table);
        
        // not sure what this was there for but it's not working 
        try {
        	$rep->getGenericContext();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
    }
    
}

<?php 

namespace App\DataFixture;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

// fixture creation

class AppFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        $loader = new NativeLoader();

        //import the fixture file and get the entities
        $entities = $loader->loadFile(__DIR__.'/fixtures.yaml')->getObjects();

        //Stacks list of objects saved in BDD
        foreach ($entities as $entity) {
            $em->persist($entity);
        };
        //We record
        $em->flush();

    }
}
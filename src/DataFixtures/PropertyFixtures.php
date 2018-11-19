<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for( $i =0; $i < 100 ; $i++){
            $faker = Factory::create('fr_FR');
            $property = new Property;
            $property
                    ->setTitle($faker->words(3, true))
                    ->setDescription($faker->sentences(3, true))
                    ->setRooms($faker->numberBetween(2,10))
                    ->setSurface($faker->numberBetween(30,300))
                    ->setPrice($faker->numberBetween(50000,200000))
                    ->setFloor($faker->numberBetween(1,3))
                    ->setHeat($faker->numberBetween(0,count(Property::HEAT) -1))
                    ->setCity($faker->city)
                    ->setAddress($faker->address)
                    ->setPostalCode($faker->postcode)
                    ->setSold(false);
            $manager->persist($property);
       }
        $manager->flush();
    }
}

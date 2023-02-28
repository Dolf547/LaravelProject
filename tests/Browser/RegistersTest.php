<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistersTest extends DuskTestCase
{
    public function testAddRegisterSuccess() // Salvar veículos sem erro
    {
        $faker = Factory::create('pt_BR');

        $this->browse(function (Browser $browser) use ($faker) {
            $name = $faker->name;
            $year = $faker->year;
            $color = $faker->colorName;

            $browser->visit('/vehicles/create')
                ->type('name', $name)
                ->type('year', $year)
                ->type('color', $color)
                ->press('salvar')
                ->waitForDialog()
                ->assertDialogOpened('Veículo cadastrado com sucesso!')
                ->acceptDialog();
        });
    }

    public function testAddRegisterSuccessWihtoutName() // Salvar veículos sem nome
    {
        $faker = Factory::create('pt_BR');

        $this->browse(function (Browser $browser) use ($faker) {
            $year = $faker->year;
            $color = $faker->colorName;

            $browser->visit('/vehicles/create')
                ->type('year', $year)
                ->type('color', $color)
                ->press('salvar')
                ->assertSee('The name field is required.');
        });
    }

    public function testAddRegisterSuccessWihtoutYear() // Salvar veículos sem ano
    {
        $faker = Factory::create('pt_BR');

        $this->browse(function (Browser $browser) use ($faker) {
            $name = $faker->name;
            $color = $faker->colorName;

            $browser->visit('/vehicles/create')
                ->type('name', $name)
                ->type('color', $color)
                ->press('salvar')
                ->assertSee('The year field is required.');
        });
    }

    public function testAddRegisterSuccessWihtoutColor() // Salvar veículos sem cor
    {
        $faker = Factory::create('pt_BR');

        $this->browse(function (Browser $browser) use ($faker) {
            $name = $faker->name;
            $year = $faker->year;

            $browser->visit('/vehicles/create')
                ->type('name', $name)
                ->type('year', $year)
                ->press('salvar')
                ->assertSee('The color field is required.');
        });
    }
}

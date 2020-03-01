<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/add')
                ->assertSee('Добавить запись')
                ->type('title', '23k')
                ->type('text', '9128391')
                ->press('Сохранить')
                ->assertSee('Количество символов в поле Название должно быть не менее 5')
                ->assertSee('Количество символов в поле Текст должно быть не менее 20');
        });
    }

    public function test2Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/add')
                ->assertSee('Добавить запись')
                ->type('title', '2цуаца3k')
                ->type('text', '91283ывывывмывмычвмымы91')
                ->press('Сохранить')
                ->assertSee('Успешно');
        });
    }
}

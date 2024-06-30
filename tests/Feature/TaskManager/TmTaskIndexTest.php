<?php
declare(strict_types=1);

namespace Tests\Feature\TaskManager;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Тестирование запросов списка задач пользователя
 */
class TmTaskIndexTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Проверка получения пустого списка задач
     *
     * @test
     */
    public function tmTaskIndex200Empty(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('tm.tasks.index'));

        $response->assertStatus(200)
            ->assertSessionHasNoErrors();
    }
}

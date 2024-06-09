<?php
declare(strict_types=1);

namespace App\Models\TaskManager;

use App\Enums\TaskManager\TaskStatusEnum;
use App\Models\User;
use Database\Factories\TaskManager\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Задачи раздела TaskManager
 * 
 * ./vendor/bin/sail php artisan ide-helper:models "App\Models\TaskManager\Task"
 *
 * @property int $id
 * @property int $from Постановщик задачи
 * @property int|null $to Исполнитель задачи
 * @property TaskStatusEnum $status Статус задачи
 * @property string $name Наименование задачи
 * @property string $description Описание задачи
 * @property Carbon|null $due_date Срок выполнения
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $assigned
 * @property-read User $creator
 * @method static TaskFactory factory($count = null, $state = [])
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereDueDate($value)
 * @method static Builder|Task whereFrom($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereName($value)
 * @method static Builder|Task whereStatus($value)
 * @method static Builder|Task whereTo($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Task extends Model
{
    use HasFactory;

    protected $table = 'tm_tasks';

    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => TaskStatusEnum::class,
            'due_date' => 'datetime',
        ];
    }

    /**
     * Пользователь, которому поставлена задача
     *
     * @return BelongsTo
     */
    public function assigned(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'to',
            'id',
        );
    }

    /**
     * Пользователь поставивший задачу
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'from',
            'id',
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Enums\TaskManager;

/**
 * Список статусов задач раздела TaskManager
 */
enum TaskStatusEnum
{
    case Draft;
    case Assigned;
    case Accepted;
    case InProgress;
    case Suspended;
    case Deferred;
    case Done;
    case Canceled;
}

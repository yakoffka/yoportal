<?php
/** @var App\Models\User $user */
/** @var Illuminate\Database\Eloquent\Collection $createdTasks */
/** @var Illuminate\Database\Eloquent\Collection $assignedTasks */
/** @var App\Models\TaskManager\Task $created */
/** @var App\Models\TaskManager\Task $assigned */

$countCreated = $createdTasks->count();
$countAssigned = $assignedTasks->count();
?>

<x-custom-layout>


    <h1 class="p-2 m-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
        style="text-shadow: 0px 0px 6px rgba(255, 255, 255, 0.2)">
        Task list
    </h1>

    <p class="p-2 m-4 text-xl font-bold dark:text-white">
        Hello, {{ $user->name }}. You have {{ $countCreated }} created tasks and {{ $countAssigned  }} assigned tasks.
    </p>

    @if($countCreated > 0 || $countAssigned > 0)
        <div class="p-2 m-4 relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                @if($countCreated > 0)
                    <thead>
                    <tr>
                        <td scope="col" colspan="6" class="px-6 pt-6 pb-0">
                            created tasks
                        </td>
                    </tr>
                    </thead>
                    {{-- <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
                    <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400"
                           style="color:#FF2D20">
                    <tr>
                        <th scope="col" class="px-3 py-3">
                            id
                        </th>
                        <th scope="col" class="px-3 py-3">
                            name
                        </th>
                        <th scope="col" class="px-3 py-3">
                            from
                        </th>
                        <th scope="col" class="px-3 py-3">
                            to
                        </th>
                        <th scope="col" class="px-3 py-3">
                            due
                        </th>
                        <th scope="col" class="px-3 py-3">
                            status
                        </th>
                    </tr>
                    </thead>
                    @foreach($createdTasks as $created)
                        <tr>
                            <td class="px-3 py-1">
                                {{ $created->id }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $created->name }}
                            </td>
                            <td class="px-3 py-1">
                                you
                            </td>
                            <td class="px-3 py-1">
                                {{ $created->assigned->name }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $created->due_date?->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $created->status->name }}
                            </td>
                        </tr>
                    @endforeach
                @endif


                @if($countAssigned > 0)
                    <thead>
                    <tr>
                        <td scope="col" colspan="6" class="px-6 pt-6 pb-0">
                            assigned tasks
                        </td>
                    </tr>
                    </thead>
                    {{-- <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
                    <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400"
                           style="color:#FF2D20">
                    <tr>
                        <th scope="col" class="px-3 py-3">
                            id
                        </th>
                        <th scope="col" class="px-3 py-3">
                            name
                        </th>
                        <th scope="col" class="px-3 py-3">
                            from
                        </th>
                        <th scope="col" class="px-3 py-3">
                            to
                        </th>
                        <th scope="col" class="px-3 py-3">
                            due
                        </th>
                        <th scope="col" class="px-3 py-3">
                            status
                        </th>
                    </tr>
                    </thead>
                    @foreach($assignedTasks as $assigned)
                        <tr>
                            <td class="px-3 py-1">
                                {{ $assigned->id }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $assigned->name }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $assigned->creator->name }}
                            </td>
                            <td class="px-3 py-1">
                                you
                            </td>
                            <td class="px-3 py-1">
                                {{ $assigned->due_date?->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-3 py-1">
                                {{ $assigned->status->name }}
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    @endif
    @else
        <p class="p-2 m-4 text-xl font-bold dark:text-white">
            your task list is empty.
        </p>
    @endif


    <div class="p-2 m-4">
        <x-secondary-button>
            {{ __('Resend Verification Email') }}
        </x-secondary-button>
    </div>


</x-custom-layout>
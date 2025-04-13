<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">My Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-success transition-transform transform hover:scale-105">
                <i class="fas fa-plus me-2"></i>Create Task
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-6" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tasks Table -->
        @if ($tasks->isEmpty())
            <div class="text-center py-10">
                <p class="text-gray-600 dark:text-gray-400">No tasks yet. <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:underline">Create one</a>.</p>
            </div>
        @else
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-200">Title</th>
                                <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-200">Description</th>
                                <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-200">Status</th>
                                <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ Str::limit($task->description, 50) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="badge {{ $task->status === 'completed' ? 'bg-success' : 'bg-warning' }} text-white">
                                            {{ ucfirst($task->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $task->id }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="fas {{ $task->status === 'pending' ? 'fa-check' : 'fa-undo' }}"></i>
                                                {{ $task->status === 'pending' ? 'Complete' : 'Incomplete' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal-{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $task->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel-{{ $task->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the task "<strong>{{ $task->title }}</strong>"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>

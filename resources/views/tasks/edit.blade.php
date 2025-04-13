<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8">Edit Task</h1>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        <i class="fas fa-heading me-2"></i>Title
                    </label>
                    <input type="text" name="title" id="title" class="form-control mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 transition" value="{{ old('title', $task->title) }}">
                    @error('title')
                        <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        <i class="fas fa-align-left me-2"></i>Description
                    </label>
                    <textarea name="description" id="description" rows="5" class="form-control mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status Field -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        <i class="fas fa-info-circle me-2"></i>Status
                    </label>
                    <select name="status" id="status" class="form-select mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary transition-transform transform hover:scale-105">
                        <i class="fas fa-save me-2"></i>Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

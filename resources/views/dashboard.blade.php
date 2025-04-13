<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h1>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary transition-transform transform hover:scale-105">
                <i class="fas fa-tasks me-2"></i>Manage Tasks
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Tasks Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 transition-all hover:shadow-xl">
                <div class="flex items-center">
                    <i class="fas fa-list-ul text-blue-500 text-2xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Tasks</h2>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalTasks }}</p>
                    </div>
                </div>
            </div>
            <!-- Completed Tasks Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 transition-all hover:shadow-xl">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 text-2xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Completed Tasks</h2>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $completedTasks }}</p>
                    </div>
                </div>
            </div>
            <!-- Pending Tasks Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 transition-all hover:shadow-xl">
                <div class="flex items-center">
                    <i class="fas fa-hourglass-half text-yellow-500 text-2xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Pending Tasks</h2>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $pendingTasks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

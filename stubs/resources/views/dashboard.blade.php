<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-8">
        <!-- Hero Section -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 px-8 py-12 text-white shadow-2xl">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>

            <div class="relative z-10">
                <div class="mb-4">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        Hello, <span class="text-yellow-300">{{ auth()->user()->name }}</span>!
                    </h1>
                </div>
                <p class="text-xl md:text-2xl text-blue-100 font-medium mb-8">
                    Welcome back to your dashboard. Ready to make today amazing?
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm rounded-xl px-6 py-3 border border-white/20">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-400">
                            <svg class="h-6 w-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white/90">System Status</p>
                            <p class="text-lg font-semibold">All Systems Online</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm rounded-xl px-6 py-3 border border-white/20">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-400">
                            <svg class="h-6 w-6 text-yellow-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white/90">Today</p>
                            <p class="text-lg font-semibold">{{ now()->format('M j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="flex h-full w-full flex-1 flex-col gap-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
            </div>
            <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
    </div>
</x-layouts.app>

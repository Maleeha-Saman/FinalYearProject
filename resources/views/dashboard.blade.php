<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Auth::user()->role == 'admin')
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
                        <p class="text-gray-600">Welcome to the admin dashboard</p>
                    </div>
                @elseif (Auth::user()->role == 'employer')
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-3xl font-bold">Employer Dashboard</h1>
                        <p class="text-gray-600">Welcome to the Employer dashboard</p>
                    </div>
                @else
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-3xl font-bold">Job Seeker Dashboard kldjflsdjfslf</h1>
                        <p class="text-gray-600">Welcome to the Job Seeker dashboard</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

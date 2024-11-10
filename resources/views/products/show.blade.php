<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-5">
                        <div class="flex justify-between items-center mb-5">
                            <h1 class="text-white text-3xl font-semibold">Show Product</h1>
                            <a href="{{ route('products.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Back</a>
                        </div>
                        <div class="space-y-4">
                            <p class="text-white"><strong class="font-semibold">Name:</strong> {{ $product->name }}</p>
                            <p class="text-white"><strong class="font-semibold">Price:</strong> RM {{ $product->price }}</p>
                            <p class="text-white"><strong class="font-semibold">Details:</strong> {{ $product->details }}</p>
                            <p class="text-white"><strong class="font-semibold">Publish:</strong> {{ $product->publish ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

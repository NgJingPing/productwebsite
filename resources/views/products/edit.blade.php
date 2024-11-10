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
                            <h1 class="text-white text-3xl font-semibold">Edit Product</h1>
                            <a href="{{ route('products.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Back</a>
                        </div>

                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="name" class="block text-lg font-medium text-white">Name</label>
                                <input type="text" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" name="name" id="name" value="{{ $product->name }}" required placeholder="Name">
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-lg font-medium text-white">Price (RM)</label>
                                <input type="number" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" name="price" id="price" value="{{ $product->price }}" required placeholder="99.90" step="0.01">
                            </div>

                            <div class="mb-4">
                                <label for="details" class="block text-lg font-medium text-white">Details</label>
                                <textarea class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" name="details" id="details" required placeholder="Details">{{ $product->details }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="publish" class="block text-lg font-medium text-white">Publish</label>
                                <div class="flex items-center space-x-4 mt-2">
                                    <div class="flex items-center">
                                        <input class="form-radio text-blue-500" type="radio" name="publish" id="publish_yes" value="1" {{ $product->publish ? 'checked' : '' }}>
                                        <label class="ml-2 text-white" for="publish_yes">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input class="form-radio text-blue-500" type="radio" name="publish" id="publish_no" value="0" {{ !$product->publish ? 'checked' : '' }}>
                                        <label class="ml-2 text-white" for="publish_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
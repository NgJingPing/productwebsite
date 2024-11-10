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
                    <div class="container mx-auto mt-5 p-5">
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-white text-2xl font-semibold">Product List</h2>
                            <a href="{{ route('products.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Create New Product</a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
                            <div class="flex items-center">
                                <input type="text" name="search" placeholder="Search products..." value="{{ $search ?? '' }}"
                                       class="form-input w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 text-gray-900 dark:text-white">
                                <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Search</button>
                                <a href="{{ route('products.index') }}" class="ml-2 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Reset</a>
                            </div>
                        </form>
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-white-100">
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">No</th>
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">Name</th>
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">Price (RM)</th>
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">Details</th>
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">Publish</th>
                                    <th class="px-4 py-2 text-left border border-gray-300 text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-300 text-white">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border border-gray-300 text-white">{{ $product->name }}</td>
                                    <td class="px-4 py-2 border border-gray-300 text-white">{{ $product->price }}</td>
                                    <td class="px-4 py-2 border border-gray-300 text-white">{{ $product->details }}</td>
                                    <td class="px-4 py-2 border border-gray-300 text-white">{{ $product->publish ? 'Yes' : 'No' }}</td>
                                    <td class="px-4 py-2 border border-gray-300 text-white">
                                        <!-- Show button -->
                                        <form action="{{ route('products.show', $product->id) }}" method="GET" class="inline-block">
                                            <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-600">Show</button>
                                        </form>
                                        
                                        <!-- Edit button -->
                                        <form action="{{ route('products.edit', $product->id) }}" method="GET" class="inline-block ml-2">
                                            <button type="submit" class="bg-indigo-500 text-white py-1 px-3 rounded-md text-sm hover:bg-indigo-600">Edit</button>
                                        </form>

                                        <!-- Delete button -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-md text-sm hover:bg-red-600" onclick="return confirm('Are you sure you want to delete {{$product->name}}?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

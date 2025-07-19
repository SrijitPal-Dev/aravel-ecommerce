<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Products</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition duration-300">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-48 object-cover rounded mb-3" 
                         alt="{{ $product->name }}">

                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ Str::limit($product->description, 50) }}</p>
                    <p class="text-blue-600 font-bold mt-2">${{ number_format($product->price, 2) }}</p>

                    <a href="{{ url('/product/'.$product->id) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded mt-3 inline-block hover:bg-blue-700">
                        View
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>

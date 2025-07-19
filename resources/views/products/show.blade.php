<x-app-layout>
    <div class="max-w-4xl mx-auto py-12">
        <div class="bg-white shadow rounded p-6 text-center">
            <img src="{{ asset('storage/'.$product->image) }}" class="w-64 mx-auto mb-4">
            <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-xl font-bold mt-4">${{ number_format($product->price, 2) }}</p>
            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-4">
                @csrf
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

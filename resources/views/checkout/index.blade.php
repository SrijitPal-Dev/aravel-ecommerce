<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow rounded-lg">
            @if(empty($cart))
                <p>Your cart is empty.</p>
            @else
                @foreach($cart as $item)
                    <div class="flex justify-between border-b py-2">
                        <div>{{ $item['name'] }} x {{ $item['quantity'] }}</div>
                        <div>${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                    </div>
                @endforeach

                <form method="POST" action="{{ route('checkout.place') }}" class="mt-4">
                    @csrf
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Place Order
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>

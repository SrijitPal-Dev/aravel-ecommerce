<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                @if(empty($cart))
                    <p>Your cart is empty.</p>
                @else
                    @foreach($cart as $id => $item)
                        <div class="border-b py-4 flex justify-between items-center">
                            <div>
                                <strong>{{ $item['name'] }}</strong><br>
                                ${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}
                            </div>
                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded">
                                    Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                    <a href="{{ route('checkout.index') }}" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded">
                        Proceed to Checkout
                    </a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

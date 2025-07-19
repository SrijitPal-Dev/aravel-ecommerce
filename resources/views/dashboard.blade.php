<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Products</h2>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalProducts }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Orders</h2>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalOrders }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700">Revenue</h2>
                <p class="text-3xl font-bold text-purple-600 mt-2">${{ number_format($revenue, 2) }}</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
            <div class="flex space-x-4">
                <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Products</a>
                <a href="{{ route('cart.index') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">View Cart</a>
                <a href="#" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Manage Orders</a>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Orders</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Order ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Customer</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Total</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($recentOrders as $order)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">#{{ $order->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${{ number_format($order->total, 2) }}</td>
                            <td class="px-4 py-2 text-sm 
                                @if($order->status === 'completed') text-green-600 
                                @elseif($order->status === 'pending') text-yellow-600 
                                @else text-gray-600 @endif font-semibold">
                                {{ ucfirst($order->status) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<!--Title-->
<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
    Orders List
</h1>
<!--Card-->
<div class="container sm:px-4 mx-auto mb-xl-5 tracking-tight">
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <x-tabla :colums="$colOrders" icon="false" >
            @foreach ( $orders as $order )
                <tr class="bg-gray-200 border-b gray:bg-gray-800 gray:border-gray-700 dark:hover:bg-gray-50">
                    <td class="py-2">{{$order->order_ref}}</td>
                    <td class="py-2">{{$order->customer_name}}</td>
                    <td class="py-2">{{$order->total_qty}}</td>
                    <td class="py-2">{{$order->total_cost}}</td>
                </tr>
            @endforeach
        </x-tabla>
    </div>
</div>
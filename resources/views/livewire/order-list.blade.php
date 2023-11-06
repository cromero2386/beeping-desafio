<!--Title-->
<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
    Orders List
</h1>
<!--Card-->
<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <table id="orders-list" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">Order Reference</th>
                <th data-priority="2">Customer Name</th>
                <th data-priority="3">Total Qty</th>
                <th data-priority="4">Total Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $orders as $order )
            <tr>
                <td>{{$order->order_ref}}</td>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->total_qty}}</td>
                <td>{{$order->total_cost}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
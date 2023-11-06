@isset($colums)
    <div class="overflow-x-auto relative sm:rounded-sm ">
        <table id="orders-list" class="w-full text-sm text-center text-dark-500 gray:text-gray-400">
            <thead class="text-sm text-sky-900  bg-white dark:bg-white dark:text-dark-300 border-4 border-white border-b-gray-500">
            <tr>
                @foreach($colums as $key=>$col)
                    <th sortable scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            {{ $col }}
                        </div>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
@endisset
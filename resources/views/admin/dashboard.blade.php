<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl italic px-4sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            {{ __('Selamat Datang ') }} {{ Auth::user()->name }}!
        </div>
    </div>

    <div class="mx-auto max-w-screen-7xl px-4 2xl:px-0">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Pesanan Masuk</h2>

                <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                    <div>
                        <label for="order-type"
                            class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Select order
                            type</label>
                        <select id="order-type"
                            class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            <option selected>All orders</option>
                            <option value="pre-order">Pre-order</option>
                            <option value="transit">In transit</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <span class="inline-block text-gray-500 dark:text-gray-400"> from </span>

                    <div>
                        <label for="duration"
                            class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Select
                            duration</label>
                        <select id="duration"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            <option selected>this week</option>
                            <option value="this month">this month</option>
                            <option value="last 3 months">the last 3 months</option>
                            <option value="lats 6 months">the last 6 months</option>
                            <option value="this year">this year</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mt-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Jenis Mobil</th>
                            <th scope="col" class="px-4 py-3">Tanggal Sewa</th>
                            <th scope="col" class="px-4 py-3">Total Harga</th>
                            <th scope="col" class="px-4 py-3">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->product->name }}</th>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($order->start_date)->translatedFormat('d M Y') }} <span class="font-bold text-black text-sm"> - </span> {{ \Carbon\Carbon::parse($order->end_date)->translatedFormat('d M Y') }}</td>
                                <td class="px-4 py-3">Rp. {{ number_format($order->total_price), 0, ',', ',' }}</td>
                                <td class="px-4 py-3">
                                    <dd
                                        class="mb-2 me-2 mt-1.5 inline-flex text- items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                        <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                                        </svg>
                                        <p class="capitalize">{{ $order->status_payment }}</p>
                                    </dd>
                                </td>
                                <td>
                                    <div
                                        class="w-full grid sm:grid-cols-3 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4 mr-2 sm:mr-0">
                                        @if ($order->status === 'pending')
                                            <form action="{{ route('orders.updateStatus', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit"
                                                    class="w-full rounded-lg border bg-blue-700 border-blue-600 px-2 py-1 sm:px-4 sm:py-2 text-center text-sm font-medium text-white hover:bg-blue-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto mt-3 sm:mt-0">Terima</button>
                                            </form>

                                            <form action="{{ route('orders.updateStatus', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit"
                                                    class="w-full inline-flex justify-center rounded-lg border border-gray-200 bg-red-700 px-2 py-1 sm:px-4 sm:py-2 text-sm font-medium text-white hover:bg-red-800 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Tolak</button>
                                            </form>
                                        @elseif ($order->status === 'confirmed')
                                            <span
                                                class="font-bold text-white bg-blue-800 text-center justify-center py-2 px-4 rounded-lg mt-3 sm:mt-0">Diterima</span>
                                        @elseif ($order->status === 'canceled')
                                            <span
                                                class="font-bold text-white bg-red-800 text-center justify-center py-2 px-5 rounded-lg mt-3 sm:mt-0">Ditolak</span>
                                        @endif

                                        <button id="readProductButton-{{ $order->id }}" data-modal-target="readProductModal-{{ $order->id }}"
                                            data-modal-toggle="readProductModal-{{ $order->id }}"
                                            class="w-full inline-flex justify-center rounded-lg bg-white border border-gray-300 px-4 py-2 text-sm font-medium text-black hover:bg-blue-200 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto mb-3 sm:mb-0">Detail</button>

                                        @include('components.modal-order')
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination link --}}
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</x-app-layout>

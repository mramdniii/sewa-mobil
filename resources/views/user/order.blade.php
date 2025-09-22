<x-layout-user>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif --}}
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="{{ route('orders.store', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            @method('POST')
            <ol
                class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
                <div class="rounded-lg py-1 px-1 left-0 hover:text-blue-900 hover:bg-gray-200">
                    <span
                        class="flex items-center after:mx-2 text-blue-700 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                        <svg class="me-2 h-4 w-4 sm:h-7 sm:w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <a href="{{ route('detail.user', $product->id) }}">
                            <div class="text-blue-700 text-xl">{{ $product->name }}</div>
                        </a>
                    </span>
                </div>
            </ol>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Informasi Pemesanan</h2>

                        <!-- Biar tau produk mana yang dipesan -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nama Penyewa
                                </label>
                                <input type="text" id="name" name="name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Tulis nama Anda..." value="{{ Auth::user()->name }}" required />
                            </div>

                            <div>
                                <label for="email"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email
                                </label>
                                <input type="email" id="email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="name@sewaYu.com" value="{{ Auth::user()->email }}" required />
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="start_date"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"> Tanggal Mulai
                                        Sewa
                                    </label>
                                </div>
                                <input type="date" name="start_date" id="start_date" min="{{ date('Y-m-d') }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="end_date"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"> Tanggal Akhir
                                        Sewa
                                    </label>
                                </div>
                                <input type="date" name="end_date" id="end_date"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                </input>
                            </div>

                            <div>
                                <label for="phone_number"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nomor Telepon
                                </label>
                                <div class="flex items-center">
                                    <button id="dropdown-phone-button-3" data-dropdown-toggle="dropdown-phone-3"
                                        class="z-10 inline-flex shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        type="button">
                                        +62
                                    </button>
                                    <div class="relative w-full">
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500"
                                            placeholder="123-456-7890" required />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="no_ktp"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nomor
                                    Identitas (KTP/SIM)
                                </label>
                                <input type="no_ktp" id="no_ktp" name="no_ktp"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Masukkan Nomor NIK / SIM Anda..." required />
                            </div>

                            <div>
                                <label for="foto_ktp"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Foto KTP
                                </label>
                                <input type="file" id="foto_ktp" name="foto_ktp"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Flowbite LLC" required />
                            </div>

                            <div>
                                <label for="address"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Alamat
                                </label>
                                <textarea type="text" id="address" name="address"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Jl. Kenangan No.1" required /></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Pembayaran</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="credit-card" aria-describedby="credit-card-text" type="radio"
                                            name="payment-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                            checked />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="credit-card"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> Kartu
                                            Kredit
                                        </label>
                                        <p id="credit-card-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Bayar
                                            menggunakan kartu kredit Anda</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text"
                                            type="radio" name="payment-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="pay-on-delivery"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> Bayar di
                                            tempat </label>
                                        <p id="pay-on-delivery-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Bayar
                                            saat serah terima kendaraan</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="paypal-2" aria-describedby="paypal-text" type="radio"
                                            name="payment-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="paypal-2"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> DP terlebih
                                            dahulu </label>
                                        <p id="paypal-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Bayar DP
                                            terlebih dahulu 50% dari total harga</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio"
                                            name="delivery-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                            checked />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> $15 - DHL
                                            Fast Delivery </label>
                                        <p id="dhl-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by
                                            Tommorow</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="fedex" aria-describedby="fedex-text" type="radio"
                                            name="delivery-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="fedex"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> Free
                                            Delivery - FedEx </label>
                                        <p id="fedex-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by
                                            Friday, 13 Dec 2023</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="express" aria-describedby="express-text" type="radio"
                                            name="delivery-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="express"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> $49 -
                                            Express Delivery </label>
                                        <p id="express-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it
                                            today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="mt-10 lg:col-span-2 lg:mt-0">
                    <div
                        class="mt-6 mb-10 w-full space-y-6 sm:mt-8 lg:mt-5 bg-gray-100 rounded-lg px-5 py-5 pt-5 lg:max-w-xs xl:max-w-md">
                        <div class="flow-root">
                            <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white" id="subtotal">Rp.
                                        {{ number_format($product->price), 0, '.' }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Biaya Antar</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">Rp. 0</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">(PPN 11%)</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white" id="tax">RP.
                                        0
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <span class="text-base font-bold text-gray-900 dark:text-white"
                                        id="total_price">Rp.
                                        0</span>
                                </dl>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Lanjut
                                ke Pembayaran</button>

                            <p class="text-sm font-normal italic text-justify text-gray-500 dark:text-gray-400">
                                "Perjalanan
                                nyaman, dimulai dari pilihan mobil yang tepat. Kenyamanan selalu jadi prioritas utama
                                untuk
                                setiap perjalanan Anda"</p>
                        </div>
                    </div>
                    <div>
                        <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Masukan voucher atau kode promo </label>
                        <div class="flex max-w-md items-center gap-4">
                            <input type="text" id="voucher"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="" />
                            <button type="button"
                                class="flex items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


    {{-- JS untuk total harga realtime  --}}
    <script>
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalPriceDisplay = document.getElementById('total_price');
        const taxDisplay = document.getElementById('tax');
        const productPricePerDay = {{ $product->price }};
        const subtotalDisplay = document.getElementById('subtotal');

        function calculateTotalPrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate && endDate && endDate >= startDate) {
                const timeDiff = endDate - startDate;
                const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)) + 1; // Include both start and end date
                const totalPrice = daysDiff * productPricePerDay * 1.11; // Including 11% tax
                const subtotal = daysDiff * productPricePerDay;
                subtotalDisplay.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
                totalPriceDisplay.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                taxDisplay.textContent = `Rp ${(daysDiff * productPricePerDay * 0.11).toLocaleString('id-ID')}`;
            } else {
                subtotalDisplay.textContent = 'Rp 0';
                totalPriceDisplay.textContent = 'Rp 0';
                taxDisplay.textContent = 'Rp 0';
            }
        }

        subtotalDisplay.addEventListener('change', calculateTotalPrice);
        startDateInput.addEventListener('change', calculateTotalPrice);
        endDateInput.addEventListener('change', calculateTotalPrice);
        taxDisplay.addEventListener('change', calculateTotalPrice);

        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
        })
    </script>
</x-layout-user>

<!-- Main modal -->
<div id="loginModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="hidden inset-0 bg-black bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-gray-100 rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button"
                class="text-black absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="loginModal-{{ $item->id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="w-11 h-11 mb-3.5 mx-auto text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9" />
            </svg>
            <p class="mb-1 text-black dark:text-gray-300">Ingin sewa {{ $item->name }}?</p>
            <p class="mb-4 text-sm font-light text-black dark:text-gray-300">Login dulu yuk! Atau belum punya akun? Klik REGISTER untuk buat akun sekarang!!</p>
            <div class="flex justify-center items-center space-x-4 mt-3">
                <a href="{{ route('login') }}"">
                <button data-modal-toggle="loginModal-{{ $item->id }}" type="submit"
                    class="py-2 px-5 text-sm font-medium text-black bg-white rounded-lg border border-gray-200 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-300 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Login
                </button>
                </a>
                <a href="{{ route('register') }}"">
                <button type="submit"
                    class="py-2 px-5 text-sm font-medium text-center text-black bg-white rounded-lg border border-gray-200 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Register
                </button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('loginButton').click();
    });
</script>

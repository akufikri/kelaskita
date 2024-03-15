<!-- drawer component -->
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-50 shadow-md w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Kelaskita
    </h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto mt-5">
        <ul class="space-y-2 font-medium text-xl">
            <li>
                <a href="/"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-fuchsia-300 transition hover:shadow-lg dark:hover:bg-fuchsia-700 group">
                    <i
                        class="fa-solid fa-house-user  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="/user/tugas"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-fuchsia-300 transition hover:shadow-lg dark:hover:bg-fuchsia-700 group">
                    <i
                        class="fa-solid fa-clipboard  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Tugas</span>
                </a>
            </li>
            <li>
                <a href="/user/pengaturan"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-fuchsia-300 transition hover:shadow-lg dark:hover:bg-fuchsia-700 group">

                    <i
                        class="fa-solid fa-gear  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
</div>

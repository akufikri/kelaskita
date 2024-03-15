 <nav class="fixed top-0 px-9 z-50 w-full bg-white border-b  dark:bg-gray-800 dark:border-gray-700 h-16">
     <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
             <div class="flex gap-5 items-center justify-start rtl:justify-end">
                 <div class="text-center">
                     <button class="text-black text-xl" type="button" data-drawer-target="drawer-navigation"
                         data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                         <i class="fa-solid fa-bars"></i>
                     </button>
                 </div>
                 <a href="/" class="flex ms-2 md:me-24">
                     <img src="{{ asset('assets/logo/logo.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                     <span
                         class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Kelaskita</span>
                 </a>
             </div>
             <div class="flex items-center">
                 <div class="flex items-center ms-3 gap-5">
                     <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                         class="text-white bg-blue-700 transition hover:scale-105 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm h-8 w-8 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                         type="button"><i class="fa-solid fa-plus ms-2.5"></i>
                     </button>
                     <div>
                         <button type="button"
                             class="flex text-sm bg-fuchsia-100 shadow-lg rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                             aria-expanded="false" data-dropdown-toggle="dropdown-user">
                             <span class="sr-only">Open user menu</span>
                             <img class="w-8 h-8 rounded-full"
                                 src="{{ asset('profile_user/' . Auth::user()->profile) }}"
                                 alt="{{ Auth::user()->profile }}">
                         </button>
                     </div>
                     <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                         id="dropdown-user">
                         <div class="px-4 py-3" role="none">
                             <p class="text-sm text-gray-900 dark:text-white" role="none">
                                 {{ Auth::user()->name }}
                             </p>
                             <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                 {{ Auth::user()->email }}
                             </p>
                         </div>
                         <ul class="py-1" role="none">
                             <li>
                                 <a href="/logout"
                                     class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                     role="menuitem">Sign out</a>
                             </li>
                         </ul>
                     </div>
                     <div id="dropdown"
                         class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg me-5 w-44 dark:bg-gray-700">
                         <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                             aria-labelledby="dropdownDefaultButton">
                             <li>
                                 <a data-modal-target="static-modal" data-modal-toggle="static-modal" href="#"
                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Membuat
                                     Kelas</a>
                             </li>
                             <li>
                                 <a data-modal-target="join-modal" data-modal-toggle="join-modal" href="#"
                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Join
                                     Kelas</a>
                             </li>

                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </nav>
 <x-CreateClass />
 <x-JoinClass />

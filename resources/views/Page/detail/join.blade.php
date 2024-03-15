@extends('app')

@section('content')
    <section>
        <div class="max-w-7xl mx-auto p-4">
            <div class="sm:flex flex-wrap gap-4 justify-center">
                <div class="max-w-5xl w-full">
                    <div class="bg-fuchsia-500 h-44 px-10 rounded-md shadow-md">
                        <h1 class="text-2xl pt-24 font-medium text-white">{{ $kelas->nama_kelas }}</h1>
                        <span class="text-white">{{ $kelas->user->name }} </span>
                    </div>

                    <div class="mt-7 ">
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Komentar</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                                    <i class="fa-solid fa-circle-user w-4 h-4 text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 shadow-md transition duration-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tambah komen..." required>
                            </div>
                            <button type="submit"
                                class="p-2.5 ms-2 transition hover:scale-105 shadow-md text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <div class="flex gap-1">
                                    <i class="fa-regular fa-paper-plane w-6 h-4"></i>

                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="mt-5">
                        <!---content---->
                        @foreach ($tugas as $tugasItem)
                            <div class="border-2 mb-5 w-full h-20 rounded-md shadow-lg  py-3 px-6">
                                <div class="flex gap-3">
                                    <div>
                                        <div
                                            class="relative inline-flex items-center justify-center w-12 h-12 overflow-hidden bg-fuchsia-100 rounded-full dark:bg-gray-600">
                                            <i
                                                class="fa-regular fa-clipboard text-2xl font-medium text-gray-600 dark:text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-700">
                                            <a href="/preview/{{ $tugasItem->id }}"
                                                class="hover:underline text-fuchsia-500">{{ $tugasItem->nama_tugas }}</a>
                                        </h4>
                                        <span
                                            class="text-sm font-medium text-gray-500">{{ $tugasItem->created_at->format('H:i | j M') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!---content---->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

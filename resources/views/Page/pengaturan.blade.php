@extends('app')
@section('content')
    <div>
        <div class="flex justify-center">
            <div class="w-full max-w-xl">
                <div class="grid">
                    <div class="flex justify-center mt-1">

                        <img class="w-20 h-20 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                            src="{{ asset('profile_user/' . Auth::user()->profile) }}" alt="Bordered avatar">

                    </div>
                    <div class="flex justify-center mt-3 mb-3">
                        <div class="max-w-sm">
                            <span
                                class="bg-fuchsia-400 text-sm text-white px-5 py-1 rounded-lg">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-4">
                            <div class="mb-6 w-full">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input value="{{ Auth::user()->name }}" name="name" type="text" id="nameInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
                            </div>
                            <div class="mb-6 w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input value="{{ Auth::user()->email }}" name="email" type="email" id="emailInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="mb-6 w-full">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input value="{{ Auth::user()->password }}" name="password" type="password"
                                    id="passwordInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500">
                            </div>
                            <div class="mb-6 w-full">
                                <label for="file_input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
                                <input name="profile"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="fileInput" type="file">
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white transition shadow-md bg-fuchsia-400 hover:bg-fuchsia-500 focus:ring-4 focus:outline-none focus:ring-fuchsia-300 font-medium rounded-md text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-fuchsia-600 dark:hover:bg-fuchsia-700 dark:focus:ring-fuchsia-800">Update
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

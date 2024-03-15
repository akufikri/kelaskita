@extends('app')

@section('content')
    <section>
        <div class="flex justify-center">
            <div class="max-w-5xl w-full">
                <div class="grid grid-cols-3 grid-rows-2 gap-4">
                    <!-- Display User's Created Classes -->
                    @foreach ($userCreatedClasses as $createdClass)
                        <div class="col-span-4 sm:col-span-1 shadow-md rounded-md border">
                            <div class="bg-blue-500 h-20 text-white px-4 py-2 rounded-tr-md rounded-tl-md">
                                <div class="max-w-sm mt-2 grid">
                                    <a href="{{ route('t', ['id' => Crypt::encrypt($createdClass->id)]) }}"
                                        class="text-lg font-medium hover:underline">
                                        {{ Str::limit($createdClass->nama_kelas, 20, '...') }}
                                    </a>
                                    <span class="text-xs text-gray-200">
                                        {{ Str::limit($createdClass->deskripsi_kelas, 40, '...') }}
                                    </span>
                                </div>
                            </div>
                            <div class="relative bottom-9 sm:left-56 left-80rounded-full">
                                <img class="h-20" src="" alt="">
                            </div>
                            <div class="h-20 px-4 py-2 bottom-12 relative overflow-scroll text-xs">
                            </div>
                            <div class="bg-gray-100 px-4 py-4 border-t z-10">
                                <div class="flex justify-between">
                                    <div class="grid">
                                        <h4 class="text-sm font-medium">Siswa</h4>
                                        <span class="text-xs text-gray-500">{{ $createdClass->joinKelas->count() }}</span>
                                    </div>
                                    <div class="mt-auto text-gray-500">
                                        <div class="flex gap-4">
                                            <a href=""> <i class="fa-regular fa-folder"></i></a>
                                            <a href=""> <i class="fa-regular fa-circle-user"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Display User's Joined Classes -->
                    @foreach ($userJoinedClasses as $joinedClass)
                        {{-- @php
                            $enId = Crypt::encrypt($joinedClass->id);
                        @endphp --}}
                        <div class="col-span-4 sm:col-span-1 shadow-md rounded-md border">
                            <div class="bg-blue-500 h-20 text-white px-4 py-2 rounded-tr-md rounded-tl-md">
                                <div class="max-w-sm mt-2 grid">
                                    <a href="{{ route('u', ['id' => Crypt::encrypt($joinedClass->kelas->id)]) }}"
                                        class="text-lg font-medium hover:underline">
                                        {{ Str::limit($joinedClass->kelas->nama_kelas, 20, '...') }}
                                    </a>

                                    <span class="text-xs text-gray-200">
                                        {{ Str::limit($joinedClass->kelas->deskripsi_kelas, 20, '...') }}
                                    </span>
                                </div>
                            </div>
                            <div class="relative bottom-9 sm:left-56 left-80 bg-fuchsia-200 w-20 rounded-full">
                                <img class="h-20 rounded-full"
                                    src="{{ asset('profile_user/' . $joinedClass->kelas->user->profile) }}"
                                    alt="{{ $joinedClass->kelas->user->profile }} Profile">
                            </div>
                            <div class="h-20 px-4 py-2 bottom-12 relative overflow-scroll text-xs">
                                @foreach ($joinedClass->kelas->tugas as $tugasItem)
                                    <li>
                                        <a href="{{ route('u', ['id' => Crypt::encrypt($joinedClass->kelas->id)]) }}"
                                            class="hover:underline text-fuchsia-400">{{ $tugasItem->nama_tugas }}
                                            | {{ $tugasItem->created_at->format('d/m/Y') }}</a>
                                    </li>
                                @endforeach
                            </div>
                            <div class="bg-gray-100 px-4 py-5 border-t  pb-6">
                                <div class="flex justify-between">
                                    <div class="grid">
                                        {{-- <h4 class="text-sm font-medium">Si5swa</h4>
                                        <span class="text-xs text-gray-500"> murid</span> --}}
                                    </div>
                                    <div class="mt-auto text-gray-500">
                                        <div class="flex gap-4">
                                            <a href=""> <i class="fa-regular fa-folder"></i></a>
                                            {{-- <a href=""> <i class="fa-regular fa-circle-user"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

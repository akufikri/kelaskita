@extends('app')

@section('content')
    <section>
        <div class="max-w-7xl mx-auto p-4">
            <div class="sm:flex flex-wrap gap-4 justify-center">
                <div class="max-w-5xl w-full">
                    <div class="bg-fuchsia-500 h-44 px-10 rounded-md shadow-md">
                        <h1 class="text-2xl pt-24 font-medium text-white">{{ $kelas->nama_kelas }}</h1>
                        <div class="flex">
                            <span class="text-white">{{ $kelas->user->name }} </span>
                            <span class="text-white ms-auto">Kode kelas: <span
                                    class="font-semibold">{{ $kelas->kode_kelas }}</span> </span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <!---content---->
                        <button class="border-2 mb-5 w-full h-20 rounded-md py-3 px-6 hover:shadow-lg transition"
                            onclick="toggleForm()">
                            <h1 class="text-center font-semibold text-fuchsia-400">Tambah Tugas....</h1>
                        </button>
                        <div class="border-2 mb-5 w-full rounded-md py-3 px-6 hidden" id="tugasForm">
                            @php
                                $enId = Crypt::encrypt($kelas->id);
                            @endphp
                            <form class=" mx-auto mt-5 mb-5" action="/create_tugas/{{ $enId }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="relative z-0 w-full mb-5 group mt-5">
                                    <input type="text" name="nama_tugas" id="nama_tugas"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="nama_tugas"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                        Tugas</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="deskripsi_tugas" id="deskripsi_tugas"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="deskripsi_tugas"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deksripsi
                                        Tugas</label>
                                </div>
                                <input type="text" name="url_link" id="url_link" hidden>
                                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Upload Document
                                </label>
                                <input type="file" name="upload" id="file" multiple
                                    accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain,image/*" />


                                <div id="tooltip-linked" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                    Url
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                {{-- tooltip up file --}}

                                <div class="flex gap-6 mt-10">
                                    <div class="flex gap-4 mb-5">

                                        <button type="button" data-modal-target="upload-url-modal"
                                            data-modal-toggle="upload-url-modal" data-tooltip-target="tooltip-linked"
                                            data-tooltip-style="light"
                                            class="bg-gray-200 w-9 h-9 rounded-full text-center p-1 hover:scale-105 transition">
                                            <i class="fa-solid fa-link"></i>
                                        </button>

                                    </div>
                                    <div>
                                        <div class="flex gap-2">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 hover:scale-105 py-2 transition text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                                Tugas</button>
                                            <button type="submit"
                                                class="text-white me-5  bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 hover:scale-105 py-2 transition text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class=" mb-4 mt-4">
                                <div id="previewDiv"
                                    class="flex-col hidden h-20 items-center overflow-hidden bg-white border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <img class="object-cover  w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                                        src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
                                    <div class="flex flex-col justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                            Noteworthy technology acquisitions 2021</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the......</p>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!---content---->
                    </div>
                    <div class="mt-5">
                        <!---content---->
                        @foreach ($tugas as $tugasItem)
                            <div class="border-2 mb-5 w-full h-20 rounded-md shadow-lg py-3 px-6">
                                <div class="flex justify-between">
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
                                                <a data-modal-toggle="task-modal{{ $tugasItem->id }}"
                                                    data-modal-target="task-modal{{ $tugasItem->id }}" href="#"
                                                    class="hover:underline text-fuchsia-500">
                                                    {{ $tugasItem->nama_tugas }}
                                                </a>
                                            </h4>
                                            <span
                                                class="text-sm font-medium text-gray-500">{{ $tugasItem->created_at->format('H:i | j M') }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="mt-3 bg-fuchsia-400 w-9 h-9 rounded-full text-fuchsia-50 hover:scale-105 transition">
                                            <i class="fa-solid fa-trash" data-modal-target="delete-modal"
                                                data-modal-toggle="delete-modal"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Main modal -->
                            <div id="task-modal{{ $tugasItem->id }}" data-modal-backdrop="static" tabindex="-1"
                                aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Preview tugas
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="task-modal{{ $tugasItem->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>

                                        <div class="p-4 md:p-5 space-y-4">
                                            <!-- Display document information -->
                                            <p>{{ $tugasItem->deskripsi_tugas }}</p>

                                            @php
                                                $fileExtension = pathinfo($tugasItem->upload, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (in_array($fileExtension, ['jpeg', 'jpg', 'png', 'gif']))
                                                <!-- Display image if it's an image -->
                                                <div class="border-2 rounded-md flex items-center justify-center">
                                                    <img src="{{ asset('uploadTugas/' . $tugasItem->upload) }}"
                                                        alt="Uploaded Image"
                                                        class="object-cover w-32 h-32 hover:scale-105 transition ">
                                                </div>
                                            @elseif ($fileExtension === 'pdf')
                                                <!-- Display PDF using <embed> tag without controls -->
                                                <div class="border-2 h-72">
                                                    <embed src="{{ asset('uploadTugas/' . $tugasItem->upload) }}"
                                                        type="application/pdf" width="100%" height="100%">
                                                </div>
                                            @elseif (in_array($fileExtension, ['doc', 'docx']))
                                                <!-- Display document using iframe if it's a document other than PDF -->
                                                <iframe src="{{ asset('uploadTugas/' . $tugasItem->upload) }}"
                                                    class="w-full h-72" frameborder="0" scrolling="auto"></iframe>
                                            @else
                                                <!-- Handle other file types or show an error message -->
                                                <p>Unsupported file type</p>
                                            @endif

                                            <a href="{{ asset('uploadTugas/' . $tugasItem->upload) }}" target="_blank"
                                                class="text-fuchsia-500 hover:underline">Download Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div id="delete-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="delete-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda
                                                yakin ingin menghapus ?
                                            </h3>
                                            <button onclick="location.href='/t/delete/{{ $tugasItem->id }}'"
                                                type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes
                                            </button>
                                            <button data-modal-hide="delete-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                                        </div>
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



    <x-upload-by-url />


    <script>
        function toggleForm() {
            var form = document.getElementById('tugasForm');
            form.classList.toggle('hidden');

        }


        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('dropzone-file');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection

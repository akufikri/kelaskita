@extends('app')

@section('content')
    <section>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div class="col-span-3 row-span-3 p-5">
                <h1 class="text-2xl font-medium">{{ $tugas->nama_tugas }}</h1>
                <p class="mt-1 text-gray-700 mb-1">Pemberi materi: {{ $tugas->user->name }}</p>
                @if ($pengumpulanTugas)
                    <span class="font-medium">Nilai {{ $pengumpulanTugas->nilai }}</span>
                @else
                    <span class="font-medium">0</span>
                @endif
                <hr class="mt-5">
                <div class="mt-5">
                    <p>{{ $tugas->deskripsi_tugas }}</p>
                </div>
                <a data-modal-target="image-modal" data-modal-toggle="image-modal" href="#"
                    class="flex mt-5 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img id="image-preview"
                        class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ asset('fotoTugas/' . $tugas->foto) }}" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ asset('fotoTugas/' . $tugas->foto) }}</p>
                    </div>
                </a>
            </div>
            <div class="row-span-2 shadow-md rounded-md p-5 border-2">
                <form action="/store/task/{{ $tugas->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-xl">Kumpulkan</h4>
                    <div class="mt-4">
                        <label for="file_input" class="text-sm text-gray-700">Pilih File</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" name="file_submisson" type="file">
                    </div>
                    <h4 class="mt-3 text-sm text-red-600">{{ $status }}</h4>
                    <div class="grid mt-3">
                        <button type="submit"
                            class="border-2 py-2 rounded-md hover:bg-gray-100 transition hover:shadow-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div id="image-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Preview image
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="image-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <img src="{{ asset('fotoTugas/' . $tugas->foto) }}" alt="">
                </div>

            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            var input = document.getElementById('file_input');
            var preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

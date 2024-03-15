<!-- Main modal -->
<div id="upload-url-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="upload-url-modal">
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
                <form id="urlForm" class="mx-auto" action="/send_url" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input name="url" type="text" name="floating_url" id="floating_url"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder="" required />
                        <label for="floating_url"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Link</label>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="upload-url-modal" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                    Link</button>
                <button data-modal-hide="upload-url-modal" type="button"
                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var urlInput = document.getElementById('floating_url');
        var addButton = document.querySelector('#upload-url-modal [data-modal-hide="upload-url-modal"]');
        var urlForm = document.getElementById('urlForm');

        // Fungsi untuk mengecek apakah URL sudah diisi
        function checkUrlInput() {
            addButton.disabled = !urlInput.value.trim(); // Menonaktifkan tombol jika URL kosong
        }

        // Memantau perubahan pada input URL
        urlInput.addEventListener('input', checkUrlInput);

        // Menjalankan fungsi sekali saat halaman dimuat
        checkUrlInput();

        // Menangani submit form
        urlForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var urlValue = urlInput.value.trim();

            // Menambahkan data URL ke input field di form detail kelas
            var detailKelasUrlInput = document.getElementById('url_link');
            detailKelasUrlInput.value = urlValue;

            // Menutup modal
            var uploadUrlModal = document.getElementById('upload-url-modal');
            uploadUrlModal.classList.add('hidden');
        });
    });
</script>

    <!-- Main modal -->
    <div id="upload-file-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">

                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="upload-file-modal">
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
                    <form id="fileForm" class="mx-auto" method="POST" action="{{ route('send_document') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Upload Document
                        </label>
                        <input type="file" name="file" id="file"
                            accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain,image/*" />

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="upload-file-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                        File</button>
                    <button data-modal-hide="upload-file-modal" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fileInput = document.getElementById('file');
            var uploadButton = document.querySelector('#upload-file-modal [data-modal-hide="upload-file-modal"]');
            var fileForm = document.getElementById('fileForm');

            function checkFileInput() {
                uploadButton.disabled = !fileInput.files.length; // Disable button if no file is selected
            }

            // Monitor changes to the file input
            fileInput.addEventListener('change', checkFileInput);

            // Run the function once when the page loads
            checkFileInput();

            // Handle form submission
            fileForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Handle the file upload logic here
                // You may want to use AJAX to submit the form asynchronously

                // For now, let's simulate a successful upload by logging the file details
                console.log("File Uploaded:", fileInput.files[0]);

                // Close the modal
                var uploadFileModal = document.getElementById('upload-file-modal');
                uploadFileModal.classList.add('hidden');
            });
        });
    </script>

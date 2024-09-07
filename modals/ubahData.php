<div id="ubahData" class="fixed top-0 left-0 w-full h-screen overflow-y-auto bg-black bg-opacity-20">
    <div class="flex items-center justify-center min-h-screen">
        <div class="border border-gray-500 w-[90%] md:w-4/12 shadow shadow-lg bg-white opacity-100 rounded-lg shadow-lg p-8">
            <div class="flex justify-end">
                <button id="closeModalUbahData" class="text-xl rounded-full text-red-500 outline-none border-none">
                    <span class="material-symbols-outlined mx-auto">
                        close
                    </span>
                </button>
            </div>
            <form class="space-y-6 " action="#" method="POST">
                <div class=" ">
                    <label for="name" class="block text-sm font-medium leading-6  ">Nama</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $data_user_login['name'] ?>">
                    </div>
                </div>
                <div class=" ">
                    <label for="email" class="block text-sm font-medium leading-6">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $data_user_login['email'] ?>">
                    </div>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium leading-6">Nomor Telepon</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="phone" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $data_user_login['phone'] ?>">
                    </div>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium leading-6">NIK</label>
                    <div class="mt-2">
                        <input id="nik" name="nik" type="text" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $data_user_login['nik'] ?>">
                    </div>
                </div>
                <div>
                    <label for="pedukuhan" class="block text-sm font-medium leading-6">Pedukuhan</label>
                    <div class="mt-2">
                        <input id="pedukuhan" name="pedukuhan" type="text" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $data_user_login['pedukuhan'] ?>">
                    </div>
                </div>
                <div class="">
                    <button type="submit" action="#" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-white">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
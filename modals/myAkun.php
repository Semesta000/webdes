            <div id="myAkun" class="fixed hidden top-0 left-0 w-full h-screen overflow-y-auto bg-black bg-opacity-20">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="border border-gray-500 w-[90%] md:w-4/12 shadow shadow-lg bg-white opacity-100 rounded-lg shadow-lg p-8">
                        <div class="flex justify-end">
                            <button id="closeModal" class="text-xl rounded-full text-red-500 focus:border-none">
                                <span class="material-symbols-outlined p-1 mx-auto">
                                    close
                                </span>
                            </button>
                        </div>
                        <div class="p-3 w-[30%] mx-auto md:w-[40%] lg:w-[45%]">
                            <?php
                            $gambar = $data_user_login['photos'];
                            if ($gambar && file_exists("../assets/img/$gambar")) {
                                echo "<img src='../assets/img/$gambar' alt='foto' class='w-full h-auto rounded-full'>";
                            } else {
                                echo "<img src='asset/img/user/login-default.jpg' alt='foto' class='w-full h-auto rounded-full'>";
                            }
                            ?>
                        </div>
                        <div class="p-3 text-black text-center text-2xl">
                            <p><?= $data_user_login['name'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['email'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['phone'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['pedukuhan'] ?></p>
                        </div>
                        <div class="p-3 gap-6 grid grid-cols-2 w-[100%] lg:w-[80%] mx-auto justify-center ">
                            <button class="bg-blue-500 col-span-1 p-2 text-white rounded-lg">
                                Edit Profile
                            </button>
                            <button id="logout" class="bg-red-500 col-span-1 p-2 text-white rounded-lg">
                                Log Out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
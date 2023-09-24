<template>
    <div class="border min-h-[100vh]">
        <div class=" w-[100%] h-[100vh] bg-[#f4f4f4]" style="flex:1 1 auto;">
            <div class="flex overflow-hidden">
                <aside
                    class="flex flex-col px-[10px] py-[20px] w-[300px] h-[100%] overflow-hidden overflow-y-auto border-r ">
                    <div class="mb-[8px] border-b px-[10px] pb-[20px]">
                        <div class="flex">
                            <a style="background-image: linear-gradient(180deg, rgb(255, 0, 149),rgb(183, 0, 255)); flex: 0 0 56px; user-select: none; text-decoration: none;" class="mr-[15px] rounded-[50%] flex justify-center items-center h-[56px] overflow-hidden"
                                href="">
                            <span  class="rounded-[50%] bg-[silver] w-[92%] h-[52px] "></span>
                        </a>
                            <div class="flex flex-col justify-center" style="flex: 1 1;">
                                <a style="text-decoration: none;" class="font-normal cursor-pointer text-[#2b87db] text-[14px]" href="/">
                                    <div class="text-[#121212] font-bold text-[16px] leading-[1.43]">Mirzoev</div>
                                    <div class="text-[#121212] font-bold text-[16px] leading-[1.43]">Firdavs</div>
                                </a>
                            </div>

                            
                        </div>
                        
                    </div>
                    <ul class="m-[0] border-b px-[10px] " style="list-style:none;">
                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'user']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Профиль</span>
                                    </a>
                                </li>

                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'bell']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Уведомления</span>
                                    </a>
                                </li>
                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'heart']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Избранное</span>
                                    </a>
                                </li>

                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'comment']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Сообщения</span>
                                    </a>
                                </li>

                                

                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'newspaper']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Мои объявления</span>
                                    </a>
                                </li>

                                <li class="relateive rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <img src="../public/s
                                            
                                            
                                            earch-favorite-1.svg" class="w-[20px]" style="font-weight: bolder;" alt="">
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Сохранённые поиски</span>
                                    </a>
                                </li>

                                <li class="relateive bg-[skyblue] rounded-[3px]">
                                    <a href="/" class="flex text-[#121212] text-[16px] font-bold" style="text-decoration: none; padding: 12px 10px 10px 5px;">
                                        <div class="text-[#475258]">
                                            <font-awesome-icon :icon="['far', 'eye-slash']" />
                                        </div>
                                        <span class="text-[16px] absolute ml-[30px]">Скрытые объявления</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-[6px] mb-[20px] ml-[-18px] list-none ">
                                <li style="padding: 12px 10px 10px 0; text-decoration: none;" class=" text-[14px] flex items-center  relative cursor-pointer rounded-[3px] text-[#121212] font-bold leading-[1.29] ">
                                    <div class="text-[18px]  absolute ml-[0]" style="transform: rotate(180deg);">
                                        <font-awesome-icon class="text-[#121212]" :icon="['fas', 'arrow-right-from-bracket']" />
                                    </div>
                                    <span class="absolute left-[31px]">Выйти</span>
                                </li>
                        </ul>
                </aside>
            </div>
        </div>
    </div>
</template>
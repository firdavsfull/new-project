<template>
    <div class="min-h-[100vh] bg-[#f4f4f4] p-[10px]">
        <div class="px-[30px]  h-[50px] flex  mt-[10px]  ">
            <h1 class="text-[27px] mx-[8px] mt-[8px] font-bold">Новое объявление</h1>
        </div>
        <div class="h-[100vh] mt-[30px] bg-[white] max-w-full">

            <div class="relative z-1 mt-[10px] border-top-2 mb-[0]">
                <div class="text-[#121212] font-[400] text-[14px] leading-[1.3] py-[10px] px-[16px] ">
                    <div class="relative my-[10px]">
                        <div class="mb-[10px]  font-bold text-[16px] leading-[16px]">
                            Адрес или название бизнес-центра
                        </div>
                    </div>

                    <div class="text-[#121212] font-[400] text-[14px] leading-[1.3]">
                <form class="mt-3">
      
                    <div class="dropdown mb-5">
                        <a
                        class="btn form-control border dropdown-toggle-none position-relative"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        >
                        <span class="me-5">Укажите город</span>
                        </a>

                        <ul
                        style="height: 300px; overflow: auto"
                        class="dropdown-menu form-control"
                        >
                        <li>
                            <a
                            
                            class="dropdown-item"
                            href="#"
                            >Город</a
                            >
                        </li>
                        </ul>
                    </div>
                    <p
                        style="
                        margin-top: -45px;
                        font-family: Lato, Arial, sans-serif;
                        font-weight: 400;
                        font-size: 11px;
                        line-height: 15px;
                        color: red;
                        "
                    >
                        Укажите адрес
                    </p>
                </form>

                <div style=" overflow: hidden; display: flex; align-items: center; justify-content: center; width: 100%; height: 350px;">
                    <img
                        class="width:100%; height:350px"
                        src="https://geoawesomeness.com/wp-content/uploads/2022/03/maps-broadcom.png"
                    />
            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[white] container-sm h-[400px] mt-[20px]">
            <div class="p-[10px]">
                <div class="mb-[20px] text-[14px] leading-[20px] text-[rgba(21,34,66,.6)] font-weight">
                    Обычное объявление
                </div>
            </div>

            <div class="p-[10px]">
                <div class="flex flex-col">
                    <div class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]">
                        Общая площадь
                    </div>

                    <div class="flex rounded-1 border px-[4px] w-[85px]">
                        <input class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]" v-maska data-maska="####" type="text">
                        <span>м<sup class="text-[10px]">2</sup></span>
                    </div>
                </div>

                <div class="flex flex-col mt-[20px]">
                    <div class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]">
                        Этаж
                    </div>

                    <div class="flex rounded-1 border px-[4px] w-[85px]">
                        <input class="border-0 h-[24px] outline-0 w-[100%] text-[14px] font-[450] text-[gray]" v-maska data-maska="###" type="text">
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]">
                        Из
                    </div>

                    <div class="flex rounded-1 border px-[4px] w-[85px]">
                        <input class="border-0 h-[24px] outline-0 w-[100%] text-[14px] font-[450] text-[gray]" v-maska data-maska="###" type="text">
                    </div>
                </div>

                <div class="flex flex-col mt-[10px]">
                    <div class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]">
                        Высота потолков
                    </div>

                    <div class="flex rounded-1 border px-[4px] w-[85px]">
                        <input class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]" v-maska data-maska="####" type="text">
                        <span>м</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
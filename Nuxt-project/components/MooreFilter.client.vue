<template>
    <div class="w-full h-[100vh] z-[200] bg-[black]/40 fixed flex justify-center top-[0]">
        <div class="w-[900px] flex flex-col overflow-hidden rounded-[4px] h-[500px] my-[auto] relative bg-[white]" >
            <div class="w-full h-[75px] border-bottom justify-between flex items-center">
                <h3 class="text-[23px] font-bold ml-[50px]">Еще фильтры</h3>
                <button @click="isHideModal" class="text-[25px] font-normal absolute right-[10px] text-[gray] cursor-pointer top-[0px] ">
                    <font-awesome-icon :icon="['fas', 'xmark']" />
                </button>
            </div>
            <div class="w-full overflow-auto top-[75px] h-[350px]" >
                <div class="h-[auto] flex flex-col px-[20px] py-[20px]">
                    <div class="flex w-full justify-center">
                        <div class="w-[100px] flex items-center justify-end">
                            <span class="text-[14px]">Площадь м<sup class="text-[10px]">2</sup></span>
                        </div>

                        <div class="flex ml-[30px] items-center">
                            <span class="text-[13px] mr-[5px]">Общая</span>
                            <input type="text" class="border w-[50px] outline-0" placeholder="от">
                            <input type="text" class="border w-[50px] outline-0" placeholder="до">
                        </div>
                        <div class="flex ml-[15px] items-center">
                            <span class="text-[13px] mr-[5px]">Кухня</span>
                            <input type="text" class="border w-[50px] outline-0" placeholder="от">
                            <input type="text" class="border w-[50px] outline-0" placeholder="до">
                        </div>
                        <div class="flex ml-[15px] items-center">
                            <span class="text-[13px] mr-[5px]">Жилая</span>
                            <input type="text" class="border w-[50px] outline-0" placeholder="от">
                            <input type="text" class="border w-[50px] outline-0" placeholder="до">
                        </div>
                    </div>
                    <div class="flex w-full justify-center">
                        <div class="w-[100px] flex items-center justify-end">
                            <span class="text-[14px]">Этаж</span>
                        </div>

                        <div class="flex ml-[30px] items-center">
                            <input type="text" class="border w-[50px] outline-0" placeholder="от">
                            <input type="text" class="border w-[50px] outline-0" placeholder="до">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-content-end w-full h-[75px] border-top">
                <div class="w-[350px] z-[100] px-[10px] flex items-center">
                    <button class="text-[14px] font-bold p-[5px] px-[15px] border-[black] mr-[5px] text-primary rounded-[6px]" style="background-color: #e8e9ec;">Сбросить фильтры</button>
                    <button class="text-[14px] font-bold p-[5px] px-[15px] border-[black] ml-[5px] text-[white] bg-primary  rounded-[6px]">Показать объекты</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const {showFIlterModal} = useSwitch()
function isHideModal(){
showFIlterModal.value = false
}
</script>
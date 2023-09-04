<template>
    
        <div class="h-[100vh]">
        <div class="flex flex-col min-h-[100%]" data-name="filters">
            <header class="bg-white items-center justify-between px-[16px] py-[12px] h-[54px] flex sticky top-0 shrink-0 z-[10] border-bottom">

                <div style="margin-right:8px;">
                    <span style="margin-left:-12px;">
                        <button @click="homeBack" class="bg-white-500 text-[#0468ff]">
                            <font-awesome-icon class="ml-[15px] font-light text-[25px] text-[gray]" :icon="['fasl', 'chevron-left']" />
                        </button>
                    </span>
                </div>
                <div class="self-center overflow-hidden ">
                    <span style="font-family: Lato,Arial,sans-serif;" class="
                    tracking-tight
                    overflow-hidden
                    truncate
                    font-bold
                    whitespace-nowrap
                    block
                    text-[16px]
                    text-[#152242]
                    leading-[24px]
                    ">Фильтры</span>
                </div>
                <div class="margin-right:8px; text-right">
                    <button @click="clearInput" style="border:none; background:none;" class="mr-[-12px]
                    cursor-pointer 
                    py-[2px]
                    px-[12px]
                    ">
                    <span style="font-family: Lato,Arial,sans-serif;" class="
                    font-[400]
                    leading-[24px]
                    text-[16px]
                    text-[#0468ff]
                    block
                    ">Очистить</span>
                    </button>
                </div>
            </header>
            <main style="flex:1 1;" class="flex-col py-[24px] px-[16px] flex mb-[100px] ">
                <div class="py-[10px] flex">
                        <div class="mr-[12px] flex items-center justify-start ml-[10px]">
                            <div class="rounded-[4px] flex items-center justify-center text-white bg-[#0468ff] p-[4px] w-[24px] h-[24px]">
                                <font-awesome-icon :icon="['fas', 'location-dot']" />
                            </div>
                        </div>
                        <div style="flex:1 1;" class="flex justify-between items-center">
                            <div>Душанбе</div>
                            <div class="self-center mr-[9px]">
                                <font-awesome-icon :icon="['fas', 'chevron-right']" />
                            </div>
                        </div>
                </div>
                <div class="px-[9px] mt-[16px]">
                    <div class="flex w-[230px] justify-between flex-nowrap ">
                            <input :checked='isCheck1=="buy"' data-route="buy" @change="check" name="btnradio" class="checked-1 hidden" type="radio"  id="inp1">
                        <label for="inp1" class="rounded-tl rounded-bl border px-[10px] py-[2px] rounded-[0] ">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Купить</span>
                        </label>
                            <input :checked='isCheck1=="take_off"' data-route="take_off" @change="check" name="btnradio" class="checked-2 hidden" type="radio"  id="inp2">
                        <label for="inp2" class=" border px-[10px] py-[2px] rounded-[0]">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Снять</span>
                        </label>
                            <input :checked='isCheck1=="daily"' data-route="daily" @change="check" name="btnradio" class="checked-3 hidden" type="radio"  id="inp3">
                        <label for="inp3" class="rounded-tr rounded-br border px-[10px] py-[2px] rounded-[0]">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Посуточно</span>
                        </label>
                    </div>
                </div>
                <div class="mt-[26px]">
                    <div class="px-[8px]">
                        <button 
                        class="
                        py-[3px] 
                        px-[12px]
                        h-[30px]
                        text-[14px]
                        leading-[20px]
                        flex
                        justify-between
                        items-center
                        border
                        rounded-[4px]
                        w-full
                        text-[#152242]
                        text-left
                        ">
                        Квартиру
                        <font-awesome-icon style="margin-right:5px;" class="font-bold text-[12px] text-primary" :icon="['fas', 'chevron-down']" />

                        </button>
                    </div>
                </div>
                <div class="px-[8px] mt-[26px]" v-if="isCheck1 == 'buy'">
                    <div class="flex w-[230px] justify-between flex-nowrap ">
                            <input  name="btnradio1" class="checked-4 hidden" type="radio"  id="inp4">
                        <label for="inp4" class="rounded-tl rounded-bl border px-[10px] py-[2px] rounded-[0] ">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Все</span>
                        </label>
                            <input  name="btnradio1" class="checked-5 hidden" type="radio"  id="inp5">
                        <label for="inp5" class=" border px-[10px] py-[2px] rounded-[0]">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Новостройка</span>
                        </label>
                            <input  name="btnradio1" class="checked-6 hidden" type="radio"  id="inp6">
                        <label for="inp6" class="rounded-tr rounded-br border px-[10px] py-[2px] rounded-[0]">
                            <span class="text-[15px]" style="font-family: Lato,Arial,sans-serif;">Вторичка</span>
                        </label>
                    </div>
                </div>

                    <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Количество комнать
                            </div>
                        </div>
                        <div class="mt-[10px]">
                            <div class="flex  mt-[4px] mb-[-4px] w-[50%]">
                                <label for="" class="flex">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span class="mr-[5px] py-[-4px] border bg-white
                                    rounded px-[15px] py-[2px]">1</span>
                                </label>
                                <label for="" class="flex">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span class="mr-[5px] py-[-4px] border bg-white
                                    rounded px-[15px] py-[2px]">2</span>
                                </label>
                                <label for="" class="flex">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span class="mr-[5px] py-[-4px] border bg-white
                                    rounded px-[15px] py-[2px]">3</span>
                                </label>
                                <label for="" class="flex">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span class="mr-[5px] py-[-4px] border bg-white
                                    rounded px-[15px] py-[2px]">4</span>
                                </label>
                                <label for="" class="flex">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span class="mr-[5px] py-[-4px] border bg-white
                                    rounded px-[15px] py-[2px]">5+</span>
                                </label>
                            </div>
                        </div>
                        
                    </div>


                    <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Цена
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="flex mt-[4px] mb-[-4px]">
                                <div class=" w-[100%] justify-between flex flex-nowrap ">
                                    <div class="flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                        <span class="w-[20px] h-[100%]">сн</span>
                                    </div>
                                    <div class="flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]"  placeholder="до" type="number">
                                        <span class="w-[20px] h-[100%]">cн</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Общая площадь
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="flex mt-[4px] mb-[-4px]">
                                <div class=" w-[100%] justify-between flex flex-nowrap">
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" :maxlength="5"  placeholder="до" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>



                    <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Площадь
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="flex flex-col mt-[4px]">
                                
                                    <p class="text-[13px]" style="font-family: Lato,Arial,sans-serif; margin-bottom:0;">Жилая</p>
                                <div class=" w-[100%] justify-between flex flex-nowrap">
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" :maxlength="5"  placeholder="до" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                </div>
                                <div class="mt-[15px]">
                                    <p class="text-[13px]" style="font-family: Lato,Arial,sans-serif; margin-bottom:0;">Кухня</p>
                                <div class="w-[100%] justify-between flex flex-nowrap">
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" :maxlength="5"  placeholder="до" type="number">
                                        <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Этаж
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="flex flex-col mt-[4px] mb-[-4px]">
                                <div class=" w-[100%] justify-between flex flex-nowrap">
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                        <!-- <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span> -->
                                    </div>
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" :maxlength="5"  placeholder="до" type="number">
                                        <!-- <span class="w-[20px] h-[100%]">м<sup class="text-[10px]">2</sup></span> -->
                                    </div>
                                </div>

                             <div class="mt-[5px]">
                                    <div class="flex max-sm:flex-wrap mt-[4px] mb-[-4px] w-[50%]">
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[1px]">Не первый</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[1px]">Не последний</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="radio" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[1px]">Только последний</span>
                                </label>
                                
                                </div>
                             </div> 
                            </div>
                        </div>
                        
                    </div>



                    <div class="mt-[40px] px-[8px]">
                    <div class="flex items-center">
                        <div style="font-family: Lato,Arial,sans-serif;" 
                        class="font-bold leading-[24px] text-[16px]
                        text-[#152242]
                        tracking-[normal]
                         ">
                         Балкон
                         </div>
                    </div>
                    <div class="mt-[10px]">
                        <div class="flex  mt-[4px] mb-[-4px] w-[50%]">
                            <label for="" class="flex">
                                <input class="hidden" type="radio" name="" id="">
                                <span class="mr-[5px] py-[-4px] border bg-white
                                 rounded-[4px] px-[13px] py-[1px]">есть</span>
                            </label>
                            <label for="" class="flex">
                                <input class="hidden" type="radio" name="" id="">
                                <span class="mr-[5px] py-[-4px] border bg-white
                                 rounded-[4px] px-[13px] py-[1px]">нет</span>
                            </label>
                            
                        </div>
                    </div>
                    
                </div>


                

                <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Год постройки
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="flex mt-[4px] mb-[-4px]">
                                <div class=" w-[100%] justify-between flex flex-nowrap">
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" placeholder="от" type="number">
                                    </div>
                                    <div class="outline-1 outline-black-500 flex border h-[30px] w-[49%] rounded-[4px] px-[8px] overflow-hidden">
                                        <input class="outline-0 w-[100%]" :maxlength="5"  placeholder="до" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>



                <div class="mt-[40px] px-[8px]">
                        <div class="flex items-center">
                            <div style="font-family: Lato,Arial,sans-serif;" 
                            class="font-bold leading-[24px] text-[16px]
                            text-[#152242]
                            tracking-[normal]
                            ">
                            Материл дома
                            </div>
                        </div>
                        <div class="mt-[10px] mb-[10px]">
                            <div class="mt-[5px]">
                             <div class="flex max-lg:flex-wrap max-md:flex-wrap max-sm:flex-wrap mt-[4px] mb-[-4px] w-[50%]">
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Кирпичный</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Монолитный</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Кирпично-монолитный</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Панельный</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Блочный</span>
                                </label>
                                <label for="" class="flex mr-[3px] mt-[3px]">
                                    <input class="hidden" type="checkbox" name="" id="">
                                    <span style="font-family: Lato,Arial,sans-serif;" class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] py-[-4px] border-2 bg-white
                                    rounded-[4px] px-[10px] py-[2px]">Деревянный</span>
                                </label>
                                
                                </div>
                             </div> 
                        </div>
                        
                    </div>
            </main>
            <footer class="
            flex 
            fixed
            z-[10]
            py-[12px]
            px-[16px]
            bg-white
            w-full
            h-[54px]
            items-center
            border-top
            bottom-0
            ">
            <div>
                <button class=" py-[6px] px-[12px] rounded items-center bg-[rgba(4,104,255,.1)] flex flex-nowrap">
                    <span>
                        <font-awesome-icon style="margin-right:5px;" class="font-bold text-primary" :icon="['far', 'map']" />
                    </span>
                    <span style="font-family: Lato,Arial,sans-serif;" class=
                    "text-[rgb(13,110,253)]
                    overflow-hidden
                    text-ellipsis
                    font-bold
                    whitespace-nowrap
                    ">На карте</span>
                </button>
            </div>
            <div class="ml-[8px] w-full">
                <button class="bg-[#0468ff] text-white px-[5px] w-[100%] py-[6px] rounded">
                    <span style="font-family: Lato,Arial,sans-serif;" 
                    class="
                    text-[16px]
                    leading-[22px]
                    font-[700]">115 127 объявлений</span>
                </button>
            </div>
            </footer>
        </div>
    </div>
</template>
<style scoped>
input:checked + label {
    border: 1px solid black !important;
    background-color: rgba(21, 34, 66, .1);
}

input{
    color: green !important;
}

.flex > input:checked + span{
    border: 3px solid black !important;
    background-color: rgba(21, 34, 66, .1);

}
</style>
<script setup>
import { faL } from "@fortawesome/free-solid-svg-icons";

const {isShow,showNavBar} = useSwitch()
const router = useRouter()
const route = useRoute()
function homeBack(){
router.push('/')
showNavBar.value = isShow.value = true;
}


function check(event){
    const radio = document.querySelectorAll('.hidden');
    const className = ref(event.target.className)
    radio.forEach( r => {
        router.push(`${event.target.dataset.route}`)    
    })
}
const isCheck1 = ref('')
onMounted(()=>{
    if (navigator.maxTouchPoints < 1) {
        router.push('/')
    }
    const radio = document.querySelectorAll('.hidden');
    radio.forEach(item=>{
        if (route.fullPath == `/filters/${item.dataset.route}`) {
            isCheck1.value = item.dataset.route
        }
    })

    showNavBar.value = false
})

function clearInput(){
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => input.value = '')
}
</script>



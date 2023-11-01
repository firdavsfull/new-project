<template>
    <div class="flex" style="flex:1 1 auto;">
        <div class="flex relative  flex-col min-w-[1135px] min-h-[160px]" style="margin: 0 auto; flex:1 1;">
            <!-- <div class="relative z-9">
                <div class="z-1 relative bg-[white]">
                    <div class="bg-[white]" style="border-bottom:1px solid #e8e9ec;">
                        <div class="py-[20px] px-[16px] min-w-[704px] max-w-[1376px]" style="margin:0 auto;">
                            <div class="flex-col-reverse flex">
                                <div class="flex m-0">
                                    div*
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="box-border py-[0] px-[20px] w-full max-w-[1376px]" style="margin: 0 auto 40px;">
                <div class="box-border">
                    <article v-for="(item,i) of data" :key="item.id" class="relative my-[15px] rounded mx-[0px]" style="box-shadow: 0 0 9px rgb(134, 134, 134);">
                        <div class="flex transition-all cursor-pointer rounded-[0] min-w-[315px] min-h-[301px]" style="padding:15px 15px;">
                            <NuxtLink class="w-[375px] flex relative bg-[black]/10" style="flex-flow:column nowrap; flex-shrink:0;">
                                <div :id="`carouselExampleIndicators-${i}`" class="carousel slide" data-bs-ride="carousel" style="overflow: hidden; height: 100%;">
                                    <div class="carousel-indicators">
                                        <button v-for="(elem, index) in data[i].image" :key="`indicator-${i}-${index}`"  
                                            type="button" :data-bs-target="`#carouselExampleIndicators-${i}`" 
                                            :data-bs-slide-to="index" :class="{ 'active': index === 0 }"
                                            :aria-current="index === 0 ? 'true' : false"
                                            :aria-label="`Slide 0`">
                                        </button> 
                                    </div> 
                                    <div class="carousel-inner h-100">
                                    <div v-for="(elem, index) in data[i].image" :key="`slide-${i}-${index}`"
                                    style="height: 100%; width: 100%;" 
                                        :class="{ 'carousel-item': true, 'active': index === 0 }">
                                        <img :src="`http://192.168.0.116:8000/api/image/small/${elem.pictures}`" class="d-block w-100 h-100">
                                    </div> 
                                    </div> 
                                    <button class="carousel-control-prev" type="button" :data-bs-target="`#carouselExampleIndicators-${i}`" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                                    <span class="sr-only">Previous</span>
                                    </button> 
                                    <button class="carousel-control-next" type="button" :data-bs-target="`#carouselExampleIndicators-${i}`" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                                    <span class="sr-only">Next</span> 
                                    </button>
                                </div>
                            </NuxtLink>
                            <div class="flex " style="flex-grow:1;">
                                <div class="flex flex-none ml-[20px] max-h-[100%]" style="text-decoration:none; flex-grow:1;">
                                    <div >
                                        <span class="block font-bold leading-[28px] text-[22px] tracking-normal m-0 p-0 text-[#0468ff]">
                                            <span class="font-bold leading-[28px] text-[22px] tracking-normal">
                                                {{item.title}}.
                                            </span>
                                        </span>
                                        <div class="mt-[4xp]">
                                            <span class="block font-bold leading-[28px] text-[16px] tracking-normal m-0 p-0">
                                                <!-- {{`${`${item.quantity_room} -комн.`? `${item.quantity_room}-комн.`:`${item.quantity_bedrooms}`}`}} -->
                                                 {{`${item.quantity_room !== null ? item.quantity_room+'-комн.': item.type_real_estate == "Жилая"?item.quantity_bedrooms+'-мест':item.numberSeats+'-мест'}`}}
                                                 {{item.total_area !== null? item.total_area : item.house_area}} <span>М<sup>2</sup></span>,
                                                {{`${item.floor?item.floor+'/':''}`}}{{`${item.floor_in_house}`}} этаж
                                            </span>
                                        </div>
                                        <div class="mt-[16px] ">
                                            <div class="text-[#737a8e]">
                                                <a class="relative z-1 text-[#737a8e]" style="text-decoration:none;">
                                                    {{item.city}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-[16px]">
                                            <span class="block font-bold leading-[28px] text-[22px] tracking-normal text-[#152242]">
                                                {{item.price}} cомон
                                            </span>
                                        </div>
                                        <div class="mt-[16px] max-w-[66vw] flex flex-col min-h-[0] justify-start" style="flex-grow:1;">
                                            <div class="max-h-[100%] block overflow-hidden text-ellipsis">
                                                <p class="block font-normal leading-[20px] text-[14px] tracking-normal text-[#152242]">
                                                    {{item.description}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
const data = ref([])
const images = ref([])
const {responce} = getData()
const filteredData = JSON.parse(sessionStorage.getItem('filter')) 

onMounted(async () =>{
    await fetch('http://192.168.0.116:8000/api/get_announs',{
        method:'post',
        headers:{
            "Content-Type":'application/json'
        },
        body:JSON.stringify(filteredData)
    })
    .then(res=>res.json())
    .then(res=>{
        data.value = data.value.filter(item=>item.type_real_estate == 'Жилая');
        for (let i = 0; i < res[0].length; i++) {
            if (res[1][i].length > 0) {
                res[0][i]['image'] = res[1][i] 
            }
        }
        data.value = res[0];
        console.log(data.value);
    })

    console.log(filteredData);
    // await fetch('http://192.168.0.114:8000/api/',{
    //     method:'post',
    //     headers:{
    //         "Content-Type":'application/json'
    //     },
    //     body
    // })
})
</script>

<template>
        <div class="flex flex-col w-[100vw] h-[max-contetnt]">
            
            <div class="h-[50px] flex md:flex responce" style="border-bottom:1px solid silver">
                <div class="h-full flex items-center justify-center w-[100%] mx-[2px]">
                    <div>
                        <font-awesome-icon class="text-primary mr-[2px]" :icon="['fas', 'filter']" />
                    </div>
                    <button @click="filters" >
                        <span class="font-bold text-[14px] text-primary">Фильтры</span>
                    </button>
                </div>
                <div class="h-full w-[100%] flex items-center justify-center mx-[2px]" style="border-right:1px solid silver;border-left:1px solid silver;">
                    <div>
                        <font-awesome-icon class="text-primary mr-[2px]" :icon="['fas', 'save']" />
                    </div>
                    <button>
                        <span class="font-bold text-[14px] text-primary">Сохранить</span>
                    </button>
                </div>
                <div class="h-full w-[100%] flex items-center justify-center mx-[2px]" style="">
                    <div>
                        <font-awesome-icon class="text-primary mr-[2px]" :icon="['fas', 'location-dot']" />
                    </div>
                    <button>
                        <span class="font-bold text-[14px] text-primary">На карте</span>
                    </button>
                </div>
            </div>
            <div v-if="announLoader" class="w-full flex justify-center">
                <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
            <div  class="box-border py-[0]">
                <div class="flex flex-col w-full px-[20px]">
                    <article v-for="(item,i) of data"  :key="item.id" class="relative my-[10px] w-full h-[max-content] rounded mx-[0px]" style="box-shadow: 0 0 9px rgb(134, 134, 134);">
                        <div class="flex  lg:flex-row md:flex-row md:px-[10px] w-full flex-col  transition-all cursor-pointer rounded-[0] " style="padding:15px 15px;">
                            <NuxtLink class="flex relative bg-[black]/10 h-[300px]">
                                <div :id="`carouselExampleIndicators-${i}`" class="carousel slide" data-bs-ride="carousel" style="overflow: hidden; height: 100%;">
                                    <div class="carousel-indicators">
                                        <button v-for="(elem, index) in data[i].image" :key="`indicator-${i}-${index}`"  
                                            type="button" :data-bs-target="`#carouselExampleIndicators-${i}`" 
                                            :data-bs-slide-to="index" :class="{ 'active': index === 0 }"
                                            :aria-current="index === 0 ? 'true' : false"
                                            :aria-label="`Slide 0`">
                                        </button> 
                                    </div> 
                                    <div class="h-full md:w-[350px]">
                                        <div v-for="(elem, index) in data[i].image" :key="`slide-${i}-${index}`"
                                        style="height: 100%;" 
                                            :class="{ 'carousel-item': true, 'active': index === 0 }">
                                            <img :src="`http://192.168.100.45:8000/api/image/large/${elem.pictures}`" class="h-full" style="object-fit: cover;">
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

                            <div class="flex lg:w-[100%] lg:justify-between flex-wrap sm:flex-col md:flex-row lg:flex-row">

                                <div class="lg:mx-[10px] truncate lg:ml-[15px] w-[max-content] inline sm:w-full lg:w-[max-content]">
                                    <span class="font-bold  leading-[28px] text-[22px]  tracking-normal text-[#0468ff]">
                                            {{item.title}}.
                                        <!-- <span class="font-bold leading-[28px]  w-[100px] text-[22px]">
                                        </span> -->
                                    </span>
                                    <div class="mt-[4xp]">
                                        <span class="block font-bold leading-[28px] text-[16px] tracking-normal m-0 p-0">
                                             {{`${item.quantity_room !== null ? item.quantity_room+'-комн.': item.type_real_estate == "Жилая"?item.quantity_bedrooms+'-мест':item.numberSeats+'-мест'}`}}
                                             {{item.total_area !== null? item.total_area : item.house_area}} <span>М<sup>2</sup></span>,
                                            {{`${item.floor?item.floor+'/':''}`}}{{`${item.floor_in_house}`}} этаж
                                        </span>
                                    </div>
                                    <div class="mt-[16px] ">
                                        <div class="text-[#737a8e] flex">
                                            <div class="text-[13px] text-[#0468ff] mt-[1px] mr-[5px]">
                                                <font-awesome-icon :icon="['fas', 'location-dot']" />
                                            </div>
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
                                    <div class="mt-[16px]">
                                        <div  class="h-[max-content] bg-[green]">
                                            <p class="block font-normal bg-[yellow] max-w-[80%] h-[max-content] leading-[20px] text-[14px] tracking-normal text-[#152242]" style="white-space: wrap;">
                                                {{item.description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
    
                                        
    
                                <div class="w-[200px] regular-w bg-[silver] h-[max-content] md:d-none mr-[0] h-[100px]" >
                                    <div class="flex flex-col items-center mt-[10px] relative">
                                        <div class="overflow-hidden flex justify-center items-center w-[80px] avatar_image rounded-[5%] h-[80px] bg-[red]">
                                            <img style="object-fit: cover;" class="w-full h-full bg-[lime]" :src="`http://192.168.100.45:8000/api/avatar/${item.owner.avatar}`" :alt="item.owner.name">
                                        </div>
                                        <div class="mt-[10px] avatar_image">
                                            <h5 class="text-[17px]">{{ item.owner.name?item.owner.name:item.owner.email }} {{ item.owner.last_name }}</h5>
                                        </div>
                                        <div class="w-[90%] flex flex-col items-center justify-around p-[15px]">
                                            <a type="tel" class="
                                            w-full text-[14px]
                                            py-[2px]
                                            flex
                                            flex-row
                                            rounded-[3px]
                                            bg-primary
                                            justify-center
                                            items-center
                                            text-[white]
                                            my-[5px]
                                            h-[30px]
                                            overflow-hidden
                                            "
                                            style="letter-spacing: 2px;text-decoration: none; text-overflow: ellipsis; white-space: nowrap;"
                                            ><span class="mx-[10px] overflow-hidden" style="text-overflow: ellipsis; white-space: nowrap;">+992 {{ item.owner.phone_number }}</span></a>
                                            <a type="tel" class="
                                            w-full 
                                            mx-[10px] text-[14px]
                                            justify-center
                                            items-center
                                            flex
                                            h-[30px]
                                            bg-light
                                            py-[2px]
                                            rounded-[3px]
                                            border-0 
                                            text-primary
                                            my-[5px]
                                            "
                                            style="letter-spacing: 2px; text-decoration: none;"
                                            >
                                            <span class="mx-[25%]">Написать</span>
                                            </a>
                                        </div>
    
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
</template>
<script setup>
const data = ref([])
const images = ref([])
const route = useRoute()
const {responce,showAnnouns} = getData()
const {showNavBar} = useSwitch()
const announLoader = ref(false)
const filteredData = JSON.parse(sessionStorage.getItem('filter')) 

function showAnnoun(item){
    navigateTo('/show_announ')
    showAnnouns.value[0] = item
}

function filters(){
    navigateTo('/filters/buy')
    if (route.fullPath == '/filters/buy') {
        showNavBar.value = false
    }
}

onMounted(async () =>{
    showNavBar.value = true
    announLoader.value = true
    await fetch('http://192.168.100.45:8000/api/get_announs',{
        method:'post',
        headers:{
            "Content-Type":'application/json'
        },
        body:JSON.stringify(filteredData)
    })
    .then(res=>res.json())
    .then(res=>{
      let uniqueSet = new Set(res.map(JSON.stringify));
      res = Array.from(uniqueSet).map(JSON.parse)
        for (let i = 0; i < res[0].length; i++) {
            if (res[1][i].length > 0) {
                res[0][i]['image'] = res[1][i] 
            }
        }
        data.value = res[0];
    })
    announLoader.value =false
    let ownerWithAd = []
    for (let i = 0; i < data.value.length; i++) {
        ownerWithAd.push(data.value[i].owner_id);
        
    }
    await fetch('http://192.168.100.45:8000/api/get_user_with_announ',{
        method:'post',
        headers:{
            "Content-Type":'application/json'
        },
        body:JSON.stringify({owner_id:ownerWithAd})
    })
    .then(res=>res.json())
    .then(res=>{
        ownerWithAd = res[1]
        // announWithUser = res[0]
    })

    for (let i = 0; i < data.value.length; i++) {
        for (let j = 0; j < ownerWithAd.length; j++) { 
            if (data.value[i].owner_id == ownerWithAd[j].id) {
                data.value[i].owner = ownerWithAd[j]
            }
        }

    }

    console.log(data.value);

})
</script>

<style scoped>
@media screen and (min-width: 768px) {
    .responce{
        display: none;
    }
    
}

@media screen and (max-width: 640px) {
    .regular-w{
        width: 100%;
        background: white;
        align-items: center;
    }
}

@media screen and (max-width: 1024px) {
    /* .h-full{
        width: 100%;
    } */

    .avatar_image{
        display: none;
        width: 100%;
    }
    
    .flex .flex-col .items-center{
        margin-top: 0;
    }
    .regular-w{
        display: none;
    }
}

.lds-spinner {
  color: official;
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-spinner div {
  transform-origin: 40px 40px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
  content: " ";
  display: block;
  position: absolute;
  top: 3px;
  left: 37px;
  width: 6px;
  height: 18px;
  border-radius: 20%;
  background: #000;
}
.lds-spinner div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -1.1s;
}
.lds-spinner div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -1s;
}
.lds-spinner div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.9s;
}
.lds-spinner div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.8s;
}
.lds-spinner div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.7s;
}
.lds-spinner div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.6s;
}
.lds-spinner div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.4s;
}
.lds-spinner div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.3s;
}
.lds-spinner div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.2s;
}
.lds-spinner div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.1s;
}
.lds-spinner div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
}
@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

</style>

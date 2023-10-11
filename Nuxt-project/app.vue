<template>
  <div > 
        <NuxtLayouts >
          <NavBar v-if="showNavBar" />
        </NuxtLayouts>
        <NuxtPage />
        <Register v-if="showMadoal" />
        <MobilePage v-if="isShow && mobileOrDesktop" :pictures="pictures"/>
        <DesktopPage v-if="isShow && mobileOrDesktop < 1" />
  </div>
</template>
<script setup>
useHead({
  script:"https://api-maps.yandex.ru/2.1/?b63b3552-b483-4295-973e-47f4cb92f091&lang=ru_RU"
})
  const {isShow, toggleShow, showMadoal,showNavBar} = useSwitch()
  const route = useRoute()
  const mobileOrDesktop = ref()
  const pictures = ref([]); 
  
  onMounted(async ()=>{
    mobileOrDesktop.value = navigator.maxTouchPoints
    if (route.fullPath !== '/') {
      isShow.value = false
    }else{
      isShow.value = true
    }

    if (navigator.maxTouchPoints < 1 && route.fullPath == '/announ') {
      // isShow.value = true
    }
  const announId = ref([])
  const {announ} = getData()
  fetch('http://192.168.100.45:8000/api/get_data')
  .then(res=>res.json())
  .then(res=>{
    for (const item of res) {
      announId.value.push(item.id);
    }
  //  fetch('http://192.168.100.45:8000/api/get_picture',{
  //   method:'post',
  //   headers:{
  //     "Content-Type":'application/json'
  //   },
  //   body:JSON.stringify(announId.value)
  // })
  // .then(res=> res.json())
  // .then(res=>{
  //   announ.value = res
  //   console.log(res);
  // })
  })

  const infrastructure = ["автомойка",
   "автосервис",
   "аптека",
   "ателье-одежды",
   "банкомат",
   "бассейн",
   "автомойка",
   "буфет",
   "выставочно-складской комплекс",
   "гостиница",
   "кафе",
   "кинотеатр",
   "конференц-зал",
   "медицинский-центр",
   "минимаркет",
   "нотариальная контора",
   "отделение банка",
   "парк",
   "ресторан",
   "салон красоты",
   "складские помещения",
   "столовой",
   "супермаркет",
   "торговая зона",
   "фитнес-центр",
   "фотосалон",
   "центральная рецепция",
   ];
   const cityData = [
    "Душанбе",
    "Худжанд",
    "Абдурахмони Джоми",
    "Айни",
    "Ашт",
    "Бальджувон",
    "Бободжон Гафуров",
    "Бохтар (Курган-Тюбе)",
    "Бустон (Чкаловск)",
    "Вандж",
    "Варзоб",
    "Вахдат",
    "Вахш",
    "Восе",
    "Гиссар",
    "Горная Матча",
    "Гулистон",
    "Дангара",
    "Дарваз",
    "Деваштич (Ганчи)",
    "Джаббор Расулов",
    "Джайхун (Кумсангир)",
    "Джалолиддини Балхи (Руми)",
    "Джами",
    "Дусти",
    "Зафарабад",
    "Истаравшан",
    "Исфара",
    "Ишкашим",
    "Кубодиён",
    "Канибадам",
    "Куляб",
    "Кушониён",
    
   ]
    
        await fetch('http://192.168.100.45:8000/api/create/infrastructure',{
         method:'post',
         headers:{
           "Content-type":"application/json"
         },
         body: JSON.stringify(infrastructure)
        })
        
        await fetch('http://192.168.100.45:8000/api/create/city', {
         method:'post',
         headers:{
           "Content-type": "application/json"
         },
         body: JSON.stringify(cityData)
        })
  })
</script>
<style>


* {
  font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', 'Arial, sans-serif';

}
body{
  overflow-x: hidden;
}
@media screen and (max-width:320px) {
  * {
    font-size:17px;
  }
}
</style>


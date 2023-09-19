<template>
  <div > 
        <NuxtLayouts >
          <NavBar v-if="showNavBar" />
        </NuxtLayouts>
        <NuxtPage />
        <Register v-if="showMadoal" />
        <MobilePage v-if="isShow && mobileOrDesktop  "/>
        <DesktopPage v-if="isShow && mobileOrDesktop < 1" />
    
  </div>
</template>
<script setup>
  const {isShow, toggleShow, showMadoal,showNavBar} = useSwitch()
  const route = useRoute()
  const mobileOrDesktop = ref() 
  onMounted(async ()=>{
    mobileOrDesktop.value = navigator.maxTouchPoints
    if (route.fullPath !== '/') {
      isShow.value = false
    }else{
      isShow.value = true
    }

    if (navigator.maxTouchPoints < 1 && route.fullPath == '/announ') {
      navigateTo('/')
      isShow.value = true
    }
  
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
    
        await fetch('http://192.168.0.114:8000/api/create/infrastructure',{
         method:'post',
         headers:{
           "Content-type":"application/json"
         },
         body: JSON.stringify(infrastructure)
        })
        
        await fetch('http://192.168.0.114:8000/api/create/city', {
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


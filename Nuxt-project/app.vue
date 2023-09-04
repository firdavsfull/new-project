<template>
  <div > 
        <NuxtLayouts >
          <NavBar v-if="showNavBar" />
        </NuxtLayouts>
        <NuxtPage key="5"/>
        <Register v-if="showMadoal" />
        <MobilePage :key="1" v-if="isShow && mobileOrDesktop  "/>
        <DesktopPage :key="2" v-if="isShow && mobileOrDesktop < 1" />
    
  </div>
</template>
<script setup>
  const {isShow, toggleShow, showMadoal,showNavBar} = useSwitch()
  const route = useRoute()
  const mobileOrDesktop = ref() 
  onMounted(()=>{
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


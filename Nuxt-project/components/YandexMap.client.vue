<template>
  <div id="map-yandex" class="flex min-h-[100vh] bg-[limegreen]/10">
    <div class="w-[50%] h-[50%]"></div>
  </div>
</template>

<script setup>
const { showNavBar } = useSwitch();

showNavBar.value = true;

ymaps.ready(init);
        function init(){
            var myMap = new ymaps.Map("map-yandex", {
                center: [55.76, 37.64],
                zoom: 7
            });
         }
</script>




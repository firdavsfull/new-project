<template>
  <div class="flex justify-center min-h-[100vh] ">
    <div id="map-yandex" class="mt-[10px] w-[70%] h-[500px]" style="box-shadow:0 0 6px silver"></div>
  </div>
</template>

<script setup>
const { showNavBar } = useSwitch();

showNavBar.value = true;

        ymaps.ready(init);
        function init(){
            let myMap = new ymaps.Map("map-yandex", {
                center: [38.576271, 68.779716],
                zoom: 13
            });
            console.log(myMap);
         }
</script>




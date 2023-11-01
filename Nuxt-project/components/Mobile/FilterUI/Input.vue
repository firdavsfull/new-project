<template>
    <div class="mt-[40px] px-[8px]">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
             {{ title }}
            </div>
          </div>
          <div class="mt-[10px] mb-[10px]">
            <div class="flex mt-[4px] mb-[-4px]">
              <div class="w-[100%] justify-between flex flex-nowrap">
                <div
                  class="flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                >
                  <input
                    @input="writeFloor"
                    v-model="parse.from"
                    class="outline-0 w-[100%] h-full"
                    :placeholder="placeholder1"
                    type="number"
                  />
                  <component :is="tag" class="w-[20px] mt-[5px] h-[100%]">{{ innerText }}<component :is="sup" class="text-[10px]">{{ textSup }}</component>
                  </component>
                </div>
                <div
                  class="flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                  
                  >
                  <input
                    @input="writeFloor"
                    v-model="price.to"
                    class="outline-0 w-[100%]"
                    :placeholder="placeholder2"
                    type="number"
                  />
                  <component :is="tag" class="w-[20px] mt-[5px] h-[100%]">{{ innerText }}<component :is="sup" class="text-[10px]">{{ textSup }}</component>
                  </component>
                </div>
              </div>
            </div>
          </div>
        </div>
</template>
<script setup>
const price = ref({
  from:'',
  to:''
})
const p = defineProps({
  title:{
    type:String,
    required:true
  },
  placeholder1:{
    type:String,
    required:true
  },
  
  placeholder2:{
    type:String,
    required:true
  },
  tag:{
    type:String,
    required:true
  },
  innerText:{
    type:String,
    required:true
  },
  sup:{
    type:String,
    required:true
  },
  textSup:{
    type:String,
    required:true
  },
  priceFrom:{
    type:Number,
    required:true
  },
  priceTo:{
    type:Number,
    required:true
  }

})


async function writeFloor(ps) {
  // setTimeout(async () => {
  //   filter.value = JSON.parse(sessionStorage.getItem("filter")) || [];
  //   filter.value.priceFrom = route.query.priceFrom = price.value.from;
  //   filter.value.priceTo = route.query.priceTo = price.value.to;
  //   filter.value.totalAreaFrom = route.query.totalAreaFrom =
  //     totalArea.value.from;
  //   filter.value.totalAreaTo = route.query.totalAreaTo = totalArea.value.to;
  //   filter.value.areaFrom = route.query.areaFrom = area.value.from;
  //   filter.value.areaTo = route.query.areaTo = area.value.to;
  //   filter.value.kitchenAreaFrom = route.query.kitchenAreaFrom =
  //     kitchenArea.value.from;
  //   filter.value.kitchenAreaTo = route.query.kitchenAreaTo =
  //     kitchenArea.value.to;
  //   filter.value.floorFrom = route.query.floorFrom = floor.value.from;
  //   filter.value.yaerFrom = route.query.yaerFrom = year.value.from;
  //   filter.value.yaerTo = route.query.yearTo = year.value.to;
  //   sessionStorage.setItem("filter", JSON.stringify(filter.value));
  //   console.log(price.from);
  //   loader.value = true;
  //   await fetch("http://192.168.0.116:8000/api/filter", {
  //     method: "post",
  //     headers: {
  //       "Content-type": "application/json",
  //     },
  //     body: JSON.stringify(route.query),
  //   })
  //     .then((res) => res.json())
  //     .then((res) => {
  //       data.value = res;
  //       console.log(res);
  //     });
  //   loader.value = false;
  // }, 1000);

  const emit = defineEmits(['write'])
  console.log(emit('write',price.value.from));
}
</script>
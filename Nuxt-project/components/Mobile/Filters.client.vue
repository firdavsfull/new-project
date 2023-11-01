<template>
  <div class="h-[100vh]">
    <div class="flex flex-col min-h-[100%]" data-name="filters">
      <header
        class="bg-white items-center justify-between px-[16px] py-[12px] h-[54px] flex sticky top-0 shrink-0 z-[10] border-bottom"
      >
        <div style="margin-right: 8px">
          <span style="margin-left: -12px">
            <button @click="homeBack" class="bg-white-500 text-[#0468ff]">
              <font-awesome-icon
                class="ml-[15px] font-light text-[25px] text-[gray]"
                :icon="['fasl', 'chevron-left']"
              />
            </button>
          </span>
        </div>
        <div class="self-center overflow-hidden">
          <span
            style="font-family: Lato, Arial, sans-serif"
            class="tracking-tight overflow-hidden truncate font-bold whitespace-nowrap block text-[16px] text-[#152242] leading-[24px]"
            >Фильтры</span
          >
        </div>
        <div class="margin-right:8px; text-right">
          <button
            @click="clearInput"
            style="border: none; background: none"
            class="mr-[-12px] cursor-pointer py-[2px] px-[12px]"
          >
            <span
              style="font-family: Lato, Arial, sans-serif"
              class="font-[400] leading-[24px] text-[16px] text-[#0468ff] block"
              >Очистить</span
            >
          </button>
        </div>
      </header>
      <!-- <MobileCity v-if="showCity" /> -->
      <main
        style="flex: 1 1"
        class="flex-col py-[24px] px-[16px] flex mb-[100px]"
      >
        <!-- <div class="py-[10px] flex dropdown">
          <div class="mr-[12px] flex items-center justify-start ml-[10px]">
            <div
              class="rounded-[4px] flex items-center justify-center text-white bg-[#0468ff] p-[4px] w-[24px] h-[24px]"
            >
              <font-awesome-icon :icon="['fas', 'location-dot']" />
            </div>
          </div>
            <div style="flex: 1 1" class="flex justify-between items-center">
              <div>{{ city ? city : "Укажите город" }}</div>
                <div class="self-center mr-[9px]">
                  <font-awesome-icon :icon="['fas', 'chevron-right']" />
                </div>  
            </div>
        </div> -->
        <MobileFilterUICity :cities="cities" :filter="filter"  :updateLoader="updateLoader" :updateData="updateData"/>
        
        <div class="px-[9px] mt-[16px]">
          <div class="flex w-[230px] justify-between flex-nowrap">
            <input
              :checked="isCheck1 == 'buy'"
              data-route="buy"
              @change="check"
              name="btnradio"
              class="checked-1 hidden"
              type="radio"
              id="inp1"
            />
            <label
              for="inp1"
              data-name="Продажа"
              class="rounded-tl rounded-bl flex h-[40px] items-center border px-[10px] py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Купить</span
              >
            </label>
            <input
              :checked="isCheck1 == 'take_off'"
              data-route="take_off"
              @change="check"
              name="btnradio"
              class="checked-2 hidden"
              type="radio"
              id="inp2"
            />
            <label
              data-name="Аренда"
              for="inp2"
              class="border flex h-[40px] items-center px-[10px] py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Снять</span
              >
            </label>
            <input
              :checked="isCheck1 == 'daily'"
              data-route="daily"
              @change="check"
              name="btnradio"
              class="checked-3 hidden"
              type="radio"
              id="inp3"
            />
            <label
              for="inp3"
              data-name="Посуточно"
              class="rounded-tr rounded-br border px-[10px] h-[40px] flex items-center py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Посуточно</span
              >
            </label>
          </div>
        </div>

        <MobileFilterUITypeHome :filter="filter"  :updateLoader="updateLoader" :uploadQuantityRoom="uploadQuantityRoom" :updateData="updateData"/>
        
        <div class="px-[8px] mt-[26px]" v-if="isCheck1 == 'buy'">
          <div class="flex w-[230px] justify-between flex-nowrap">
            <input
              @click="select"
              name="btnradio1"
              class="checked-4 hidden"
              type="radio"
              id="inp4"
            />
            <label
              data-name="Все"
              for="inp4"
              class="rounded-tl rounded-bl border px-[10px] py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Все</span
              >
            </label>
            <input
              @click="select"
              name="btnradio1"
              class="checked-5 hidden"
              type="radio"
              id="inp5"
            />
            <label
              data-name="Новостройка"
              for="inp5"
              class="border px-[10px] py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Новостройка</span
              >
            </label>
            <input
              @click="select"
              name="btnradio1"
              class="checked-6 hidden"
              type="radio"
              id="inp6"
            />
            <label
              data-name="Вторичка"
              for="inp6"
              class="rounded-tr rounded-br border px-[10px] py-[2px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Вторичка</span
              >
            </label>
          </div>
        </div>

        <div class="mt-[40px] px-[8px]" v-if="showQuantityRoom">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Количество комнать
            </div>
          </div>
          <div class="mt-[10px]">
            <div class="flex mt-[4px] mb-[-4px] w-[50%]">
              <label for="input1" class="flex">
                <input
                  @click="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="input1"
                />
                <span class="mr-[5px] border py-[7px] rounded-[4px] px-[16px]"
                  >1</span
                >
              </label>
              <label for="input2" class="flex">
                <input
                  @click="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="input2"
                />
                <span class="mr-[5px] border py-[7px] rounded-[4px] px-[16px]"
                  >2</span
                >
              </label>
              <label for="input3" class="flex">
                <input
                  @click="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="input3"
                />
                <span class="mr-[5px] border py-[7px] rounded-[4px] px-[16px]"
                  >3</span
                >
              </label>
              <label for="input4" class="flex">
                <input
                  @change="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="input4"
                />
                <span class="mr-[5px] border py-[7px] rounded-[4px] px-[16px]"
                  >4</span
                >
              </label>
              <label for="5" class="flex">
                <input
                  @change="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="5"
                />
                <span class="mr-[5px] border px-[16px] py-[7px] rounded-[4px]"
                  >5</span
                >
              </label>
            </div>
          </div>
        </div>

        <MobileFilterUIInput 
         :tag="`span`" :innerText="`с`"
         :sup="``" :textSup="``" 
         title="Ценна"
         placeholder1="от"
         placeholder2="до"
         @write="sendWrite"
         />

        <MobileFilterUIInput :tag="`span`" :innerText="`м`" :sup="`sup`" :textSup="`2`" title="Общая площадь" placeholder1="от" placeholder2="до" :price-from="totalArea.from" :price-to="totalArea.to" />

        

        <div class="mt-[40px] px-[8px]">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Площадь
            </div>
          </div>
          <div class="mt-[10px] mb-[10px]">
            <div class="flex flex-col mt-[4px]">
              <p
                class="text-[13px]"
                style="font-family: Lato, Arial, sans-serif; margin-bottom: 0"
              >
                Жилая
              </p>
              <div class="w-[100%] justify-between flex flex-nowrap">
                <div
                  class="outline-1 outline-black-500 flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                >
                  <input
                    @input="writeFloor"
                    v-model="area.from"
                    class="outline-0 w-[100%]"
                    placeholder="от"
                    type="number"
                  />
                  <span class="w-[20px] mt-[5px] h-[100%]"
                    >м<sup class="text-[10px]">2</sup></span
                  >
                </div>
                <div
                  class="outline-1 outline-black-500 flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                >
                  <input
                    @input="writeFloor"
                    v-model="area.to"
                    class="outline-0 w-[100%]"
                    :maxlength="5"
                    placeholder="до"
                    type="number"
                  />
                  <span class="w-[20px] mt-[5px] h-[100%]"
                    >м<sup class="text-[10px]">2</sup></span
                  >
                </div>
              </div>
              <div class="mt-[15px]">
                <p
                  class="text-[13px]"
                  style="font-family: Lato, Arial, sans-serif; margin-bottom: 0"
                >
                  Кухня
                </p>
                <div class="w-[100%] justify-between flex flex-nowrap">
                  <div
                    class="outline-1 outline-black-500 flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                  >
                    <input
                      @input="writeFloor"
                      v-model="kitchenArea.from"
                      class="outline-0 w-[100%]"
                      placeholder="от"
                      type="number"
                    />
                    <span class="w-[20px] mt-[5px] h-[100%]"
                      >м<sup class="text-[10px]">2</sup></span
                    >
                  </div>
                  <div
                    class="outline-1 outline-black-500 flex border h-[40px] w-[49%] rounded-[4px] px-[8px] overflow-hidden"
                  >
                    <input
                      @input="writeFloor"
                      v-model="kitchenArea.to"
                      class="outline-0 w-[100%]"
                      :maxlength="5"
                      placeholder="до"
                      type="number"
                    />
                    <span class="w-[20px] mt-[5px] h-[100%]"
                      >м<sup class="text-[10px]">2</sup></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <MobileFilterUIInput :tag="``" :innerText="``" :sup="``" :textSup="``" title="Этаж" placeholder1="от" placeholder2="до" :price-from="totalArea.from" :price-to="totalArea.to" />
        

        <div class="mt-[40px] px-[8px]">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Балкон
            </div>
          </div>
          <div class="mt-[10px]">
            <div class="flex mt-[4px] mb-[-4px] w-[50%]">
              <label for="balcon1" class="flex">
                <input class="hidden" type="radio" name="balcon" id="balcon1" />
                <span class="mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >есть</span
                >
              </label>
              <label for="balcon2" class="flex">
                <input class="hidden" type="radio" name="balcon" id="balcon2" />
                <span class="mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >нет</span
                >
              </label>
            </div>
          </div>
        </div>

        <MobileFilterUIInput :tag="``" :innerText="``" :sup="``" :textSup="``" title="Год постройки" placeholder1="от" placeholder2="до" :price-from="totalArea.from" :price-to="totalArea.to" />


        <div class="mt-[40px] px-[8px]">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Материл дома
            </div>
          </div>
          <div class="mt-[10px] mb-[10px]">
            <div class="mt-[5px]">
              <div
                class="flex max-lg:flex-wrap max-md:flex-wrap max-sm:flex-wrap mt-[4px] mb-[-4px] w-[50%]"
              >
                <label for="home1" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home1"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Кирпичный</span
                  >
                </label>
                <label for="home2" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home2"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Монолитный</span
                  >
                </label>
                <label for="home3" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home3"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Кирпично-монолитный</span
                  >
                </label>
                <label for="home4" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home4"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Панельный</span
                  >
                </label>
                <label for="home5" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home5"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Блочный</span
                  >
                </label>
                <label for="home6" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    id="home6"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >Деревянный</span
                  >
                </label>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer
        class="flex fixed z-[10] py-[12px] px-[16px] bg-white w-full h-[54px] items-center border-top bottom-0"
      >
        <div>
          <button
            class="py-[6px] px-[12px] h-[40px] rounded items-center bg-[rgba(4,104,255,.1)] flex flex-nowrap"
          >
            <span>
              <font-awesome-icon
                style="margin-right: 5px"
                class="font-bold text-primary"
                :icon="['far', 'map']"
              />
            </span>
            <span
              style="font-family: Lato, Arial, sans-serif"
              class="text-[rgb(13,110,253)] overflow-hidden text-ellipsis font-bold whitespace-nowrap"
              >На карте</span
            >
          </button>
        </div>
        <div class="ml-[8px] w-full">
          <button
            @click="navigateTo('/list')"
            class="bg-[#0468ff] text-white px-[5px] w-[100%] h-[40px] rounded"
          >
            <span
              style="font-family: Lato, Arial, sans-serif"
              class="text-[16px] flex justify-center items-center font-[700]"
            >
              <div v-if="loader" class="inline h-[100%]">
                <div
                  class="spinner-border"
                  role="status"
                  style="position: absolute; top: 22%; left: 59%"
                >
                  <span class="sr-only"></span>
                </div>
              </div>
              <div v-if="!loader">{{ data.length }} объявлений</div>
            </span>
          </button>
        </div>
      </footer>
    </div>
  </div>
</template>
<style scoped>
input:checked + label {
  border: 1px solid black !important;
  background-color: rgba(21, 34, 66, 0.1);
}

.flex input:checked + span {
  border: 1px solid black !important;
  background-color: rgba(21, 34, 66, 0.1);
}
</style>
<script setup>
const { isShow, showNavBar } = useSwitch();
const router = useRouter();
const route = useRoute();
const { showCity } = useSwitch();
const { city } = getData();
const loader = ref(false);
const data = ref([]);
const checks = ref(false);
let dealType;
const showQuantityRoom = ref(false)
function uploadQuantityRoom(value){
  showQuantityRoom.value = value
}

const price = ref({
  from: "",
  to: "",
});

const textObj = ref({
  price:'',
  placeholder1:'',
  placeholder2:''
})


const totalArea = ref({
  from: "",
  to: "",
});

const area = ref({
  from: "",
  to: "",
});
const kitchenArea = ref({
  from: "",
  to: "",
});
const floor = ref({
  from: "",
  to: "",
});

const year = ref({
  from: "",
  to: "",
});

function updateLoader(value){
  loader.value = value
}

function updateData(value){
  data.value = value
}

function homeBack() {
  router.push("/");

  showNavBar.value = isShow.value = true;
}

function select() {
  console.log(event.target.nextSibling.dataset.name.toLowerCase());
}

const filter = ref({});

async function check(event) {
  if (event.target.name == "btnradio") {
    dealType = event.target.nextSibling.dataset.name;
    // filter.value.city = route.query.city = JSON.parse(sessionStorage.getItem('city'))
    filter.value.dealType = route.query.dealType = dealType;
    sessionStorage.setItem("filter", JSON.stringify(filter.value));
  }
  
  // if (event.target.name == "check") {
  //   if (event.target.checked) {
  //     const text = event.target.previousSibling.textContent.trim();
  //     const select = document.querySelector(".select");
  //     select.textContent = text;

  //     filter.value.typeObject = route.query.typeObject = text;
  //     sessionStorage.setItem("filter", JSON.stringify(filter.value));
  //   }
  // }
  loader.value = true;
  await fetch("http://192.168.0.116:8000/api/filter", {
    method: "post",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(route.query),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
    });
  loader.value = false;
}

function sendWrite(p){
  console.log(emit('write'));
}

const el = document.querySelector(".select");
const lists = document.querySelectorAll(".dropdown-item > input");
const textEl = ref("");

lists.forEach((item) => {
  textEl.value = item.previousSibling.textContent.trim();
  if (textEl.value == saveText.value) {
    check.value = !check.value;
    el.textContent = saveText.value;
  }
});

const qtRoom = [];
async function selectQuanitityRoom(event) {
  const quantityRoom = ref(parseInt(event.target.nextSibling.textContent));
  if (event.target.checked) {
    qtRoom.push(quantityRoom.value);
  }
  if (!event.target.checked) {
    const unCheckedValue = parseInt(event.target.nextSibling.textContent);
    const ind = qtRoom.indexOf(unCheckedValue);
    qtRoom.splice(ind, 1);
  }
  filter.value.quantityRoom = route.query.quantityRoom = qtRoom;
  sessionStorage.setItem("filter", JSON.stringify(filter.value));
  loader.value = true;
  await fetch("http://192.168.0.116:8000/api/filter", {
    method: "post",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(route.query),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
    });
  loader.value = false;
}

// async function writeFloor(ps) {
//   setTimeout(async () => {
//     filter.value = JSON.parse(sessionStorage.getItem("filter")) || [];
//     filter.value.priceFrom = route.query.priceFrom = price.value.from;
//     filter.value.priceTo = route.query.priceTo = price.value.to;
//     filter.value.totalAreaFrom = route.query.totalAreaFrom =
//       totalArea.value.from;
//     filter.value.totalAreaTo = route.query.totalAreaTo = totalArea.value.to;
//     filter.value.areaFrom = route.query.areaFrom = area.value.from;
//     filter.value.areaTo = route.query.areaTo = area.value.to;
//     filter.value.kitchenAreaFrom = route.query.kitchenAreaFrom =
//       kitchenArea.value.from;
//     filter.value.kitchenAreaTo = route.query.kitchenAreaTo =
//       kitchenArea.value.to;
//     filter.value.floorFrom = route.query.floorFrom = floor.value.from;
//     filter.value.yaerFrom = route.query.yaerFrom = year.value.from;
//     filter.value.yaerTo = route.query.yearTo = year.value.to;
//     sessionStorage.setItem("filter", JSON.stringify(filter.value));
//     console.log(price.from);
//     loader.value = true;
//     await fetch("http://192.168.0.116:8000/api/filter", {
//       method: "post",
//       headers: {
//         "Content-type": "application/json",
//       },
//       body: JSON.stringify(route.query),
//     })
//       .then((res) => res.json())
//       .then((res) => {
//         data.value = res;
//         console.log(res);
//       });
//     loader.value = false;
//   }, 1000);
// }

const isCheck1 = ref("");
const cities = ref();

onMounted(async () => {
  
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
  if (navigator.maxTouchPoints < 1) {
    router.push("/");
  }
  const radio = document.querySelectorAll(".hidden");
  radio.forEach((item) => {
    if (route.fullPath == `/filters/${item.dataset.route}`) {
      isCheck1.value = item.dataset.route;
    }
  });
  const filters = JSON.parse(sessionStorage.getItem("filter"));
  showNavBar.value = false;
  loader.value = true;
  await fetch("http://192.168.0.116:8000/api/filter", {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(filters),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
    });
  loader.value = false;
  // const el = document.querySelector('.select')
  // const lists = document.querySelectorAll('.dropdown-item > input')
  // lists.forEach(item=>{
  //     textEl.value =
  //     item.previousSibling.textContent.trim()
  //     if (textEl.value == saveText.value) {
  //       item.checked = true
  //       el.textContent = saveText.value
  //     }
  // })

  const cityUrl = fetch(`http://192.168.0.116:8000/api/city`);
  const c = await cityUrl;
  cities.value = await c.json();
});

function clearInput() {
  const inputs = document.querySelectorAll("input");
  inputs.forEach((input) => (input.value = ""));
}
</script>



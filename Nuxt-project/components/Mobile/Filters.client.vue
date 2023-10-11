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
              :checked="filters.dealType == 'Продажа'"
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
              :checked="filters.dealType == 'Аренда'"
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

        <div v-if="filters.dealType === 'Продажа'" class="px-[8px] mt-[26px]">
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
              class="rounded-tl rounded-bl border px-[10px] py-[7px] rounded-[0]"
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
              class="border px-[10px] py-[7px] rounded-[0]"
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
              class="rounded-tr rounded-br border px-[10px] py-[7px] rounded-[0]"
            >
              <span
                class="text-[15px]"
                style="font-family: Lato, Arial, sans-serif"
                >Вторичка</span
              >
            </label>
          </div>
        </div>

        <MobileFilterUITypeHome :updateFilters="sessionFilter" :filter="filter"  :updateLoader="updateLoader" :uploadQuantityRoom="uploadQuantityRoom" :updateData="updateData"/>
        
        <div class="mt-[40px] px-[8px]" v-if="filter.dealType ==  'Аренда' || filters.dealType ==  'Аренда'">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Срок аренды
            </div>
          </div>
          <div class="mt-[10px]">
            <div class="flex mt-[4px] mb-[-4px] w-[50%]">
              <label for="balcon1" class="flex">
                <input @change="check" class="hidden" type="radio" name="balcon" id="balcon1" />
                <span class="w-[max-content] mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >От года</span
                >
              </label>
              <label for="balcon2" class="flex">
                <input @change="check" class="hidden" type="radio" name="balcon" id="balcon2" />
                <span class="w-[max-content] mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >На несколько месяйев</span
                >
              </label>
            </div>
          </div>
        </div>
        

        <div class="mt-[40px] px-[8px]" v-if="filter.typeObject =='Квартира' || filter.typeObject =='Комната'">
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
              <label for="input5" class="flex">
                <input
                  @change="selectQuanitityRoom"
                  class="hidden"
                  type="checkbox"
                  name="radio"
                  id="input5"
                />
                <span class="mr-[5px] border px-[16px] py-[7px] rounded-[4px]"
                  >5</span
                >
              </label>
            </div>
          </div>
        </div>

        <MobileFilterUIInput :tag="`span`" 
        :innerText="`с`"
        title="Цена"
        placeholder1="от"
        placeholder2="до"
        :enterPrice="enterPrice"
        :updateLoader="updateLoader"
        :updateData="updateData"
         />

         <MobileFilterUIInput
        v-if="filter.typeObject == 'Дом/дача'||filter.typeObject == 'Коттедж'"
        :tag="`span`" 
        :innerText="`м`" 
        :sup="`sup`"
        :textSup="`2`"
        title="Площадь дома" 
        placeholder1="от" 
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateArea="updateArea"
        />

        <MobileFilterUIInput
        v-if="filter.typeObject == 'Дом/дача'||filter.typeObject == 'Коттедж'"
        :tag="`span`" 
        :innerText="`сот`" 
        :sup="`sup`"
        :textSup="``"
        title="Площадь участка" 
        placeholder1="от" 
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateArea="updateArea"
        />

        <MobileFilterUIInput 
        v-if="filter.typeObject == 'Квартира'|| filter.typeObject == 'Комната'"
        :tag="`span`" 
        :innerText="`м`" 
        :sup="`sup`"
        :textSup="`2`"
        title="Общая площадь" 
        placeholder1="от" 
        placeholder2="до"
        :updateTotalArea="updateTotalArea"
        :updateLoader="updateLoader"
        :updateData="updateData"
        />

        <div class="mt-[40px] px-[8px]" v-if="filter.dealType=='Аренда'">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Удобства
            </div>
          </div>
          <div class="mt-[10px] mb-[10px]">
            <div class="mt-[5px]">
              <div
                class="flex   mt-[4px] mb-[-4px] flex-wrap w-full"
              >
                <label v-for="(condition,index) of c" :key="index" :for="`condition${index+1}`" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="condition"
                    :data-name="condition.id"
                    :id="`condition${index+1}`"
                    @change="check"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >{{ condition.name == 'В комнатах'?'Комнатная мебель':condition.name == 'На кухне'?'Кухонная мебель':condition.name  }}</span
                  >
                </label>
                
              </div>
            </div>
          </div>
        </div>
        
        <MobileFilterUIInput
        v-if="filter.typeObject == 'Квартира'||filter.typeObject == 'Комната'"
        :tag="`span`" 
        title="Площадь"
        :sup="`sup`"
        innerText="м" 
        textSup="2"
        placeholder1="от" 
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateArea="updateArea"
        />

        <MobileFilterUIInput
        v-if="filter.typeObject == 'Квартира'||filter.typeObject == 'Комната'"
        :tag="`span`" 
        :sup="`sup`"
        innerText="м"
        textSup="2"
        :title="``" 
        placeholder1="от" 
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateKitchenArea="updateKitchenArea"
        />
        

        <MobileFilterUIInput  
        title="Этаж" 
        placeholder1="от"
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateFloor="updateFloor"
        />
        

        <div class="mt-[40px] px-[8px]" v-if="filter.dealType=='Аренда'">
          <div class="flex items-center">
            <div
              style="font-family: Lato, Arial, sans-serif"
              class="font-bold leading-[24px] text-[16px] text-[#152242] tracking-[normal]"
            >
              Ремонт
            </div>
          </div>
          <div class="mt-[10px] mb-[10px]">
            <div class="mt-[5px]">
              <div
                class="flex   mt-[4px] mb-[-4px] flex-wrap w-full"
              >
                <label v-for="(r,index) of repair" :key="index" :for="`repair${index+1}`" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="repair"
                    :data-name="r.label"
                    :id="`repair${index+1}`"
                    @change="check"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >{{ r.label }}</span
                  >
                </label>
                
              </div>
            </div>
          </div>
        </div>

        <div class="mt-[40px] px-[8px]" v-if="filter.typeObject == 'Квартира'||filter.typeObject == 'Комната'">
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
                <input @change="check" class="hidden" type="radio" name="balcon" id="balcon1" />
                <span class="mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >есть</span
                >
              </label>
              <label for="balcon2" class="flex">
                <input @change="check" class="hidden" type="radio" name="balcon" id="balcon2" />
                <span class="mr-[5px] py-[6px] border rounded-[4px] px-[15px]"
                  >нет</span
                >
              </label>
            </div>
          </div>
        </div>

        <MobileFilterUIInput 
        title="Год постройки"
        placeholder1="от"
        placeholder2="до"
        :updateLoader="updateLoader"
        :updateData="updateData"
        :updateYear="updateYear"
        />


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
                class="flex  mb-[-4px] w-full flex-wrap"
              >
                <label v-for="(home,index) of homeType" :key="index" :for="`home${index+1}`" class="flex mr-[3px] mt-[3px]">
                  <input
                    class="hidden"
                    type="checkbox"
                    name="home"
                    :id="`home${index+1}`"
                    @change="check"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[15px] overflow-hidden text-ellipsis whitespace-nowrap mr-[5px] border rounded-[4px] px-[10px] py-[6px]"
                    >{{ home.label }}</span
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
            @click="navigateTo('/yandex-map')"
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
            @click="navigate"
            class="bg-[#0468ff] flex items-center justify-center text-white px-[5px] w-[100%] h-[40px] rounded"
          >
            <span
              style="font-family: Lato, Arial, sans-serif"
              class="text-[16px] flex justify-center items-center font-[700]"
            >
              <div v-if="loader" class="inline h-[100%]">
                <div
                  class="spinner-border mt-[5px]"
                  role="status"
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

// const filters = ref(JSON.parse)
const price = ref({
  from: "",
  to: "",
});

function enterPrice(value1,value2){
  price.value.from = value1
  price.value.to = value2
  filter.value.priceFrom = price.value.from
  filter.value.priceTo = price.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}

const textObj = ref({
  price:'',
  placeholder1:'',
  placeholder2:''
})


const totalArea = ref({
  from: "",
  to: "",
});

function updateTotalArea(value1,value2){
  totalArea.value.from = value1
  totalArea.value.to = value2
  filter.value.totalAreaFrom = totalArea.value.from
  filter.value.totalAreaTo = totalArea.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}

const area = ref({
  from: "",
  to: "",
});

function updateArea(value1, value2){
  area.value.from = value1
  area.value.to = value2
  filter.value.areaFrom = area.value.from
  filter.value.areaTo = area.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}
const kitchenArea = ref({
  from: "",
  to: "",
});

function updateKitchenArea(value1, value2){
  kitchenArea.value.from = value1
  kitchenArea.value.to = value2
  filter.value.kitchenAreaFrom = kitchenArea.value.from
  filter.value.kitchenAreaTo = kitchenArea.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}
const floor = ref({
  from: "",
  to: "",
});

function updateFloor(value1, value2){
  floor.value.from = value1
  floor.value.to = value2
  filter.value.floorFrom = floor.value.from
  filter.value.floorTo = floor.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}

const year = ref({
  from: "",
  to: "",
});

function updateYear(value1, value2){
  year.value.from = value1
  year.value.to = value2
  filter.value.yearFrom = year.value.from
  filter.value.yearTo = year.value.to
  sessionStorage.setItem('filter',JSON.stringify(filter.value))
}

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

const homeType = ref([
  {name:'check1', label:'Кирпичный',checked:false},
  {name:'check2', label:'Монолитный',checked:false},
  {name:'check3', label:'Кирпично-монолитный',checked:false},
  {name:'check4', label:'Панельный',checked:false},
  {name:'check5', label:'Блочный',checked:false},
  {name:'check6', label:'Деревянный',checked:false},

])

  let sessionFilter  = JSON.parse(sessionStorage.getItem('filter'))


const repair = ref([
  {name:'repair1',label:'Без ремонта',checked:false},
  {name:'repair1',label:'Обичный',checked:false},
  {name:'repair1',label:'Косметический',checked:false},
  {name:'repair1',label:'Евро',checked:false},
  {name:'repair1',label:'Дизайнерский',checked:false},
])
const selectHome = ref([])
const conds = ref([])
const rep = ref([])
async function check(event) {
  if (event.target.name == 'home') {
      if (event.target.checked) {
        selectHome.value.push(event.target.nextSibling.textContent.trim())
      }
      if (!event.target.checked) {
        selectHome.value =
        selectHome.value.filter((item)=> item !== event.target.nextSibling.textContent.trim())
      }
      filter.value.typeHome = selectHome.value
      sessionStorage.setItem('filter', JSON.stringify(filter.value))
  }
  
  if (event.target.name == 'btnradio') {
    if (event.target.nextSibling.textContent == 'Купить') {
      filter.value.dealType = "Продажа"
    }
    if (event.target.nextSibling.textContent == 'Снять') {
      filter.value.dealType = "Аренда"
    }
    sessionStorage.setItem('filter',JSON.stringify(filter.value))
  }

  if (event.target.name == 'repair') {
    if (event.target.checked) {
      rep.value.push(event.target.nextSibling.textContent.trim());

    }
    if (!event.target.checked) {
      rep.value = rep.value.filter(item=>item !== event.target.nextSibling.textContent.trim())
    }
    filter.value.repair = rep.value
    sessionStorage.setItem('filter',JSON.stringify(filter.value))
  }
  
  if (event.target.name == 'balcon') {
     filter.value.balcon = event.target.nextSibling.textContent 
    sessionStorage.setItem('filter',JSON.stringify(filter.value))
  }
  if (event.target.name == 'condition') {
    if (event.target.checked) {
      conds.value.push(parseInt(event.target.dataset.name))
      filter.value.condition = conds.value
    }
    if (!event.target.checked)
    {
      conds.value =
      conds.value.filter((item)=> item !== parseInt(event.target.dataset.name))
      filter.value.condition = conds.value
    }
    sessionStorage.setItem('filter',JSON.stringify(filter.value))
    
  }
  loader.value = true;
  await fetch("http://192.168.100.45:8000/api/filter", {
    method: "post",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(filter.value),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
      conds.value = []
    });
  loader.value = false;
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
  await fetch("http://192.168.100.45:8000/api/filter", {
    method: "post",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(filter.value),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
    });
  loader.value = false;
}



const isCheck1 = ref("");
const cities = ref();

const c = ref()
const conditions = fetch('http://192.168.100.45:8000/api/conditions')
const condition = await conditions
c.value = await condition.json() 

const technics = [
        'Кондиционер',
        'На кухне',
        'В комнатах',
        'Посудамоечная машина',
        'Стиральная машина',
        'Телевизор',
        'Холодильник',
        'Интернет',
        'Телефон'
        ]

        console.log(c.value);
        c.value = c.value.filter(item=>{
            return  technics.indexOf(item.name) !== -1;
        })
        // c.value = c.value.filter(item=>{
        //     return item.name == 'На кухне' || item.name == 'В комнатах'
        // })
        const filters = ref(JSON.parse(sessionStorage.getItem("filter")));
onMounted(async () => {
        
  // sessionStorage.setItem('filter',JSON.stringify(filter.value))
  if (navigator.maxTouchPoints < 1) {
    router.push("/");
  }
  const radio = document.querySelectorAll(".hidden");
  radio.forEach((item) => {
    if (route.fullPath == `/filters/${item.dataset.route}`) {
      isCheck1.value = item.dataset.route;
    }
  });
  
  showNavBar.value = false;
  loader.value = true;
  await fetch("http://192.168.100.45:8000/api/filter", {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(filters.value),
  })
    .then((res) => res.json())
    .then((res) => {
      data.value = res;
      console.log(res);
    });
  loader.value = false;

  const cityUrl = fetch(`http://192.168.100.45:8000/api/city`);
  const c = await cityUrl;
  cities.value = await c.json();
});

function clearInput() {
  const inputs = document.querySelectorAll("input");
  inputs.forEach((input) => (input.value = ""));
}


function navigate(){
  window.location.replace('/list')
   
}
</script>



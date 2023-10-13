<script setup>
        // ymaps.ready(init);
        // function init(){
        //     let myMap = new ymaps.Map("map-yandex", {
        //         center: [38.576271, 68.779716],
        //         zoom: 13
        //     });
        //     console.log(myMap);
        //  }
const { announData, responce } = getData();
const floorObj = ref({
  floor: "",
  floor_in_house: "",
});
const cityName = ref("");
const typeHome = ref('')
const year = ref(0)
const mapObj = ref({});
const mapObj1 = ref({});
const moreThen = ref(false);
const showCities = ref();
const date = new Date()
const curentYear = ref(date.getFullYear())

async function selectCity() {
  const cityUrl = fetch(`http://192.168.100.45:8000/api/city`);
  const c = await cityUrl;
  const city = await c.json();
  showCities.value = city;
}
const selected = ref(false);

function select(event) {
  cityName.value = event.target.textContent;
  mapObj.value.city = event.target.textContent;
  mapObj1.value.city = event.target.textContent;
}

function isFloor() {
  if (parseInt(mapObj.value.floor) > parseInt(mapObj.value.floorHouse)) {
    moreThen.value = true;
  } else {
    moreThen.value = false;
  }
  floorObj.value.floor = mapObj.value.floor
  floorObj.value.floor_in_house = mapObj.value.floorHouse
  year.value = mapObj.value.year
}

function selectType(event) {
  mapObj.value.selectType = event.target.parentElement.textContent;
  mapObj1.value.selectType = event.target.parentElement.textContent;
  typeHome.value = mapObj.value.selectType
}

const router = useRouter();

function move() {
    announData.value[1] = mapObj.value;
    localStorage.setItem("announ", JSON.stringify(announData.value));
    navigateTo("/pictures");
    
    if (announData.value[0].objects == 'Квартира'||announData.value[0].objects == 'Комната') {
      
      if (
         cityName.value == '' 
      || !floorObj.value.floor 
      || !floorObj.value.floor_in_house 
      || parseInt(floorObj.value.floor) > parseInt(floorObj.value.floor_in_house)
      || typeHome.value == ''
      || !year.value
      || year.value < 1950
      || year.value > curentYear.value
      ) {
        navigateTo("/map");
        // announData.value[1] = "";
        localStorage.setItem("announ", JSON.stringify(announData.value));
      }
    }
  
}

onMounted(() => {
  announData.value[0] = JSON.parse(localStorage.getItem("announ"))[0];
  if (JSON.parse(localStorage.getItem("announ"))[1]) {
    mapObj.value = JSON.parse(localStorage.getItem("announ"))[1];
    cityName.value = mapObj.value.city
    floorObj.value.floor =  mapObj.value.floor
    floorObj.value.floor_in_house = mapObj.value.floorHouse
    year.value = mapObj.value.year
    typeHome.value = mapObj.value.typeHome
  } else {
    mapObj.value = mapObj1.value;
  }
  const inputs = document.querySelectorAll("input");


// onMounted(() => {
//   announData.value[0] = JSON.parse(localStorage.getItem("announ"))[0];
//   if (JSON.parse(localStorage.getItem("announ"))[1]) {
//     mapObj.value = JSON.parse(localStorage.getItem("announ"))[1];
//   } else {
//     mapObj.value = mapObj1.value;
//   }
//   const inputs = document.querySelectorAll("input");

  if (!announData.value[0]) {
    router.push('/announ')
  }
});

// });
      
</script>
<template>
  <div class="container-sm">
    <p id="selectcity" class="mb-4 mt-2">Введите адрес</p>

    <form class="mt-3">
      <!-- <div class="mb-5 mt-2">
                            <input type="text" class="form-control border-none w-100" placeholder="Укажите город или улица">
                        </div> -->
      <div
        :style="!mapObj.city ? `border-radius:8px; border:1px solid red` : ''"
        class="dropdown mb-5"
        @click="selectCity"
      >
        <a
          class="btn form-control border dropdown-toggle-none position-relative"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
        >
          <span class="me-5">{{
            mapObj.city ? mapObj.city : "Укажите город"
          }}</span>
        </a>

        <ul
          style="height: 300px; overflow: auto"
          class="dropdown-menu form-control"
        >
          <li @click="select" v-for="city of showCities" :key="city">
            <a
              :style="
                mapObj.city == city.name
                  ? 'background-color:#0468FF; color:white; font-weight:bold;'
                  : ''
              "
              class="dropdown-item"
              href="#"
              >{{ city.name }}</a
            >
          </li>
        </ul>
      </div>
      <p
        v-if="!mapObj.city"
        style="
          margin-top: -45px;
          font-family: Lato, Arial, sans-serif;
          font-weight: 400;
          font-size: 11px;
          line-height: 15px;
          color: red;
        "
      >
        Укажите адрес
      </p>
    </form>

    <div
      style="
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 350px;
      "
      id="map-yandex"
    >
      <!-- <div
        class="width:100%; height:350px"
        
      ></div> -->
    </div>
    <div class="flex mt-4" id="floor"
    >
      <div class="content">
        <div 
        class="rows" v-if="announData[0].objects == 'Квартира' || announData[0].objects =='Комната'">
          <span>Этаж</span>
          <input
            
            :style="moreThen || !mapObj.floor ? `border:1px solid red; ` : ''"
            @input="isFloor"
            type="number"
            v-maska
            data-maska="##"
            v-model="mapObj.floor"
            style="-moz-appearance: textfield"
            class="input form-control"
          />
          <p
            v-if="moreThen"
            style="
              margin-top: 3px;
              font-family: Lato, Arial, sans-serif;
              font-weight: 400;
              font-size: 11px;
              line-height: 15px;
              color: red;
            "
          >
            Этаж должен быть меньше или <br />
            равен количеству этажей
          </p>
        </div>
        <div class="rows">
          <span>{{ announData[0].objects == 'Квартира' || announData[0].objects =='Комната' ? 'Этаж в дома': 'Количество этажей' }}</span>
          <input
            :style="!mapObj.floorHouse ? `border:1px solid red; ` : ''"
            @input="isFloor"
            type="number"
            v-maska
            data-maska="##"
            v-model="mapObj.floorHouse"
            class="input form-control"
          />
        </div>
      </div>
    </div>

    <div v-if="announData.objects == 'Квартира'" class="flex mt-4" id="number_apartament">
      <div class="rows">
        <span>Номер квартиры</span>
        <input
          :style="!mapObj.apartmentNumber ? 'border:1px solid red;' : ''"
          v-model="mapObj.apartmentNumber"
          type="number"
          v-maska
            data-maska="#####"
          class="input form-control"
        />
      </div>
    </div>

    <div v-if="announData[0].objects == 'Квартира' || announData[0].objects =='Комната'" class="flex mt-4" id="year">
      <div class="rows">
        <p> О здании</p>
      </div>
    </div>
    <div class="flex mt-2">
      <div class="contents">
        <div class="rows">
          <p>Год постройки</p>
          <input
            :style="`${!mapObj.year || mapObj.year < 1950 ? 'border:1px solid red;' : ''}`"
            v-model="mapObj.year"
            type="number"
            v-maska
            data-maska="####"
            @input="isFloor"
            class="form-control"
          />
          <p v-if="mapObj.year <= 1950" class="text-[red] mt-[4px]" style="font-size:14px">Укажите год позднее 1950</p>
          <p v-if="year > curentYear" class="text-[red] mt-[4px]" style="font-size:14px;">Укажите год до {{curentYear}}</p>
        </div>
      </div>
    </div>

    <div class="flex" id="type-home">
      <div class="type-home mt-4">
        <p>{{ announData[0].objects !== 'Квартира' || announData[0].objects !=='Комната' ? 'Материал дома':'Тип дома' }}</p>
        <slot />
        <div class="rows">
          <label for="1">
            <input
              :checked="mapObj.selectType == 'Кирпичный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="1"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Кирпичный</span
            >
          </label>
          <label for="2">
            <input
              :checked="mapObj.selectType == 'Монолитный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="2"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Монолитный</span
            >
          </label>
          <label for="3">
            <input
              :checked="mapObj.selectType == 'Панельный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="3"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Панельный</span
            >
          </label>
          <label for="4">
            <input
              :checked="mapObj.selectType == 'Блочный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="4"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Блочный</span
            >
          </label>
          <label for="5">
            <input
              :checked="mapObj.selectType == 'Деревянный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="5"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Деревянный</span
            >
          </label>
          <label for="6">
            <input
              :checked="mapObj.selectType == 'Сталинский'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="6"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Сталинский</span
            >
          </label>
          <label for="7">
            <input
              :checked="mapObj.selectType == 'Монолитно-кирпичный'"
              @change="selectType"
              name="radioinp"
              type="radio"
              id="7"
            />
            <span
              :style="!mapObj.selectType ? 'border: 1px solid red' : ''"
              class="form-control"
              >Монолитно-кирпичный</span
            >
          </label>
        </div>
      </div>
    </div>
    <div class="container mt-3 d-flex justify-content-end mx-1">
      <a class="btn btn-primary px-4" @click="move"> Далее </a>
    </div>
  </div>
  <!-- :href="!cityName ? '#selectcity'
                    :!floorObj.floor || !floorObj.floor_in_house 
                    ? '#floor'
                    :!mapObj.apartmentNumber?'#number_apartament'
                    :!mapObj.year?'#year'
                    : 
                    !mapObj.selectType
                    ?
                    '#type-home':'/pictures'" -->
</template>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
@media screen and (min-width: 320px) {
  .flex {
    display: flex;
    margin-top: 10px;
  }
  .input {
    width: 200px;
  }
  .content {
    display: flex;
    width: 70%;
    flex-direction: column;
  }

  .rows > span {
    font-size: 15px;
  }
  .flex > .content > .rows > input {
    width: 200px;
  }
  .flex > .content > .rows {
    margin-bottom: 40px;
  }
  .flex > .rows > p {
    letter-spacing: -1px;
    font-weight: bold;
    font-size: 18px;
    font-family: lato, sans-serif;
  }
  .flex > .contents {
    display: flex;
    width: 85%;
  }
  .flex > .contents > .rows > input {
    width: 100px;
  }
  .type-home > .rows {
    display: flex;
    flex-wrap: wrap;
  }

  .type-home > .rows > label {
    width: max-content;
    margin: 5px;
  }
  label > span {
    width: 100%;
  }
  label > input {
    display: none;
  }
  label > input:checked + span {
    box-shadow: 0 0 5px #006cfd;
    background-color: rgba(192, 192, 192, 0.338);
  }
  label > input:active + span {
    background-color: #00b5fd89;
  }
  .container-btn {
    display: flex;
    justify-content: center;
  }
  .container-btn > .btn {
    width: 100%;
  }
}
@media screen and (min-width: 640px) {
  .container-btn {
    display: flex;
    justify-content: flex-end;
  }

  .container-btn > .btn {
    width: max-content;
  }

  p {
    font-size: 1em;
    font-weight: 470;
    font-family: Lato, sans-serif;
  }

  .name {
    display: flex;
    justify-content: space-between;
    margin-top: 12px;
  }

  .container-sm {
    margin-bottom: 10px;
  }
  .flex {
    display: flex;
    margin-top: 10px;
  }
  .input {
    width: 200px;
  }
  .content {
    display: flex;
    width: 70%;
    flex-direction: row;
    justify-content: space-between;
  }

  .rows > span {
    font-size: 15px;
  }
  .flex > .rows > p {
    letter-spacing: -1px;
    font-weight: bold;
    font-size: 18px;
    font-family: lato, sans-serif;
  }
  .flex > .contents {
    display: flex;
    width: 85%;
    justify-content: space-between;
  }
  .flex > .contents > .rows > input {
    width: 100px;
  }
  .type-home > .rows {
    display: flex;
    flex-wrap: wrap;
  }

  .type-home > .rows > label {
    width: max-content;
    margin: 5px;
  }
  label > span {
    width: 100%;
  }
  label > input {
    display: none;
  }
  label > input:checked + span {
    border-color: #006cfd;
  }
}

.container-sm {
  margin-bottom: 10px;
}

@media screen and (min-width: 1024px) {
  .container-sm {
    width: 67%;
    height: max-content;
    margin-top: 10px;
    margin-bottom: 20px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.16);
    padding: 20px 35px;
    border-radius: 8px;
  }
  .container-sm > p {
    font-weight: bold;
  }

  .flex {
    display: flex;
    margin-top: 10px;
  }
  .input {
    width: 200px;
  }
  .content {
    display: flex;
    width: 70%;
    justify-content: space-between;
  }
  .rows > span {
    font-size: 15px;
  }
  .flex > .rows > p {
    letter-spacing: -1px;
    font-weight: bold;
    font-size: 18px;
    font-family: lato, sans-serif;
  }
  .flex > .contents {
    display: flex;
    width: 85%;
    justify-content: space-between;
  }
  .flex > .contents > .rows > input {
    width: 100px;
  }
  .type-home > .rows {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
  }

  .type-home > .rows > label {
    width: max-content;
    margin: 5px;
  }
  label > span {
    width: 100%;
  }
  label > input {
    display: none;
  }
  label > input:checked + span {
    border-color: #006cfd;
    background-color: rgba(192, 192, 192, 0.338);
  }
  label > input:active + span {
    background-color: #00b5fd89;
  }
}
</style>
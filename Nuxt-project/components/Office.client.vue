<template>
  <div class="min-h-[100vh] bg-[#f4f4f4] p-[10px]">
    <div class="container-xlg lg:container-lg">
      <div class="px-[30px] h-[50px] flex mt-[10px]">
        <h1 class="text-[27px] mx-[8px] mt-[8px] font-bold">
          Новое объявление
        </h1>
      </div>

      <div class="min-h-[100vh] mt-[30px] bg-[white] max-w-full">
        <div class="relative z-1 mt-[10px] border-top-2 mb-[0]">
          <div
            class="text-[#121212] font-[400] text-[14px] leading-[1.3] py-[10px] px-[16px]"
          >
            <div class="relative my-[10px]">
              <div class="mb-[10px] font-bold text-[16px] leading-[16px]">
                Адрес или название бизнес-центра
              </div>
            </div>

            <div class="text-[#121212] font-[400] text-[14px] leading-[1.3]">
              <form class="mt-3">
                <div class="dropdown mb-5 " :style="!CommercialAnnoun.city ? 'border:1px solid red; border-radius:6px;':''">
                  <a
                    class="btn form-control border dropdown-toggle-none position-relative"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                  >
                    <span class="me-5">{{CommercialAnnoun.city ? CommercialAnnoun.city :'Укажите город'}}</span>
                  </a>

                  <ul
                    style="height:300px; overflow: auto"
                    class="dropdown-menu form-control"
                  >
                    <li  :data-name="c.name" v-for="c of city" :key="c.id">
                      <a @click="chooseCity" class="dropdown-item" href="#">{{ c.name }}</a>
                    </li>
                  </ul>
                </div>
                <p
                v-if="!CommercialAnnoun.city"
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
              >
                <img
                  class="w-full h-[350px]"
                  src="https://geoawesomeness.com/wp-content/uploads/2022/03/maps-broadcom.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-[white] mt-[20px]">
        <div class="p-[10px]">
          <div
            class="mb-[20px] text-[14px] leading-[20px] text-[rgba(21,34,66,.6)] font-weight"
          >
            Обычное объявление
          </div>
        </div>

        <div class="p-[10px]">
          <div class="flex flex-col">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              Общая площадь
            </div>

            <div :style="!CommercialAnnoun.totalArea ? 'border:1px solid red;':'border:1px solid silver'" class="flex h-[30px] rounded-1 px-[4px] w-[90px]">
              <input
                v-model="totalArea"
                @input="getTotalArea"
                class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                v-maska
                data-maska="####"
                type="text"
              />
              <span>м<sup class="text-[10px]">2</sup></span>
            </div>
          </div>

          <div class="flex flex-col mt-[20px]">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            
            >
              Этаж
            </div>
            <div class="flex ">
              <div :style="!CommercialAnnoun.floor ? 'border:1px solid red;':'border:1px solid silver'" class="flex h-[30px] rounded-1 px-[4px] w-[90px]">
                <input
                  v-model="floor"
                  @input="getFloor"
                  class="border-0 h-[24px] outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                  v-maska
                  data-maska="###"
                  type="text"
                />
              </div>
              <p v-if="CommercialAnnoun.floor > CommercialAnnoun.floorFrom" class="text-[red] ml-[10px] leading-[14px] text-[11px]">этаж должен быть меньше <br> или равен количество этажей</p>
            </div>
          </div>

          <div class="flex flex-col">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              Из
            </div>

            <div :style="!CommercialAnnoun.floorFrom ? 'border:1px solid red;':'border:1px solid silver'" class="flex rounded-1 h-[30px]  px-[4px] w-[90px]">
              <input
              @input="getFloorFrom"
              v-model="floorFrom"
                class="border-0 h-[24px] outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                v-maska
                data-maska="###"
                type="text"
              />
            </div>
          </div>

          <div class="flex flex-col mt-[10px]">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              Высота потолков
            </div>
            <div
              class="flex rounded-1 h-[30px] items-center px-[4px] w-[90px]"
            :style="!CommercialAnnoun.CeilingHeight ? 'border:1px solid red;':'border:1px solid silver'"
            >
              <input
                v-model="CeilingHeight"
                class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                v-maska
                @input="getCeilingHeight"
                data-maska="####"
                type="text"
              />
              <span>м</span>
            </div>
          </div>

          <div class="flex flex-col mt-[10px]">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              Планировка
            </div>

            <div :style="!CommercialAnnoun.layout || CommercialAnnoun.layout == 'Не выбранно'  ? 'border:1px solid red;':'border:1px solid silver'" class="flex rounded-1 w-[max-content]">
              <select
              @change="selectLayout"
                style="-webkit-appearance: none"
                class="border-1 h-[30px] rounded-1 outline-0 px-[10px] py-[1px] text-[14px]"
                name="plan"
              >
                <option selected class="text-[14px]" >Не выбранно</option>
                <option  class="text-[14px]">Кабинетная</option>
                <option  class="text-[14px]">Открытая</option>
                <option  class="text-[14px]">Коридорная</option>
                <option  class="text-[14px]">Смешанная</option>
              </select>
            </div>

            <div
              class="mb-[8px] shrink-[0] pt-[6px] mt-[15px] w-[180px] text-[14px] leading-[16px]"
            >
              Состояние
            </div>

            <div :style="!CommercialAnnoun.State || CommercialAnnoun.State == 'Не выбранно'  ? 'border:1px solid red;':'border:1px solid silver'" class="flex rounded-1 w-[max-content]">
              <select
              @change="selectState"
                style="-webkit-appearance: none"
              
                class="h-[30px] rounded-1 outline-0 px-[10px] py-[1px] text-[14px]"
                name="plan"
              >
                <option class="text-[14px]" selected>Не выбранно</option>
                <option class="text-[14px]">Офисная отделка</option>
                <option class="text-[14px]">Под чистовую отделку</option>
                <option class="text-[14px]">
                  Требуется капитальный ремонт
                </option>
                <option class="text-[14px]">
                  Требуется косметический ремонт
                </option>
              </select>
            </div>

            <div
              class="mb-[8px] shrink-[0] pt-[6px] mt-[15px] w-[180px] text-[14px] leading-[16px]"
            >
              Мебель
            </div>

            <div :style="!CommercialAnnoun.Furniture || CommercialAnnoun.Furniture == 'Не выбранно'  ? 'border:1px solid red;':'border:1px solid silver'" class="flex rounded-1 w-[max-content]">
              <select
              @change="selectFurniture"
                style="-webkit-appearance: none"
                class="border-1 h-[30px] rounded-1 outline-0 px-[10px] py-[1px] text-[14px]"
                name="plan"
              >
                <option class="text-[14px]" selected>Не выбранно</option>
                <option class="text-[14px]">Есть</option>
                <option class="text-[14px]">Нет</option>
              </select>
            </div>

            <div
              class="mb-[8px] shrink-[0] pt-[6px] mt-[15px] w-[180px] text-[14px] leading-[16px]"
            >
              Парковка
            </div>

            <div :style="!CommercialAnnoun.Parking || CommercialAnnoun.Parking == 'Не выбранно'  ? 'border:1px solid red;':'border:1px solid silver'" class="flex rounded-1 w-[max-content]">
              <select
                @change="selectParking"
                style="-webkit-appearance: none"
                class="border-1 rounded-1 h-[30px] outline-0 px-[10px] py-[1px] text-[14px]"
                name="plan"
              >
                <option class="text-[14px]" selected>Не выбранно</option>
                <option class="text-[14px]">Наземная</option>
                <option class="text-[14px]">Многоуровневая</option>
                <option class="text-[14px]">Подземная</option>
                <option class="text-[14px]">На крыше</option>
              </select>
            </div>

            <div class="flex flex-col mt-[10px]">
              <div
                class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]"
              >
                Количество мест
              </div>
              
              <div
               :style="!CommercialAnnoun.numberSeats ? 'border:1px solid red;' : 'border: 1px solid silver;'"
               class="flex rounded-1 h-[30px] px-[4px] w-[100px]">
                <input
                  @input="getQuantitiySeats"
                  v-model="numberSeats"
                  class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                  v-maska
                  data-maska="####"
                  type="text"
                />
              </div>
            </div>
            <div></div>
          </div>
        </div>
        <!-- ///////////// -->
        <div class="mx-[2px] border-top bg-[white] min-h-[10vh] mt-[13px]">
          <div class="px-[10px]">
            <div class="mt-[24px] font-bold text-[16px] leading-[16px]">
              О здании
            </div>

            <div>
              <div class="flex flex-col mb-[10px] mt-[10px]">
                <div
                  class="mb-[8px] shrink-[0] pt-[6px] w-[180px] text-[14px] leading-[16px]"
                >
                  Год постройки
                </div>

                <div
                :style="!CommercialAnnoun.yearConstruction ? 'border:1px solid red;' : 'border: 1px solid silver;'"
                 class="flex rounded-1 h-[30px] px-[4px] w-[100px]">
                  <input
                    @input="getYearConstruction"
                    v-model="yearConstruction"
                    class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                    v-maska
                    data-maska="####"
                    type="text"
                  />
                </div>
              </div>
            </div>
            <div>
              <div class="flex flex-col mt-[10px]">
                <div
                  class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
                >
                  Площадь здания
                </div>

                <div
                  :style="!CommercialAnnoun.buildingArea ? 'border:1px solid red;' : 'border: 1px solid silver;'"
                  class="flex rounded-1 h-[30px] items-center px-[4px] w-[90px]"
                >
                  <input
                  @input="getBuildingArea"
                    class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                    v-model="buildingArea"
                    v-maska
                    data-maska="####"
                    type="text"
                  />
                  <span>м</span>
                </div>
              </div>
              <div class="flex flex-col mb-[10px] mt-[10px]">
                <div
                  class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
                >
                  Усачток
                </div>

                <div
                  :style="!CommercialAnnoun.plot ? 'border:1px solid red;' : 'border: 1px solid silver;'"
                  class="flex rounded-1 h-[30px] items-center px-[4px] w-[90px]"
                >
                  <input
                    @input="getPlot"
                    class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                    v-model="plot"
                    v-maska
                    data-maska="####"
                    type="text"
                  />
                  <span>га</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="px-[10px] border-y-[2px] min-h-[100vh]">
          <div>
            <div class="mt-[24px] font-bold text-[16px] leading-[16px]">
              Инфраструктура
            </div>
          </div>

          <div class="flex xsm:flex-wrap mt-[10px] max-w-[65%] h-full">
            <div class="flex justify-between h-[max-content] w-[100%]">
              <div style="flex: 1 1 flex-col">
                <label
                  class="flex mt-[14px]"
                  :for="data1.id"
                  v-for="data1 of firstData"
                  :key="data1.id"
                >
                  <input
                  @change="selectInfrastructure"
                    :data-name="data1.id"
                    type="checkbox"
                    :id="data1.id"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[14px] ml-[10px] media"
                    >{{ data1.name }}</span
                  >
                </label>
              </div>
              <div class="ml-[15px] flex flex-col">
                <label
                  class="flex mt-[14px]"
                  :for="data2.id"
                  v-for="data2 of secondData"
                  :key="data2.id"
                >
                  <input
                  @change="selectInfrastructure"
                    :data-name="data2.id"
                    type="checkbox"
                    :id="data2.id"
                  />
                  <span
                    style="font-family: Lato, Arial, sans-serif"
                    class="text-[14px] ml-[10px]"
                    >{{ data2.name }}</span
                  >
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="p-[10px] mt-[5px] rounded-[10px] border-primary"
        
      >
        <div>
          <Pictures />
        </div>
      </div>
      <div class="p-[10px] mt-[5px] bg-white">
        <div>
          <div>
            <div class="mt-[24px] font-bold text-[16px] leading-[16px]">
              Видео
            </div>
          </div>

          <div 
          class="mt-[15px] border rounded-1 h-[30px]">
            <input
            @input="CommercialAnnoun.linkVideo"
              type="text"
              v-model="CommercialAnnoun.linkVideo"
              class="w-full h-full outline-0 px-[10px]"
              placeholder="Ссылка на youtube"
            />
          </div>
        </div>

        <div>
          <div>
            <div class="mt-[24px] font-bold text-[16px] leading-[16px]">
              Заголовок объявления
            </div>
          </div>

          <div
            :style="!CommercialAnnoun.title ? 'border:1px solid red;' : 'border: 1px solid silver;'"
           class="mt-[15px] rounded-1 h-[30px]">
            <input
              @input="writeTitle"
              v-model="title"
              type="text"
              class="w-full h-full border-0 outline-0 px-[10px]"
            />
          </div>
        </div>

        <div>
          <div>
            <div class="mt-[24px] font-bold text-[16px] leading-[16px]">
              Описание
            </div>
          </div>

          <div 
          class="mt-[15px] rounded-1 h-[200px]"
          :style="!CommercialAnnoun.description || CommercialAnnoun.description.length < 15 ? 'border:1px solid red;' : 'border: 1px solid silver;'"
          >
          
            <textarea
              @input="writeDescription"
              v-model="description"
              style="resize: none"
              type="text"
              class="w-full h-full border-0 outline-0 px-[10px]"
            ></textarea>
          </div>
        </div>
      </div>

      <div class="p-[10px] mt-[5px] bg-white">
        <div>
          <div class="mt-[4px] font-bold text-[16px] leading-[16px]">Цена</div>
        </div>
        <div>
          <div>
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              арендная плата
            </div>
          </div>

          <div
            :style="!CommercialAnnoun.price ? 'border:1px solid red;' : 'border: 1px solid silver;'"
            class="flex rounded-1 h-[30px] items-center px-[4px] w-[120px]"
          >
            <input
              @input="getPrice"
              v-model="price"
              class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
              v-maska
              data-maska="####"
              type="text"
            />
            <span>с</span>
          </div>
        </div>

        <div class="mt-[10px] items-center flex flex-col md:flex-row-reverse justify-start">
          <div class="flex">
            <next-btn @click="post" class="btn btn-primary w-full font-bold"
              >Разместить</next-btn
            >
          </div>
          <div class="md:flex mt-[5px]  md:mt-[0] mx-[5px]">
            <next-btn class="btn btn-light w-full text-primary"
              >Сохранить черновик</next-btn
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
const CommercialAnnoun = ref({});
const totalArea = ref()
const floor = ref()
const floorFrom = ref()
const CeilingHeight = ref()
const numberSeats = ref() 
const yearConstruction = ref()
const buildingArea = ref()
const plot = ref()
const layout = ref()
const linkVideo = ref()
const title = ref()
const description = ref()
const price = ref()

const data = fetch("http://127.0.0.1:8000/api/infrastructure");
const dataFetch = await data;
const d = await  dataFetch.json();

const firstData = ref(d.filter((item) => item.id < 14));
const secondData = ref(d.filter((item) => item.id > 14));

const getInfo = fetch("http://127.0.0.1:8000/api/city");
const getCity = await getInfo;
const city = await getCity.json();

    function chooseCity(event){
      CommercialAnnoun.value.city = event.target.textContent;
    }


    function getTotalArea(){
      CommercialAnnoun.value.totalArea = parseInt(totalArea.value) 
    }

    function getFloor(){
      CommercialAnnoun.value.floor = parseInt(floor.value)
    }

    function getFloorFrom(){
      CommercialAnnoun.value.floorFrom = parseInt(floorFrom.value)
    }

    function getCeilingHeight(){
    CommercialAnnoun.value.CeilingHeight = parseInt(CeilingHeight.value);
    } 

    function getLinkVideo(){
      console.log(CommercialAnnoun.value.linkVideo);
    }
    function selectLayout(event){
      for (const item of event.target.children) {
        if(item.selected){
          CommercialAnnoun.value.layout= item.value
          console.log(CommercialAnnoun.value);
        }
      }
    }

    function selectState(event){
      for (const item of event.target.children) {
        if(item.selected){
          CommercialAnnoun.value.State = item.value
          console.log(CommercialAnnoun.value);
        }
      }
    }

    function selectFurniture(event){
      for (const item of event.target.children) {
        if(item.selected){
          CommercialAnnoun.value.Furniture = item.value
          console.log(CommercialAnnoun.value);
        }
      }
    }
    function selectParking(event){
      for (const item of event.target.children) {
        if(item.selected){
          CommercialAnnoun.value.Parking = item.value
          console.log(CommercialAnnoun.value);
        }
      }
    }

    function getQuantitiySeats(){
      CommercialAnnoun.value.numberSeats = parseInt(numberSeats.value)
    }

    function getYearConstruction(){
      CommercialAnnoun.value.yearConstruction = parseInt(yearConstruction.value)
    }

    function getBuildingArea(){
      CommercialAnnoun.value.buildingArea = parseInt(buildingArea.value)
    }
    function getPlot(){
      CommercialAnnoun.value.plot = parseInt(plot.value)
    }

    function writeTitle(){
      CommercialAnnoun.value.title = title.value 
    }

    function writeDescription(){
      CommercialAnnoun.value.description = description.value
    }

    function getPrice(){
      CommercialAnnoun.value.price = parseInt(price.value)
    }

  const infrastructure = ref([]);
  function selectInfrastructure(event){
    if (event.target.checked) {
        if (Array.isArray(infrastructure.value)) {
            infrastructure.value.push(parseInt(event.target.dataset.name))
        }
    }

    infrastructure.value.forEach(item => {
        if (!event.target.checked && parseInt(event.target.dataset.name) === parseInt(item)) {
            infrastructure.value.splice(infrastructure.value.indexOf(item),1)
        }
    });
            
    const elems = document.querySelectorAll('.d-none');
    elems.forEach(elem => {
        infrastructure.value.forEach(val =>{
            if (parseInt(elem.dataset.name) == val) {
                elem.checked = true
            }
        })
    }) 
  }

const {announData} = getData()

async function post(){
  announData.value[0] = JSON.parse(localStorage.getItem('announ'))[0]
  announData.value[1] = CommercialAnnoun.value
  announData.value[2] = infrastructure.value
  localStorage.setItem('announ', JSON.stringify(announData.value))
  await fetch('http://127.0.0.1:8000/api/create/announ/commercial',{
    method:'post',
    headers:{
      "Content-Type":'application/json',
      Authorization:'Bearer '+JSON.parse(localStorage.getItem('owner'))[0]
    },
    body:JSON.stringify({commercial: announData.value})
  })
  .then(responce=>{
    if (responce.ok) {
      navigateTo('/personal_area/my_announ')
    }
    return responce.json()
    })
  .then(res=>{
    console.log(res);
  })
}

  onMounted(()=>{
    if (!CommercialAnnoun.value && JSON.parse(localStorage.getItem('announ'))[1]) {
      CommercialAnnoun.value = JSON.parse(localStorage.getItem('announ'))[1]
    }
  })
</script>
<style scoped>
* {
  font-family: Lato, Arial, sans-serif;
}

@media screen and (min-width: 640px) {
  .media {
    overflow: hidden;
    width: 200px;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
@media screen and (min-width: 768px) {
  .media {
    min-width: 200px;
    text-overflow: none;
    white-space: wrap;
    overflow: auto;
  }
}

@media screen and (min-width: 320px) {
  .media {
    overflow: hidden;
    width: 100px;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
</style>
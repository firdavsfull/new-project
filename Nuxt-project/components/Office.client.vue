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
                <div class="dropdown mb-5">
                  <a
                    class="btn form-control border dropdown-toggle-none position-relative"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                  >
                    <span class="me-5">Укажите город</span>
                  </a>

                  <ul
                    style="height: 300px; overflow: auto"
                    class="dropdown-menu form-control"
                  >
                    <li v-for="c of city" :key="c.id">
                      <a class="dropdown-item" href="#">{{ c.name }}</a>
                    </li>
                  </ul>
                </div>
                <p
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
                  class="width:100%; height:350px"
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

            <div class="flex h-[30px] rounded-1 border px-[4px] w-[90px]">
              <input
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

            <div class="flex h-[30px] rounded-1 border px-[4px] w-[90px]">
              <input
                class="border-0 h-[24px] outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                v-maska
                data-maska="###"
                type="text"
              />
            </div>
          </div>

          <div class="flex flex-col">
            <div
              class="mb-[8px] shrink-[0] pt-[6px] w=[180px] text-[14px] leading-[16px]"
            >
              Из
            </div>

            <div class="flex rounded-1 h-[30px] border px-[4px] w-[90px]">
              <input
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
              class="flex rounded-1 h-[30px] items-center border px-[4px] w-[90px]"
            >
              <input
                class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
                v-maska
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

            <div class="flex rounded-1 w-[85px]">
              <select
                style="-webkit-appearance: none"
                class="border-1 h-[30px] rounded-1 outline-0 px-[10px] py-[1px] text-[14px]"
                name="plan"
              >
                <option class="text-[14px]" selected>Не выбранно</option>
                <option class="text-[14px]">Кабинетная</option>
                <option class="text-[14px]">Открытая</option>
                <option class="text-[14px]">Коридорная</option>
                <option class="text-[14px]">Смешанная</option>
              </select>
            </div>

            <div
              class="mb-[8px] shrink-[0] pt-[6px] mt-[15px] w-[180px] text-[14px] leading-[16px]"
            >
              Состояние
            </div>

            <div class="flex rounded-1 w-[85px]">
              <select
                style="-webkit-appearance: none"
                class="border-1 h-[30px] rounded-1 outline-0 px-[10px] py-[1px] text-[14px]"
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

            <div class="flex rounded-1 w-[85px]">
              <select
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

            <div class="flex rounded-1 w-[85px]">
              <select
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

              <div class="flex rounded-1 h-[30px] border px-[4px] w-[100px]">
                <input
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

                <div class="flex rounded-1 h-[30px] border px-[4px] w-[100px]">
                  <input
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
                  class="flex rounded-1 h-[30px] items-center border px-[4px] w-[90px]"
                >
                  <input
                    class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
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
                  class="flex rounded-1 h-[30px] items-center border px-[4px] w-[90px]"
                >
                  <input
                    class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
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
                    :data-name="data1.name"
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
                    :data-name="data2.name"
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
        style="border: 2px dashed"
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

          <div class="mt-[15px] border rounded-1 h-[30px]">
            <input
              type="text"
              class="w-full h-full border-0 outline-0 px-[10px]"
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

          <div class="mt-[15px] border rounded-1 h-[30px]">
            <input
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

          <div class="mt-[15px] border rounded-1 h-[200px]">
            <textarea
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
            class="flex rounded-1 h-[30px] items-center border px-[4px] w-[120px]"
          >
            <input
              class="border-0 outline-0 w-[100%] text-[14px] font-[450] text-[gray]"
              v-maska
              data-maska="####"
              type="text"
            />
            <span>с</span>
          </div>
        </div>

        <div class="mt-[10px]">
          <div class="flex">
            <next-btn class="btn btn-primary w-full font-bold"
              >Разместить</next-btn
            >
          </div>
          <div class="flex mt-[5px]">
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


onMounted( async () => {
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
    
        await fetch('http://192.168.89.169:8000/api/create/infrastructure',{
         method:'post',
         headers:{
           "Content-type":"application/json"
         },
         body: JSON.stringify(infrastructure)
        })
        
          
        

        await fetch('http://192.168.89.169:8000/api/create/city', {
         method:'post',
         headers:{
           "Content-type": "application/json"
         },
         body: JSON.stringify(cityData)
        })
      
    
  
});

const data = fetch("http://192.168.89.169:8000/api/infrastructure");
const dataFetch = await data;
const d = await  dataFetch.json();

const firstData = ref(d.filter((item) => item.id < 14));
const secondData = ref(d.filter((item) => item.id > 14));

const getInfo = fetch("http://192.168.89.169:8000/api/city");
const getCity = await getInfo;
const city = await getCity.json();

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
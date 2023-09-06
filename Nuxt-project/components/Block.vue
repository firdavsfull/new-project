<script setup>
const {announData, responce} = getData()
const floorObj = ref({
    floor:"",
    floor_in_house:""
})
const mapObj = ref({})

const moreThen = ref(false)

    const showCities = ref()
    const cityName = ref('')

    async function selectCity(){
    const cityUrl = fetch(`http://127.0.0.1:8000/api/city`)
    const c = await cityUrl;
    const city = await c.json()
    showCities.value = city
    }
    const selected = ref(false)

    function select(event){
        cityName.value = event.target.textContent;
        mapObj.value.city = event.target.textContent
    }

    function isFloor(){
        if (floorObj.value.floor > floorObj.value.floor_in_house) {
            moreThen.value = true
        }else{
            moreThen.value = false
        }

        mapObj.value.floor = floorObj.value.floor
        mapObj.value.floorHouse = floorObj.value.floor_in_house

    }

function selectType(event){
    mapObj.value.selectType = event.target.parentElement.textContent
}

const router = useRouter()
    function next(event){
        // if (!cityName.value || floorObj.value.floor == '' || floorObj.value.floor_in_house =='') {
        //     router.push('/map')
        // }else {
        //     navigateTo('/pictures') 
        // }
        
    // if (mapObj.value.city && mapObj.value.floor && mapObj.value.apartmentNumber && mapObj.value.year && mapObj.value.selectType) {
        
    // }
}
function move(){
    if (mapObj.value.city && mapObj.value.floor && mapObj.value.apartmentNumber && mapObj.value.year && mapObj.value.selectType) {
        announData.value.push(mapObj.value)
        localStorage.setItem('announ',JSON.stringify(announData.value))
        navigateTo('/pictures')
    }
}

     
    mapObj.value = JSON.parse(localStorage.getItem('announ'))[1] || [];
</script>
<template>
        <div class="container-sm">
                            <p id="selectcity" class="mb-4 mt-2">
                                Введите адрес
                            </p>

                    <form class="mt-3 ">
                        <!-- <div class="mb-5 mt-2">
                            <input type="text" class="form-control border-none w-100" placeholder="Укажите город или улица">
                        </div> -->
                        <div :style="!cityName ? `border-radius:8px; border:1px solid red`:''"  class="dropdown mb-5" @click="selectCity">
                            <a class="btn form-control border dropdown-toggle-none position-relative" href="#" role="button" data-bs-toggle="dropdown" >
                                <span class="me-5">{{!cityName ? 'Укажите город': cityName}}</span>
                            </a>

                            <ul style="height:300px; overflow: auto;" class="dropdown-menu form-control">
                                <li @click="select" v-for="city of showCities" :key="city">
                                    <a class="dropdown-item" href="#">{{city.name}}</a>
                                </li>
                            </ul>
                            </div>
                        <p v-if="!cityName" style="margin-top:-45px; font-family: Lato,Arial,sans-serif; font-weight:400; font-size:11px; line-height:15px; color:red;">Укажите адрес</p>
                    </form>


                    <div style="overflow:hidden; display:flex; align-items:center; justify-content:center; width:100%; height:350px; ">
                        <img class="width:100%; height:350px" src="https://geoawesomeness.com/wp-content/uploads/2022/03/maps-broadcom.png" >
                    </div>
                    <div class="flex mt-4" id="floor">
                        <div class="content">

                        <div class="rows" >
                            <span>Этаж</span>
                        <input :style="moreThen && !floorObj.floor ? `border:1px solid red; `:''" @input="isFloor" type="number" v-model="floorObj.floor" max="30" style="-moz-appearance: textfield;" class="input form-control">
                        <p v-if="moreThen && floorObj.floor_in_house" style="margin-top:3px; font-family: Lato,Arial,sans-serif; font-weight:400; font-size:11px; line-height:15px; color:red;">Этаж должен быть меньше или <br> равен количеству этажей</p>
                        </div>
                        <div class="rows">
                            <span>Этаж в доме</span>
                            <input :style="!floorObj.floor_in_house ? `border:1px solid red; `:''" @input="isFloor" type="number" v-model="floorObj.floor_in_house" max="30" class="input form-control">
                        </div>
                        </div>
                    </div>

                    <div class="flex mt-4" id="number_apartament">
                        <div class="rows">
                        <span>Номер квартиры</span>
                        <input :style="!mapObj.apartmentNumber?'border:1px solid red;':''" v-model="mapObj.apartmentNumber" type="number" class="input form-control">
                        </div>
                    </div>

                    <div class="flex mt-4" id="year">
                        <div class="rows">
                        <p>О здании</p>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="contents">
                            <div class="rows">
                                <p>Год постройки</p>
                            <input :style="`${!mapObj.year ? 'border:1px solid red;':''}` " v-model="mapObj.year" type="number" class="form-control ">
                            </div>
                        </div>
                    </div>

                    <div class="flex" id="type-home">
                        <div class="type-home mt-4">
                            <p>Тип дома</p>
                            <slot/>
                            <div class="rows">
                                <label for="1" >
                                    <input @change="selectType" name="radioinp" type="radio" id="1">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Кирпичный</span>
                                </label>
                                <label for="2" >
                                    <input @change="selectType" name="radioinp" type="radio" id="2">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Монолитный</span>
                                </label>
                                <label for="3" >
                                    <input @change="selectType" name="radioinp" type="radio" id="3">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Панельный</span>
                                </label>
                                <label for="4" >
                                    <input @change="selectType" name="radioinp" type="radio" id="4">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Блочный</span>
                                </label>
                                <label for="5" >
                                    <input @change="selectType" name="radioinp" type="radio" id="5">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Деревянный</span>
                                </label>
                                <label for="6" >
                                    <input @change="selectType" name="radioinp" type="radio" id="6">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Сталинский</span>
                                </label>
                                <label for="7" >
                                    <input @change="selectType" name="radioinp" type="radio"  id="7">
                                    <span :style="!mapObj.selectType ?'border: 1px solid red':''" class="form-control">Монолитно-кирпичный</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3 d-flex justify-content-end mx-1">
                    <a class="btn btn-primary px-4"
                    @click="move"
                    >
                        Далее
                    </a>
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
@media screen and (min-width:320px) {

    .flex {
        display: flex;
        margin-top: 10px;
    }
    .input{
        width: 200px;
    }
    .content{
        display: flex;
        width: 70%;
        flex-direction: column;
    }

    .rows > span{
        font-size: 15px;
    }
    .flex > .content > .rows > input{
        width: 200px;
    }
    .flex > .content > .rows {
        margin-bottom: 40px;
    }
    .flex > .rows > p{
        letter-spacing: -1px;
        font-weight: bold;
        font-size: 18px;
        font-family: lato, sans-serif;
    }
    .flex > .contents{
        display: flex;
        width: 85%;
        
    }
    .flex > .contents > .rows > input{
        width: 100px;
    }
    .type-home > .rows{
        display: flex;
        flex-wrap: wrap;
    }

    .type-home > .rows > label{
        width: max-content;
        margin: 5px;
    }
    label > span{
        width: 100%;
    }
    label > input{
        display: none;
    }
    label >input:checked + span {
        box-shadow: 0 0 5px #006cfd;
        background-color: rgba(192, 192, 192, 0.338);
    }
    label >input:active + span{
        background-color: #00b5fd89;
    }
    .container-btn{
        display: flex;
        justify-content: center;
    }
    .container-btn > .btn{
        width: 100%;
    }
}
@media screen and (min-width:640px) {
    .container-btn{
        display: flex;
        justify-content: end;
    }

    .container-btn > .btn{
        width: max-content;
    }

    p{
        font-size: 1em;
        font-weight: 470;
        font-family: Lato, sans-serif;
    }
    
    .name{
        display: flex;
        justify-content: space-between;
        margin-top: 12px;
    }
    
    .container-sm{
        margin-bottom: 10px;
    }
.flex {
    display: flex;
    margin-top: 10px;
}
.input{
    width: 200px;
}
.content{
    display: flex;
    width: 70%;
    flex-direction: row;
    justify-content: space-between;
}

.rows > span{
    font-size: 15px;
}
.flex > .rows > p{
    letter-spacing: -1px;
    font-weight: bold;
    font-size: 18px;
    font-family: lato, sans-serif;
}
.flex > .contents{
    display: flex;
    width: 85%;
    justify-content: space-between;
}
.flex > .contents > .rows > input{
    width: 100px;
}
.type-home > .rows{
    display: flex;
    flex-wrap: wrap;
}

.type-home >.rows>label{
    width: max-content;
    margin: 5px;
}
label > span{
    width: 100%;
}
 label > input{
    display: none;
}
 label >input:checked + span {
    border-color: #006cfd;
}
}

.container-sm{
        margin-bottom: 10px;
    }

    @media screen and (min-width: 1024px) {
        .container-sm{
        width: 67%;
        height: max-content;
        margin-top: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.16);
        padding:20px 35px;
        border-radius: 8px;
    }
    .container-sm > p{
        font-weight: bold;
    }
    
    
    .flex {
    display: flex;
    margin-top: 10px;
    }
    .input{
        width: 200px;
    }
    .content{
        display: flex;
        width: 70%;
        justify-content: space-between;
    }
    .rows > span{
        font-size: 15px;
    }
    .flex > .rows > p{
        letter-spacing: -1px;
        font-weight: bold;
        font-size: 18px;
        font-family: lato, sans-serif;
    }
    .flex > .contents{
        display: flex;
        width: 85%;
        justify-content: space-between;
    }
    .flex > .contents > .rows > input{
        width: 100px;
    }
    .type-home > .rows{
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    .type-home > .rows > label{
        width: max-content;
        margin: 5px;
    }
    label > span{
        width: 100%;
    }
    label > input{
        display: none;
    }
    label >input:checked + span {
        border-color: #006cfd;
        background-color: rgba(192, 192, 192, 0.338);
    }
    label >input:active + span{
        background-color: #00b5fd89;
    }
    }
</style>
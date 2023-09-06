

<script setup>
        const isRent = ref("")
        const AnnounOgj = ref({});
        const AnnounOgj2 = ref({})
        const {announData} = getData()
        
        
        const typeObject = ref(JSON.parse(localStorage.getItem('announ')) || {})
        

    function changeText(event){
        const btn = document.querySelector('.field_name')
        btn.textContent = event.target.textContent.trim();
        isRent.value = btn.textContent;
        AnnounOgj.value.rent = btn.textContent
        AnnounOgj2.value.rent = btn.textContent
    }


    function selectRent(event){
        const btn = document.querySelector('.rent')
        btn.textContent = event.target.textContent.trim();
        isRent.value = btn.textContent;
        AnnounOgj.value.typeRent = btn.textContent
        if (AnnounOgj.value.typeRent == 'Посуточно' && AnnounOgj2.value.typeRent == 'Посуточно') {
            AnnounOgj.value.objects = 'Квартира'
            AnnounOgj.value.Estate = 'Жилая'
            AnnounOgj2.value.objects = 'Квартира'
            AnnounOgj2.value.Estate = 'Жилая'
        }
        console.log(AnnounOgj.value);
    }
    function selectEstate(event){
        const btn = document.querySelector('.real_estate')
        btn.textContent = event.target.textContent.trim();
        isRent.value = btn.textContent;
        AnnounOgj.value.Estate = btn.textContent
        AnnounOgj2.value.Estate = btn.textContent
        if (AnnounOgj.value.typeRent == 'Посуточно' && AnnounOgj2.value.typeRent == 'Посуточно') {
            AnnounOgj.value.objects = 'Не выбранно'
            AnnounOgj.value.Estate = 'Жилая'
            AnnounOgj2.value.objects = 'Не выбранно'
            AnnounOgj2.value.Estate = 'Жилая'
        }
        console.log(AnnounOgj.value);
    }

    function selectObject(event){
        const btn = document.querySelector('.object')
            isRent.value = btn.textContent;
            AnnounOgj.value.objects = event.target.textContent
            AnnounOgj2.value.objects = event.target.textContent
            btn.textContent = event.target.textContent.trim()
            announData.value[0] = AnnounOgj.value
            localStorage.setItem('announ', JSON.stringify(announData.value))
            navigateTo('/map')
    }

    function selectObjectFromSale(event){
        typeObject.value = event.target.dataset.name
        AnnounOgj.value.objects = event.target.dataset.name;
        AnnounOgj2.value.objects = event.target.dataset.name;
        announData.value[0] = AnnounOgj.value
        localStorage.setItem('announ', JSON.stringify(announData.value))
         navigateTo('/map')
    }
    

    
    onMounted(()=>{
        if (JSON.parse(localStorage.getItem('announ'))) {
            AnnounOgj.value = JSON.parse(localStorage.getItem('announ'))[0]
        } else
        {
            AnnounOgj.value = AnnounOgj2.value
        }
    
    })
</script>

<template>
    <div class="content">
            <div style="flex:1 0 auto">
                <div class="add-form">
                    <div class="add-form_header--mobele">
                        <div class="add-form__title">Новое объявление</div>
                        <!-- <div class="add-form__title">Редактировать объявление</div> -->

                        <div class="add-form__text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, accusamus, quaerat magnam qui quasi ea sit nesciunt consectetur quae consequatur assumenda ullam doloremque porro optio? Vel nesciunt nisi quasi blanditiis?
                        </div>
                    </div>

                        <div class="add-form__body fs-5">
                            <form  class="add-form__main">
                                
                            <div class="add-segment">
                            <div class="field__name fs-7">Тип сделки</div>
                                <div class="btn-group">
                                    <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{`${AnnounOgj.rent ? AnnounOgj.rent:'Не выбранно'}`}}
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li :style="AnnounOgj.rent =='Аренда' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="changeText" class="cursor-pointer dropdown-item item">
                                            Аренда
                                        </li>
                                        <li :style="AnnounOgj.rent =='Продажа' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="changeText" class="cursor-pointer dropdown-item item">
                                            Продажа
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-segment "  v-if="AnnounOgj.rent && AnnounOgj.rent == 'Аренда'">
                                <div class="field__name fs-7">Тип аренды</div>
                                    <div class="btn-group">
                                        <button class="field_name rent btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{`${AnnounOgj.typeRent ? AnnounOgj.typeRent: 'Не выбранно'}`}}
                                        </button>
                                    <ul class="dropdown-menu">
                                        <li :style="AnnounOgj.typeRent =='Длительно' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectRent" class="cursor-pointer dropdown-item">
                                            Длительно
                                        </li>
                                        <li :style="AnnounOgj.typeRent =='Несколько месяцев' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectRent" class="cursor-pointer dropdown-item">
                                            Несколько месяцев
                                        </li>
                                        <li :style="AnnounOgj.typeRent =='Посуточно' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectRent" class="cursor-pointer dropdown-item">
                                            Посуточно
                                        </li>
                                    </ul>
                                </div>
                            </div>

                             <div class="add-segment" v-if="AnnounOgj.typeRent || AnnounOgj.rent == 'Продажа'">
                                    <div class="field__name fs-7">Тип недвижимости</div>
                                <div class="btn-group">
                                    <button class="field_name real_estate btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ AnnounOgj.typeRent == 'Посуточно' ? 'Жилая' :'Не выбранно' && AnnounOgj.Estate ? AnnounOgj.Estate: 'Не выбранно' }}
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li :style="AnnounOgj.Estate =='Жилая' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectEstate" class="dropdown-item">
                                            Жилая
                                        </li>
                                        <li :style="AnnounOgj.Estate == 'Коммерческая' ? `background-color:#43E9FF;font-weight:bold;`:''" @click="selectEstate" v-if="AnnounOgj.typeRent !== 'Посуточно'" class="dropdown-item">
                                            Коммерческая
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="add-segment" v-if="AnnounOgj.rent == 'Аренда' && AnnounOgj.typeRent == 'Посуточно'">
                                    <div class="field__name fs-7">Объект</div>
                                <div class="btn-group">
                                    <button class="object field_name  btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{AnnounOgj.objects == 'Посуточно' ? 'typeObject.objects' :'Не выбранно' || AnnounOgj.objects ? AnnounOgj.objects: 'Не выбранно'}}
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li :style="AnnounOgj.objects.trim() =='Квартира' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectObject" class="dropdown-item">
                                            Квартира
                                        </li>
                                        <li :style="AnnounOgj.objects.trim() =='Комната' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectObject" class="dropdown-item">
                                            Комната
                                        </li>
                                        <li :style="AnnounOgj.objects.trim() =='Дом' ? `background-color: #43E9FF;font-weight:bold;`:''" @click="selectObject" class="dropdown-item">
                                            Дом
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <div class="containers objects fs-6"  v-if=" AnnounOgj.Estate && AnnounOgj.typeRent !== 'Посуточно'">
                                <div class="field__name fw-bold fs-7 ms-3 ">
                                    Объект
                                </div>
                                <div class="all__contents" v-if="AnnounOgj.Estate == 'Жилая'">

                                    <div class="field__content">
                                        <div class="type-radio">
                                            <label for="label1">Квартира</label>
                                            <input :checked="AnnounOgj.objects == `Квартира`" name="house" data-name="Квартира" type="radio" @change="selectObjectFromSale"  id="label1">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label2">Квартира в Новостройке</label>
                                            <input :checked="AnnounOgj.objects == `Квартира в Новостройке`" name="house" data-name="Квартира в Новостройке" type="radio" @change="selectObjectFromSale"  id="label2">
                                        </div>

                                        <div class="type-radio">
                                            <label for="label3">Комната</label>
                                            <input :checked="AnnounOgj.objects == `Комната`" name="house" data-name="Комната" type="radio" @change="selectObjectFromSale"  id="label3">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label5">Доля в Квартире</label>
                                            <input :checked="AnnounOgj.objects == `Доля в Квартире`" name="house" data-name="Доля в Квартире" type="radio" @change="selectObjectFromSale" id="label5">
                                        </div>
                                    </div>

                                <div class="field__content">
                                    <div class="type-radio">
                                        <label for="label6">Дом/Дача</label>
                                        <input :checked="AnnounOgj.objects == `Дом/Дача`" name="house" data-name="Дом/Дача" type="radio" @change="selectObjectFromSale"  id="label6">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label7">Коттедж</label>
                                        <input :checked="AnnounOgj.objects == `Коттедж`" name="house" data-name="Коттедж" type="radio" @change="selectObjectFromSale"  id="label7">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label9">Часть дома</label>
                                        <input :checked="AnnounOgj.objects == `Часть дома`" name="house" data-name="Часть дома" type="radio" @change="selectObjectFromSale"  id="label9">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label10">Участок</label>
                                        <input :checked="AnnounOgj.objects == `Участок`" name="house" data-name="Участок" type="radio" @change="selectObjectFromSale" id="label10">
                                    </div>
                                </div>
                                </div>

                                <!-- ---------- -->

                                <div class="field__content" v-if="AnnounOgj.Estate == 'Коммерческая'">
                                        <div class="type-radio">
                                            <label for="label1">Офис</label>
                                            <input :checked="AnnounOgj.objects == `Офис`" data-name="Офис" @change="selectObjectFromSale" name="commercial" type="radio"  id="label1">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label2">Здание</label>
                                            <input :checked="AnnounOgj.objects == `Здание`" data-name="Здание" @change="selectObjectFromSale" name="commercial" type="radio"  id="label2">
                                        </div>

                                        <div class="type-radio">
                                            <label for="label3">Торговая площадь</label>
                                            <input :checked="AnnounOgj.objects == `Торговая площадь`" data-name="Торговая площадь"
                                             @change="selectObjectFromSale" name="commercial" type="radio"  id="label3">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label5">Коммерческая земля</label>
                                            <input :checked="AnnounOgj.objects == `Коммерческая земля`" data-name="Коммерческая земля" @change="selectObjectFromSale" name="commercial" type="radio" id="label5">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label6">Склад</label>
                                            <input :checked="AnnounOgj.objects == `Склад`" data-name="Склад" @change="selectObjectFromSale" name="commercial" type="radio" id="label6">
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>

<style scoped>

.accordion-button{
    padding: 5px;
    /* border: none; */
    outline: none;
    min-width: 180px;
}
.accordion-botton:focus{
    border-color:red;
}
.accordion-body{
    padding: 0;
}

.accordion-body > ul {
    list-style: none;
    display: inline-block;
}

.accordion-body > ul > li{
    font-size: 14px;
    display: block;
    position: relative;
    padding: 7px 40px 7px 0px;
    color: rgba(34,34,34,.75);
    font-weight: 700;
    margin-top: 3px;
    cursor: pointer;
}
    
.content{
    background-color: rgb(244, 244, 244);
    /* position: absolute; */
    top: 50px; 
    display: flex;
    flex-direction: column;
    flex: 1 0 auto;
    min-height: 100vh;
}
.add-form{
    width: 100%;
    margin: 0 auto;
    color: #121212;
    font-weight: 400;
    font-size: 14px;
    line-height: 1.3;
    font-family: Lato, sans-serif;
}
.add-form_header--mobele{
    margin-bottom: 32px;
    width: 100%;
    padding: 30px 42px;
}
.add-form__title{
    font-weight: 700;
    font-size: 27px;
    line-height: 36px;
}
.add-form__text{
    font-size: 16px;
    line-height: 24px;
}
.add-form__body{
    display: flex;
    position: relative;
    border-radius: 2px;
    margin: 10px;
    /* background-color: #000; */
}

.add-form__main{
    background-color: white;
    position: relative;
    flex-shrink: 0;
    width: 100%;
    display: block;
}
.form-select{
    height: min-content;
    border-radius: 4px;
    color: #505152;
    max-width: max-content;
    font-size: 14px;
    padding-top: 3px;
    background-color: transparent;
    padding-bottom: 3px;
    transition: background-color .4s, color .4s ease-in-out;
}
.form-select>.option{
    color: black;
    font-size: 14px;
    background-color: transparent;
}
.containers{
    margin:20px 0;
}
.add-segment{
    margin: 20px 15px;
}
.field__name{
    margin-bottom: 8px;
    flex-shrink: 0;
    padding-top: 6px;
    font-size: 16px;
    width: 180px;
    font-size: 14px;
    font-family: Lato,sans-serif;
    font-weight: 400;
    line-height: 1.3;
}
.all__contents{
    display: flex;
    align-items: flex-start;

}

.objects{
    display: flex;
    flex-direction: column;
}
.field__content{
    display: flex;
    padding: 10px;
    /* margin: auto; */
    flex-direction: column;
}
.type-radio{
    display: flex;
    justify-content: start;
    flex-direction: row-reverse;
}

.type-radio >label{
    margin: 8px;
}
</style>
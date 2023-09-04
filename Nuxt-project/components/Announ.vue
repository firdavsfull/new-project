

<script setup>
    function changeText(){
        const item = document.querySelectorAll('.dropdown-menu > .item');
        for (let i = 0; i < item.length; i++) {
            
            
        }
    }
    definePageMeta({
        layout:"custom"
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
                                <div class="field__name fs-7 ">Тип аккаунта</div>
                                    <div class="btn-group">
                                        <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Не выбранно
                                        </button>
                                    
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">
                                                Агент
                                            </li>
                                            <li class="dropdown-item">
                                                Собственник
                                            </li>
                                        </ul>
                                </div>
                            </div>
                                

                            <div class="add-segment">
                            <div class="field__name fs-7">Тип сделки</div>
                                <div class="btn-group">
                                    <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Не выбранно
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li @click="changeText" class="dropdown-item item">
                                            Аренда
                                        </li>
                                        <li @click="changeText" class="dropdown-item item">
                                            Продажа
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="add-segment">
                                    <div class="field__name fs-7">Тип аренды</div>
                                <div class="btn-group">
                                    <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Не выбранно
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            Длительно
                                        </li>
                                        <li class="dropdown-item">
                                            Несколько месяцев
                                        </li>
                                        <li class="dropdown-item">
                                            Посуточно
                                        </li>
                                    </ul>
                                </div>
                            </div>


                             <div class="add-segment">
                                    <div class="field__name fs-7">Тип недвижимости</div>
                                <div class="btn-group">
                                    <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Не выбранно
                                    </button>
                                
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            Жилая
                                        </li>
                                        <li class="dropdown-item">
                                            Коммерческая
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="add-segment">
                                    <div class="field__name fs-7">Объект</div>
                                <div class="btn-group">
                                    <button class="field_name btn btn-light border btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Не выбранно
                                    </button>
                                
                                    <ul class="dropdown-menu ">
                                        <li class="dropdown-item">
                                            Квартира
                                        </li>
                                        <li class="dropdown-item">
                                            Комната
                                        </li>
                                        <li class="dropdown-item">
                                            Дом
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <div class="containers objects fs-6">
                                <div class="field__name fw-bold fs-7 ms-3 ">
                                    Объект
                                </div>
                                <div class="all__contents">

                                    <div class="field__content">
                                        <div class="type-radio">
                                            <label for="label1">Квартира</label>
                                            <input type="radio" @click="navigateTo('/map')"  id="label1">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label2">Квартира в Новостройке</label>
                                            <input type="radio" @click="navigateTo('/map')"  id="label2">
                                        </div>

                                        <div class="type-radio">
                                            <label for="label3">Комната</label>
                                            <input type="radio" @click="navigateTo('/map')"  id="label3">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label5">Доля в Квартире</label>
                                            <input type="radio" @click="navigateTo('/map')" id="label5">
                                        </div>
                                    </div>
                                <!-- Коммерческая тип недвижимости -->


                                    <!-- <div class="field__content">
                                        <div class="type-radio">
                                            <label for="label1">Офис</label>
                                            <input type="radio"  id="label1">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label2">Здание</label>
                                            <input type="radio"  id="label2">
                                        </div>

                                        <div class="type-radio">
                                            <label for="label3">Торговая площадь</label>
                                            <input type="radio"  id="label3">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label5">Коммерческая земля</label>
                                            <input type="radio" id="label5">
                                        </div>
                                        <div class="type-radio">
                                            <label for="label5">Склад</label>
                                            <input type="radio" id="label5">
                                        </div>
                                    </div> -->

                                <div class="field__content">
                                    <div class="type-radio">
                                        <label for="label6">Дом/Дача</label>
                                        <input type="radio" @click="navigateTo('/map')"  id="label6">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label7">Коттедж</label>
                                        <input type="radio" @click="navigateTo('/map')"  id="label7">
                                    </div>

                                    <div class="type-radio">
                                        <label for="label8">Таунхаус</label>
                                        <input type="radio" @click="navigateTo('/map')"  id="label8">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label9">Часть дома</label>
                                        <input type="radio" @click="navigateTo('/map')"  id="label9">
                                    </div>
                                    <div class="type-radio">
                                        <label for="label10">Участок</label>
                                        <input type="radio" @click="navigateTo('/map')" id="label10">
                                    </div>
                                </div>
                                </div>

                                <!-- ---------- -->
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

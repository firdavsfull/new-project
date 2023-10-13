<template>
    <div>
        <ul  style="margin:0; padding:0; box-sizing:border-box;">
            <li style="margin-top:10px" >
                <ul class="form-check" style="paddong:0;" >
                    <li style="list-style:none; padding:4px 0; margin:0; " >
                        <label for="check1" class="my-[5px] form-check-label">
                            <input class="form-check-input" id="check1" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Квартира в новостройке</span>
                        </label>
                        <label for="check2" class="my-[5px] ">
                            <input id="check2" class="form-check-input" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Квартира во вторичке</span>
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="form-check" style="paddong:0;">
                    <li style="list-style:none; padding:4px 0">
                        <label for="check3">
                            <input id="check3" class="form-check-input" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Комната</span>
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="form-check" style="paddong:0;">
                    <li class="flex flex-col" style="list-style:none; padding:4px 0">
                        <label for="check4" class="mt-[5px]">
                            <input id="check4" class="form-check-input" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Дом, дача</span>
                        </label>
                        <label for="check5" class="mt-[5px]">
                            <input id="check5" class="form-check-input" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Часть дома</span>
                        </label>
                        <label for="check6" class="mt-[5px]">
                            <input id="check6" class="form-check-input" name="radio" type="radio">
                            <span style="font-size:15px; font-weight:normal;">Участок</span>
                        </label>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>
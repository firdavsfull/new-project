<template>
  <div class="mt-[26px]">
    <div class="px-[8px]">
      <div class="dropup  border" style="width: 100%">
        <button
          class="btn w-100 select focus:border-0"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
        <div class="flex">
          <span v-for="(name,i) of text" :key="i">
            {{ name +'&nbsp;'}}
            
          </span>
          <span v-if="!text.length" class="block  w-full text-center">Выберите тип дома</span>
        </div>
        </button>
        <ul
          class="dropdown-menu mt-[10px] w-100 rounded-0"
          aria-labelledby="dropdownMenuButton1"
        >
          <li
            v-for="(item,index) of items"
            :key="index"
            class="dropdown-item"
            style="display: flex; justify-content: space-between"
            >
            <label :for="index + 1" style="width: 100%">{{item.label}}</label>
            <input
              v-model="item.checked"
              type="checkbox"
              name="check"
              :id="index + 1"
              @change="check"
            />
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script setup>
const route = useRoute();
const saveText = ref('');
const items = ref([
      { name: 'check1', label: 'Квартира', checked: true },
      { name: 'check2', label: 'Комната', checked: false },
      { name: 'check3', label: 'Дом/дача', checked: false },
      { name: 'check4', label: 'Коттедж', checked: false },
      { name: 'check5', label: 'Часть дома', checked: false },
      { name: 'check6', label: 'Участок', checked: false },
])
const text = ref([]);

const selectedItems = items.value
        .filter((item) => item.checked)
        .map((item) => item.label);

      text.value = selectedItems.slice();

      props.filter.typeObject = text.value;
      sessionStorage.setItem('filter', JSON.stringify(props.filter));
      if (props.filter.typeObject.length && props.filter.typeObject.indexOf('Квартира') !== -1) {
        props.uploadQuantityRoom(true)
      }else{
        props.uploadQuantityRoom(false)
      }
const props = defineProps({
  filter:Object,
  updateData:Function,
  loader:Boolean,
  updateLoader:Function,
  uploadQuantityRoom:Function

});

  
    // props.uploadQuantityRoom(false)
    async function check(event) {
    if (event.target.name == "check") {
      const selectedItems = items.value
        .filter((item) => item.checked)
        .map((item) => item.label);

      text.value = selectedItems.slice();

      props.filter.typeObject = text.value;
      sessionStorage.setItem('filter', JSON.stringify(props.filter));
      
      if (props.filter.typeObject.length && props.filter.typeObject.indexOf('Квартира') !== -1) {
        props.uploadQuantityRoom(true)
      }else{
        props.uploadQuantityRoom(false)
      }
    props.updateLoader(true)
  await fetch("http://192.168.0.116:8000/api/filter", {
    method: "post",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(route.query),
  })
    .then((res) => res.json())
    .then((res) => {
        props.updateData(res)
        console.log(res);
    });
  props.updateLoader(false)
  }
}
</script>
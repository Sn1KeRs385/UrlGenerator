<script setup>
import {ref} from 'vue'

const originUrl = ref(null)
const hasExpired = ref(false)
const expiredAt = ref(
    new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)
        .toISOString()
        .replace(/:\w+.\w+Z/, '')
)
const statUrl = ref(null)
const shortUrl = ref(null)
const errorFromServer = ref(null)

const sendData = () => {
    statUrl.value = null;
    shortUrl.value = null;
    errorFromServer.value = null;

    let data = {
        'origin_url': originUrl.value,
    }
    if (hasExpired.value) {
        const date = new Date(expiredAt.value)
        console.log(data)
        console.log(date.getTimezoneOffset());
        data.expired_at = new Date(expiredAt.value).getTime() / 1000
    }
    axios.post('/api/v1/urls', data)
        .then(response => {
            statUrl.value = response?.data?.data?.stat_url;
            shortUrl.value = response?.data?.data?.short_url;
        })
        .catch(error => {
            errorFromServer.value = error.response.data
        })
}
</script>

<template>
    <form v-bind="$attrs" class="flex flex-col" @submit.prevent="sendData">
        <div class="font-bold">
            Введите ссылку для укорачивания
        </div>
        <input type="text" v-model="originUrl" class="bg-gray-900 mt-8 py-10 px-15 rounded-10 w-full">
        <fieldset class="border-1 border-gray-900 p-8 rounded-10 mt-10">
            <legend class="ml-10">Дата окончания действия ссылки</legend>
            <div class="flex flex-row items-center gap-x-8">
                <input type="checkbox" v-model="hasExpired">
                <div> Включить</div>
            </div>
            <div v-if="hasExpired">
                <div class="mt-15">Введите дату, когда ссылка перестанет работать</div>
                <input v-model="expiredAt" type="datetime-local" class="mt-8 bg-gray-900 py-10 px-15 w-full">
            </div>
        </fieldset>
        <button
            :disabled="!originUrl"
            class="mt-10 rounded-10 py-10 w-full bg-gray-400 text-state-400 font-bold"
            :class="{'cursor-not-allowed': !originUrl, 'opacity-50': !originUrl}"
        >
            Уменьшить
        </button>
        <fieldset v-if="shortUrl" class="border-1 border-gray-900 p-8 rounded-10 mt-30">
            <legend class="ml-10">Ссылки</legend>
            <div v-if="shortUrl">Короткая ссылка: <a :href="shortUrl" target="_blank">{{ shortUrl }}</a></div>
            <div v-if="statUrl">Ссылка для просмотра статистики: <a :href="statUrl" target="_blank">{{ statUrl }}</a>
            </div>
        </fieldset>
        <fieldset v-if="errorFromServer" class="border-1 border-gray-900 p-8 rounded-10 mt-30">
            <legend class="ml-10">Ошибка</legend>
            <div><b>Мне лень это все парсить и красиво делать, я просто выведу это тут</b></div>
            <div>{{ errorFromServer }}</div>
        </fieldset>
    </form>
</template>

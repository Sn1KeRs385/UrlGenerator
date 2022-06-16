require('./bootstrap')

import {createApp} from 'vue'

import UrlCreateFormComponent from './components/urls/UrlCreateFormComponent'

const app = createApp({})
app.component('url-create-form-component', UrlCreateFormComponent)
app.mount("#app")

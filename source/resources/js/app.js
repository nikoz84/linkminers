require('./bootstrap')
import Vuelidate from 'vuelidate'
window.Vue = require('vue')
Vue.use(Vuelidate)

Vue.component('department-form', () => import('./components/DepartmentForm.vue'))
Vue.component('pagination-partials', () => import('./components/PaginationPartials.vue'))
Vue.component('department-table', () => import('./components/DepartmentTable.vue'))
Vue.component('show-department', () => import('./components/ShowDepartment.vue'))

const app = new Vue({
    el: '#app'
})




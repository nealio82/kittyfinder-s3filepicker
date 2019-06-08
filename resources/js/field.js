Nova.booting((Vue, router, store) => {
    Vue.component('index-s3-filepicker', require('./components/IndexField'))
    Vue.component('detail-s3-filepicker', require('./components/DetailField'))
    Vue.component('form-s3-filepicker', require('./components/FormField'))
})

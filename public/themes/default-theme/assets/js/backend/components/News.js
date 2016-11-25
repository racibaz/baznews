var vm = new Vue({

    http: {
        root: '/root',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#_token').getAttribute('value')
        }
    },
    el: '#news_photos_store',

    data: {
        input: {
            news_id: '',
            photos_ids: []
        }
    },
    methods: {
        newsPhotosStore: function () {
            this.$http.post('http://baznews.app/admin/news/news.news_photos_store', this.input)

        }
    },
    ready: function () {
        this.newsPhotosStore()
    }

});
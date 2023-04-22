new Vue({
    el: '#MainContent',
    data: {
        // postId: {{$id}},
        dataPost: {}
    },
    created() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios.get('/test/showbaiviet/' + this.postId)
                .then((res) => {
                    if (res.data.status) {
                        this.dataPost = res.data.data;
                    }
                });
        },

    }
});

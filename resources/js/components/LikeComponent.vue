<template>
    <div class="container">
        <div id="success" class="mb-3"></div>

        <a style="cursor: pointer" @click.prevent="likePost">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
            ({{ alllikes }})
        </a>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                alllikes: '',
            }
        },
        methods: {
            likePost() {
                axios.post('/like/' + this.post, {
                        post: this.post
                    })
                    .then(res => {
                        this.renderLike()
                        $('#success').html(res.data.message)
                    })
                    .catch()
            },
            renderLike() {
                axios.post('/like', {
                        post: this.post
                    })
                    .then(res => {
                        console.log(res.data.post.like)
                        this.alllikes = res.data.post.like
                    })
            }
        },
        mounted() {
            this.renderLike()
        }
    }

</script>
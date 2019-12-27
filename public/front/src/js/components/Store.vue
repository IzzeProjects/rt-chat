<template>
    <div>
        <div class="posts" >
            <div v-for="post in allPosts" :key="post.id">
                {{post.title}}
            </div>
            <input type="text" @keydown.enter="sendMessage" v-model='message'>
        </div>
    </div>
</template>

<script>
    import {createNamespacedHelpers} from 'vuex'
    import io from 'socket.io-client'
    const {mapGetters, mapActions} = createNamespacedHelpers('storeModule')

    export default {
        name: "Store",
        computed: mapGetters(['allPosts']),
        data() {
            return {
                message: '',
                socket: null
            }
        },
        methods: {
            ...mapActions(['fetchPosts']),
            sendMessage() {
                this.socket.emit('example', {data: {message: this.message}})
            }
        },
        mounted() {
            this.fetchPosts()
            this.socket = io.connect('ws://192.168.88.253:9501', {transports: ['websocket']});
            this.socket.on('message', function (socket) {
                console.log(socket)
            })
        },

    }
</script>

<style scoped>
    .posts {
        display: flex;
    }

    .posts div {
        border: 1px solid #fff;
        padding: 10px;
    }
</style>


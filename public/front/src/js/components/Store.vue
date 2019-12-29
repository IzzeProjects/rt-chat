<template>
    <div>
        <div class="posts" >
            <div v-for="post in allPosts" :key="post.id">
                {{post.title}}
            </div>
            <input type="text" @keydown.enter="sendMessage" v-model='message'>
            <ul>
                <li v-for="item in messages">{{item}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {createNamespacedHelpers} from 'vuex'
    import io from 'socket.io-client'
    const {mapGetters, mapActions} = createNamespacedHelpers('storeModule')

    export default {
        props: {
            user: String
        },
        name: "Store",
        computed: {
            ...mapGetters(['allPosts']),
            userParsed: function () {
                return JSON.parse(this.user)
            }
        },
        data() {
            return {
                message: '',
                socket: null,
                messages: []
            }
        },
        methods: {
            ...mapActions(['fetchPosts']),
            sendMessage() {
                this.socket.emit('example', this.message)
            }
        },
        mounted() {
            this.fetchPosts()
            const url = new URL('ws://rt-chat.local/:9501')
            console.log(this.userParsed)
            Object.keys(this.userParsed).forEach(item => {
                url.searchParams.set(item, this.userParsed[item])
            })
            console.log(url.href)
            this.socket = io.connect('ws://rt-chat.local:9501', {transports: ['websocket'], fdfdf: 'test'});
            this.socket.on('message', (socket) => {
                this.messages.push(socket)
                console.log(socket)
            })


            console.log()

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


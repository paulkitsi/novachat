<script setup>

import {Avatar, AvatarImage, AvatarFallback} from "@/Components/ui/avatar/index.js";
import {Plus, SendHorizontal} from 'lucide-vue-next';
import {Button} from '@/components/ui/button'
import {Input} from '@/components/ui/input'
import {onMounted,} from "vue";
import {useForm, usePage} from "@inertiajs/vue3";

//accept props
const props = defineProps({
    chat: Object,
});

const user = usePage().props.auth.user

//initialize messages
const messages = props.chat.messages

const form = useForm({
    content: '',
    user_id: user.id,
    chat_id: props.chat.id
})

// const messageRef = ref('')

const chatBubbleStyle = message => {
    return message.user_id === usePage().props.auth.user.id
        ? 'bg-green-800 text-white justify-self-end ml-6'
        : 'bg-gray-200 text-gray-900 mr-6';
}
const scrollToLastChatBubble = () => {
    const lastChatBubble = document.getElementById('lastChatBubble')
    lastChatBubble.scrollIntoView({behavior: 'smooth'})
}
const sendMessage = () => {
    messages.push(form.data())

    form.post(route('messages.store', form.chat_id), {
        onSuccess: (e) => {
            console.log(e)
            scrollToLastChatBubble()
        }
    })

    form.content = ''
}

onMounted(() => {
    scrollToLastChatBubble()
})


</script>

<template>
    <div class="bg-white shadow flex flex-col">

        <!--chat header-->
        <section class="p-4">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <Avatar>
                        <AvatarImage src="https://github.com/radix-vue.png" alt="@radix-vue"/>
                        <AvatarFallback>CN</AvatarFallback>
                    </Avatar>
                    <div class="flex flex-col ml-2">
                        <span class="font-semibold">{{ user.name }}</span>
                        <span class="text-sm text-gray-500 -mt-1">{{ user.email }}</span>
                    </div>
                </div>

                <!-- button-->
                <div>
                    <Button variant="outline" size="icon" class="rounded-full">
                        <Plus class="w-4 h-4"/>
                    </Button>
                </div>
            </div>
        </section>

        <!--  message section-->
        <section class="p-4 flex flex-col flex-1 overflow-auto no-scrollbar" id="scrollWindow">
            <div v-for="(message, i) in messages"
                 :key="message.id"
                 class="mb-2 grid"
            >
                <div class="p-2 bg-gray-100 overscroll-auto no-scrollbar rounded-lg w-fit"
                     :class="chatBubbleStyle(message)"
                     :id="`${i === messages.length - 1 ? 'lastChatBubble' : ''}`"
                >
                    <p class="text-sm leading-tight">{{ message.content }}</p>
                </div>

            </div>
        </section>

        <!-- input section-->
        <section class="p-4">
            <form @submit.prevent="sendMessage">
                <div class="flex w-full items-center gap-1.5">
                    <Input placeholder="Message..." class="flex-1" v-model="form.content"/>
                    <Button type="submit" :disabled="form.content === ''">
                        <SendHorizontal/>
                    </Button>
                </div>
            </form>
        </section>
    </div>
</template>

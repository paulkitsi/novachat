<script setup>

import {Avatar, AvatarImage, AvatarFallback} from "@/Components/ui/avatar/index.js";
import { Plus, SendHorizontal } from 'lucide-vue-next';
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'

//accept props
const props = defineProps({
    chat: Object,
});
console.log(props.chat);

</script>

<template>
    <div class="bg-white shadow flex flex-col">

        <!--        chat header-->
        <section class="p-4">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <Avatar>
                        <AvatarImage src="https://github.com/radix-vue.png" alt="@radix-vue" />
                        <AvatarFallback>CN</AvatarFallback>
                    </Avatar>
                    <div class="flex flex-col ml-2">
                        <span class="font-semibold">Radix Vue</span>
                        <span class="text-sm text-gray-500 -mt-1">@radix-vue</span>
                    </div>
                </div>

<!--                button-->
                <div>
                    <Button variant="outline" size="icon" class="rounded-full">
                        <Plus class="w-4 h-4" />
                    </Button>
                </div>
            </div>
        </section>

        <!--        message section-->
        <section class="p-4 flex-1">
            <div v-for="message in chat.messages" :key="message.id">
                {{message.content}}
            </div>
        </section>

        <!--        input section-->
        <section class="p-4">
            <div class="flex w-full items-center gap-1.5">
                <Input id="email" type="email" placeholder="Email" class="flex-1"/>
                <Button type="submit">
                    <SendHorizontal />
                </Button>
            </div>
        </section>
    </div>
</template>

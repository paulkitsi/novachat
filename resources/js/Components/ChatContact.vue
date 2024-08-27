<script setup>

import {Avatar, AvatarFallback, AvatarImage} from "@/Components/ui/avatar/index.js";
const props = defineProps({
    chat: Object,
});

</script>

<template>
    <div class="flex justify-between bg-gray-100  p-2 rounded-lg">
        <div class="flex items-center">
            <Avatar class="h-[40px] w-[40px]">
                <AvatarImage src="https://github.com/radix-vue.png" alt="@radix-vue"/>
                <AvatarFallback>CN</AvatarFallback>
            </Avatar>
            <div class="flex flex-col ml-2">
                <span class="text-sm font-semibold">Radix Vue</span>
                <span class="text-xs text-gray-500 -mt-1">Message preview</span>
            </div>
        </div>

        <div class="flex flex-col justify-center items-end">
            <p class="text-xs text-gray-500">2:30 PM</p>
            <!--                                    <Badge class="text-xs bg-green-500 border-0">2</Badge>-->

        </div>
    </div>
</template>

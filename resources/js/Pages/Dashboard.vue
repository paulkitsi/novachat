<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {Plus} from 'lucide-vue-next'
import ConversationScreen from "@/Components/ConversationScreen.vue";
import {
    ResizableHandle,
    ResizablePanel,
    ResizablePanelGroup,
} from '@/components/ui/resizable'
import ChatSearch from "@/Components/ChatSearch.vue";
import {Button} from "@/Components/ui/button/index.js";
import ChatContact from "@/Components/ChatContact.vue";

// props
const props = defineProps({
    chats: Array,
});

</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <ResizablePanelGroup direction="horizontal" class=" rounded-lg border max-h-[600px] min-h-[600px]">
                    <ResizablePanel :default-size="25">
                        <div class="h-full bg-white dark:bg-gray-800 p-4">

                            <div class="flex justify-between items-center">
                                <h2 class="font-black text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                                    Chats
                                </h2>
                                <Button variant="ghost" size="icon" class="rounded-full">
                                    <Plus class="w-4 h-4"/>
                                </Button>
                            </div>

                            <ChatSearch class="mb-4"/>

                            <div class="space-y-1">
                                <ChatContact v-for="chat in chats" :id="chat.id" :chat="chat"/>
                            </div>
                        </div>
                    </ResizablePanel>
                    <ResizableHandle with-handle/>
                    <ResizablePanel>
                        <ConversationScreen :chat="chats[0]" class="h-full"/>
                    </ResizablePanel>
                </ResizablePanelGroup>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

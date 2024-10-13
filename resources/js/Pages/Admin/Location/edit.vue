
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm,Link,router } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
    data:Object
})
const form= useForm({
    name:''
})

onMounted(()=>{
    form.name = props.data.name
})

const submit = (data)=> {
    form.patch(route('location.update',data),{
        onFinish: function(){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });
        },
        preserveScroll:true

    })

}

const destroy = (id)=>{
            Swal.fire({
                title: 'دڵنیای لە سڕینەوەی',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بەڵی',
                cancelButtonText: 'نەخێر'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'سڕایەوە!',
                    'دەیتاکە بەسەرکەوتووی سڕایەوە',
                    'success'
                    )
                    router.delete(route('location.destroy',id), { preserveScroll: true });

                    // router.delete(`/invoiceDestroy/${id}`, { preserveScroll: true });
                }
                })

        }

</script>
<template>
    <Head title="Admin"/>

    <AdminLayout>
        <div class="min-w-[720px] mx-auto">


            <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
               <div>
                   <h3 class="text-lg font-semibold text-slate-800">نوێکردنەوە </h3>
               </div>
               <div class="relative mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">


                    <form @submit.prevent="submit(data)">
                        <div>

                            <TextInput
                                id="name"
                                type="text"
                                class=""
                                v-model="form.name"
                                autofocus
                                autocomplete="name"
                            />

                            <button class="bg-green-600 rounded-md px-4 mx-2 h-10 text-white font-bold"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing" >زیادکردن</button>
                        </div>
                        <InputError class="mt-2  text-xs" :message="form.errors.name" />
                    </form>



               </div>
               </div>





       </div>
    </AdminLayout>
</template>

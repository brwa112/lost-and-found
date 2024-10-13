
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm,Link,router } from '@inertiajs/vue3';

const props = defineProps({
    data:Array,
    city:Array
})
const form= useForm({
    name:'',
    city_id: props.city.length > 0 ? props.city[0].id : null,
})

const submit = ()=> {
    form.post(route('location.store'),{
        onSuccess: ()=>  {
            form.reset()
            Swal.fire({
            position: "top-middle",
            icon: "success",
            title: "کارەکەت بە سەرکەوتوی ئەنجامدرا",
            showConfirmButton: false,
            timer: 1500
        });
        },
        // onSuccess: () => ,
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
        <div class="bg-white my-4 p-2 rounded-md">
            <form @submit.prevent="submit" class="text-sm w-full flex gap-x-3">

                <div>

                    <TextInput
                        id="name"
                        type="text"
                        class=""
                        v-model="form.name"
                        placeholder="ناو"
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2  text-xs" :message="form.errors.name" />
                </div>
                <div>

                    <select v-model="form.city_id">
                        <option v-for="(row, index) in city" :key="index" :value="row.id" >{{ row.name }}</option>
                    </select>
                    <InputError class="mt-2  text-xs" :message="form.errors.city" />
                </div>
                    {{ form.city }}
                    <button class="bg-green-600 rounded-md px-4 h-10 text-white font-bold"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing" >زیادکردن</button>


            </form>
           </div>
        <div class="min-w-[720px] mx-auto">
           <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
               <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                   <div class="flex items-center justify-between ">
                       <div>
                           <h3 class="text-lg font-semibold text-slate-800">شارەکان </h3>
                       </div>

                   </div>

               </div>

               <div class="p-0">
                   <table class="w-full mt-4 text-left table-auto min-w-max">
                   <thead>
                       <tr>
                       <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                           <p
                           class="flex items-center justify-between gap-2 font-sans text-sm  leading-none text-slate-500">
                           #
                           </p>
                       </th>
                       <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                           <p
                           class="flex items-center justify-between gap-2 font-sans text-sm  leading-none text-slate-500">
                            ناوی شوێن
                           </p>
                       </th>
                       <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                           <p
                           class="flex items-center justify-between gap-2 font-sans text-sm  leading-none text-slate-500">
                            ناوی شار
                           </p>
                       </th>


                       <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                           <p

                           class="flex items-center justify-between gap-2 font-sans text-sm   leading-none text-slate-500">

                           </p>
                       </th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr v-for="(row, index) in data" :key="index">
                            <td class="p-4 border-b border-slate-200">
                                <div class="flex items-center gap-3">
                                    {{ index+1 }}
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <div class="flex items-center gap-3">
                                    {{ row.name }}
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <div class="flex items-center gap-3">
                                    {{ row.cities.name }}
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200 flex justify-end gap-x-4">
                                    <Link :href="route('location.edit',row.id)" class="bg-blue-600/50 p-2 rounded-md size-9 flex items-center justify-center">
                                        <i class="fa-solid fa-pen-to-square text-blue-600 text-xl"></i>
                                    </Link>

                                    <button @click="destroy(row.id)" class="bg-red-600/50 p-2 rounded-md size-9 flex items-center justify-center">
                                        <i class="fa-solid fa-trash-xmark text-red-600 text-xl"></i>
                                    </button>
                            </td>
                       </tr>


                   </tbody>
                   </table>
               </div>
               <div class="flex items-center justify-between p-3">
                   <p class="block text-sm text-slate-500">
                   Page 1 of 10
                   </p>
                   <div class="flex gap-1">
                   <button
                       class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                       type="button">
                       Previous
                   </button>
                   <button
                       class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                       type="button">
                       Next
                   </button>
                   </div>
               </div>
               </div>





       </div>
    </AdminLayout>
</template>

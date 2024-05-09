<template>
  <div>
    <Head title="Produkty" />
    <h1 class="mb-8 text-3xl font-bold">Produkty</h1>

    <form @submit.prevent="store" enctype=“multipart/form-data”>
      <div class="bg-white rounded-md shadow overflow-x-auto p-8">
        <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" for="import">Zaimportuj
          produkty</label>
        <file-input v-model="form.file" :error="form.errors.file" class="pb-2 pr-6 w-full lg:w-1/2" type="file"
                    accept="xls/*" label="" />
        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Tylko XLS ( MAX. 2MB ).</p>
      </div>
      <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
        <loading-button :loading="form.processing" class="btn-indigo" type="submit">Importuj</loading-button>
      </div>
    </form>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import LoadingButton from '../../Shared/LoadingButton.vue'
import FileInput from '../../Shared/FileInput.vue'

export default {
  components: {
    FileInput,
    LoadingButton,
    Head,
    Link,
  },
  layout: Layout,
  props: {
    filters: Object,
    products: Array,
  },
  // remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        file: null,
      }),

    }
  },
  methods: {
    store() {
      this.form.post('/products/import')
    },
  },
}
</script>

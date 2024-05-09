<template>
  <div>
    <Head title="Produkty" />
    <h1 class="mb-8 text-3xl font-bold">Produkty</h1>

    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset"></search-filter>
    </div>

    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Nazwa produktu</th>
          <th class="pb-4 pt-6 px-6">Producent</th>
          <th class="pb-4 pt-6 px-6">Jednostki zakupu</th>
        </tr>
        <tr v-for="item in products" :key="item.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            {{ item.nazwa_produktu }}
          </td>
          <td class="border-t">
            {{ item.producent }}
          </td>
          <td class="border-t">
            {{ item.jednostki_zakupu }}
          </td>
        </tr>
        <tr v-if="products.length === 0">
          <td class="px-6 py-4 border-t" colspan="2">Nie znaleziono produktów.</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import SearchFilter from '@/Shared/SearchFilter.vue'
import LoadingButton from '../../Shared/LoadingButton.vue'
import FileInput from '../../Shared/FileInput.vue'

export default {
  components: {
    FileInput,
    LoadingButton,
    Head,
    Icon,
    Link,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    products: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        search: this.filters.search,
      }),

    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function() {
        this.$inertia.get('/products', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>

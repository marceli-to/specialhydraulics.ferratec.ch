<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div :class="isFetched && isFetchedCategories ? 'is-loaded' : 'is-loading'">
    <header class="content-header">
      <h1>Produkte</h1>
      <router-link :to="{ name: 'product-create' }" class="feather-icon feather-icon--prepend">
        <plus-icon size="16"></plus-icon>
        <span>Hinzufügen</span>
      </router-link>
    </header>
    <div class="listing" v-if="products.length">
      <draggable 
        :disabled="false"
        v-model="products" 
        @end="order()"
        ghost-class="draggable-ghost"
        draggable=".listing__item">
        <div
          :class="[p.publish == 0 ? 'is-disabled' : '', 'listing__item is-draggable']"
          v-for="p in products"
          :key="p.id"
        >
          <div class="listing__item-body">
            {{ p.title }}
            <div v-if="p.diameter.de">
              <!-- <separator v-if="p.diameter.de" /> 
              {{ p.diameter.de }} mm<sup>2</sup> / mm -->
            </div>
            <separator />
            <div v-if="isFetchedCategories">{{getCategory(p.product_category_id)}}</div>
          </div>
          <list-actions 
            :id="p.id" 
            :record="p"
            :isDraggable="true"
            :routes="{edit: 'product-edit'}">
          </list-actions>
        </div>
      </draggable>
    </div>
    <div v-else>
      <p class="no-records">Es sind noch keine Produkte vorhanden...</p>
    </div>
  </div>
</div>
</template>
<script>

// Icons
import { PlusIcon } from 'vue-feather-icons';

// Components
import ListActions from "@/components/ui/ListActions.vue";
import draggable from "vuedraggable";


// Mixins
import ErrorHandling from "@/mixins/ErrorHandling";
import Helpers from "@/mixins/Helpers";

export default {

  components: {
    ListActions,
    PlusIcon,
    draggable
  },

  mixins: [ErrorHandling, Helpers],

  data() {
    return {
      isLoading: false,
      isFetched: false,
      isFetchedCategories: false,
      products: [],
      product_categories: [],
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`/api/products`).then(response => {
        this.products = response.data.data;
        this.isFetched = true;
      });

      this.axios.get(`/api/product/categories`).then(response => {
        this.product_categories = response.data.data;
        this.isFetchedCategories = true;
      });
    },

    toggle(id,event) {
      let uri = `/api/product/state/${id}`;
      this.isLoading = true;
      this.axios.get(uri).then(response => {
        const index = this.products.findIndex(x => x.id === id);
        this.products[index].publish = response.data;
        this.$notify({ type: "success", text: "Status geändert" });
        this.isLoading = false;
      });
    },

    destroy(id, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/product/${id}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },

    order() {
      let products = this.products.map(function(product, index) {
          product.order = index;
          return product;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false 
        this.axios.post(`/api/product/order`, {products: products}).then((response) => {
          this.$notify({type: 'success', text: 'Reihenfolge angepasst'});
        });
      }.bind(this, products), 500);
    },

    getCategory(id) {
      const index = this.product_categories.findIndex(x => x.id === id);
      return index > -1 ? this.product_categories[index].title.de : null
    }
  }
}
</script>
<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div :class="isFetched && isFetchedCategories ? 'is-loaded' : 'is-loading'">
    <header class="content-header">
      <h1>Zubehör</h1>
      <router-link :to="{ name: 'accessory-create' }" class="feather-icon feather-icon--prepend">
        <plus-icon size="16"></plus-icon>
        <span>Hinzufügen</span>
      </router-link>
    </header>
    <div class="listing" v-if="accessories.length">
      <div
        :class="[a.publish == 0 ? 'is-disabled' : '', 'listing__item']"
        v-for="a in accessories"
        :key="a.id"
      >
        <div class="listing__item-body">
          {{ a.article_no }}
          <separator />
          {{ a.title.de }}
        </div>
        <list-actions 
          :id="a.id" 
          :record="a"
          :routes="{edit: 'accessory-edit'}">
        </list-actions>
      </div>
    </div>
    <div v-else>
      <p class="no-records">Es ist noch kein Zubehör vorhanden...</p>
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
      accessories: [],
      accessory_categories: [],
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`/api/accessories`).then(response => {
        this.accessories = response.data.data;
        this.isFetched = true;
      });

      this.axios.get(`/api/accessory/categories`).then(response => {
        this.accessory_categories = response.data.data;
        this.isFetchedCategories = true;
      });
    },

    toggle(id,event) {
      let uri = `/api/accessory/state/${id}`;
      this.isLoading = true;
      this.axios.get(uri).then(response => {
        const index = this.accessories.findIndex(x => x.id === id);
        this.accessories[index].publish = response.data;
        this.$notify({ type: "success", text: "Status geändert" });
        this.isLoading = false;
      });
    },

    destroy(id, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/accessory/${id}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },

    order() {
      let accessories = this.accessories.map(function(accessory, index) {
          accessory.order = index;
          return accessory;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false 
        this.axios.post(`/api/accessory/order`, {accessories: accessories}).then((response) => {
          this.$notify({type: 'success', text: 'Reihenfolge angepasst'});
        });
      }.bind(this, accessories), 500);
    },

    getCategory(id) {
      const index = this.accessory_categories.findIndex(x => x.id === id);
      return this.accessory_categories[index].title.de;
    }
  }
}
</script>
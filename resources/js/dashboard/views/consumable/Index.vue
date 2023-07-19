<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div :class="isFetched && isFetchedCategories ? 'is-loaded' : 'is-loading'">
    <header class="content-header">
      <h1>Verbrauchsmaterial</h1>
      <router-link :to="{ name: 'consumable-create' }" class="feather-icon feather-icon--prepend">
        <plus-icon size="16"></plus-icon>
        <span>Hinzufügen</span>
      </router-link>
    </header>
    <div class="listing" v-if="consumables.length">
      <div
        :class="[c.publish == 0 ? 'is-disabled' : '', 'listing__item']"
        v-for="c in consumables"
        :key="c.id"
      >
        <div class="listing__item-body">
          {{ c.article_no }}
          <separator />
          {{ c.title.de }}
            <separator />
            <span v-for="p in c.products" :key="p.id">
              {{ p.title }}&nbsp;
            </span>
        </div>
        <list-actions 
          :id="c.id" 
          :record="c"
          :routes="{edit: 'consumable-edit'}">
        </list-actions>
      </div>
    </div>
    <div v-else>
      <p class="no-records">Es ist noch kein Verbrauchsmaterial vorhanden...</p>
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
      consumables: [],
      consumable_categories: [],
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`/api/consumables`).then(response => {
        this.consumables = response.data.data;
        this.isFetched = true;
      });

      this.axios.get(`/api/consumable/categories`).then(response => {
        this.consumable_categories = response.data.data;
        this.isFetchedCategories = true;
      });
    },

    toggle(id,event) {
      let uri = `/api/consumable/state/${id}`;
      this.isLoading = true;
      this.axios.get(uri).then(response => {
        const index = this.consumables.findIndex(x => x.id === id);
        this.consumables[index].publish = response.data;
        this.$notify({ type: "success", text: "Status geändert" });
        this.isLoading = false;
      });
    },

    destroy(id, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/consumable/${id}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },

    order() {
      let consumables = this.consumables.map(function(consumable, index) {
          consumable.order = index;
          return consumable;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false 
        this.axios.post(`/api/consumable/order`, {consumables: consumables}).then((response) => {
          this.$notify({type: 'success', text: 'Reihenfolge angepasst'});
        });
      }.bind(this, consumables), 500);
    },

    getCategory(id) {
      const index = this.consumable_categories.findIndex(x => x.id === id);
      return this.consumable_categories[index].title.de;
    }
  }
}
</script>
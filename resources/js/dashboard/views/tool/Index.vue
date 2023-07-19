<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div :class="isFetched ? 'is-loaded' : 'is-loading'">
    <header class="content-header">
      <h1>Werkzeug</h1>
      <router-link :to="{ name: 'tool-create' }" class="feather-icon feather-icon--prepend">
        <plus-icon size="16"></plus-icon>
        <span>Hinzufügen</span>
      </router-link>
    </header>
    <div class="listing" v-if="tools.length">
      <div
        :class="[t.publish == 0 ? 'is-disabled' : '', 'listing__item']"
        v-for="t in tools"
        :key="t.id"
      >
        <div class="listing__item-body">
          {{ t.article_no }}
          <separator />
          {{ t.title.de }}
        </div>
        <list-actions 
          :id="t.id" 
          :record="t"
          :routes="{edit: 'tool-edit'}">
        </list-actions>
      </div>
    </div>
    <div v-else>
      <p class="no-records">Es ist noch kein Werkzeug vorhanden...</p>
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
      tools: [],
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`/api/tools`).then(response => {
        this.tools = response.data.data;
        this.isFetched = true;
      });
    },

    toggle(id,event) {
      let uri = `/api/tool/state/${id}`;
      this.isLoading = true;
      this.axios.get(uri).then(response => {
        const index = this.tools.findIndex(x => x.id === id);
        this.tools[index].publish = response.data;
        this.$notify({ type: "success", text: "Status geändert" });
        this.isLoading = false;
      });
    },

    destroy(id, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/tool/${id}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },

    order() {
      let tools = this.tools.map(function(tool, index) {
          tool.order = index;
          return tool;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false 
        this.axios.post(`/api/tool/order`, {tools: tools}).then((response) => {
          this.$notify({type: 'success', text: 'Reihenfolge angepasst'});
        });
      }.bind(this, tools), 500);
    },
  }
}
</script>
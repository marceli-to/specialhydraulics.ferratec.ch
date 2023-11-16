<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <form @submit.prevent="submit" class="half-width" v-if="isFetched">
    <header class="content-header">
      <h1>{{title}}</h1>
    </header>
    <tabs :tabs="tabs" :errors="errors"></tabs>
    <div v-show="tabs.data.active">
      <div>
        <div :class="[this.errors.article_no ? 'has-error' : '', 'form-row']">
          <label>Artikelnummer*</label>
          <input type="text" v-model="tool.article_no">
          <label-required />
        </div>
        <div :class="[this.errors.title ? 'has-error' : '', 'form-row']">
          <label>Titel*</label>
          <input type="text" v-model="tool.title.de">
          <label-required />
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="tool.subtitle.de">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="tool.description.de"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="tool.link_shop.de">
        </div>
        <div class="form-row">
          <label>Link Shop (EM)</label>
          <input type="text" v-model="tool.link_shop_em.de">
        </div>
        <div class="form-row">
          <label>Zuweisung Produkt</label>
          <div class="select-wrapper">
            <select @change="addProduct($event)">
              <option>Bitte wählen</option>
              <option v-for="p in products" :key="p.id" :value="p.id">{{ p.title }}</option>
            </select>
          </div>
        </div>
        <div class="form-row" v-if="tool.products.length">
          <label>Produkte</label>
          <div
            class="listing__item"
            v-for="c in tool.products"
            :key="c.id"
          >
            <div class="listing__item-body">
              {{ c.title}}
              <span v-if="c.category">
                <separator />
                {{ c.category.title.de}}
              </span>
            </div>
            <div class="listing__item-action">
              <div>
                <a
                  href="javascript:;"
                  class="feather-icon"
                  @click.prevent="deleteProduct(c.id,$event)"
                >
                <trash2-icon size="18"></trash2-icon>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row" v-else>
          Es sind noch keine Zuweisungen vorhanden.
        </div>
        <div class="form-row is-last">
          <radio-button 
            :label="'Publizieren?'"
            v-bind:publish.sync="tool.publish"
            :model="tool.publish"
            :name="'publish'">
          </radio-button>
        </div>
      </div>
    </div>
    <div v-show="tabs.translation_fr.active">
      <div>
        <div class="form-row">
          <label>Titel</label>
          <input type="text" v-model="tool.title.fr">
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="tool.subtitle.fr">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="tool.description.fr"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="tool.link_shop.fr">
        </div>
      </div>
    </div>
    <div v-show="tabs.translation_it.active">
      <div>
        <div class="form-row">
          <label>Titel</label>
          <input type="text" v-model="tool.title.it">
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="tool.subtitle.it">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="tool.description.it"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="tool.link_shop.it">
        </div>
      </div>
    </div>
    <div v-show="tabs.image.active">
      <div>
        <div class="form-row">
          <image-upload
            :restrictions="'jpg, png | max. 8 MB'"
            :maxFiles="99"
            :maxFilesize="8"
            :acceptedFiles="'.png,.jpg'"
          ></image-upload>
        </div>
        <div class="form-row">
          <image-edit 
            :images="tool.images"
            :imagePreviewRoute="'cache'"
            :aspectRatioW="4"
            :aspectRatioH="3"
          ></image-edit>
        </div>
      </div>
    </div>
    <footer class="module-footer">
      <div>
        <button type="submit" class="btn-primary">Speichern</button>
        <router-link :to="{ name: 'tools' }" class="btn-secondary">
          <span>Zurück</span>
        </router-link>
      </div>
    </footer>
  </form>
</div>
</template>
<script>

// Icons
import { ArrowLeftIcon, Trash2Icon } from 'vue-feather-icons';

// Mixins
import ErrorHandling from "@/mixins/ErrorHandling";

// TinyMCE
import tinyConfig from "@/config/tiny.js";
import TinymceEditor from "@tinymce/tinymce-vue";

// Components
import RadioButton from "@/components/ui/RadioButton.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import ImageUpload from "@/components/images/Upload.vue";
import ImageEdit from "@/views/tool/images/Edit.vue";

// Tabs config
import tabsConfig from "@/views/tool/config/tabs.js";

export default {
  components: {
    ArrowLeftIcon,
    Trash2Icon,
    TinymceEditor,
    RadioButton,
    LabelRequired,
    ImageUpload,
    ImageEdit,
    Tabs
  },

  mixins: [ErrorHandling],

  props: {
    type: String
  },

  data() {
    return {
      
      // Model
      tool: {
        article_no: null,
        title: {
          de: null,
          fr: null,
          it: null
        },
        subtitle: {
          de: null,
          fr: null,
          it: null
        },
        description:  {
          de: null,
          fr: null,
          it: null
        },
        link_shop: {
          de: null,
          fr: null,
          it: null
        },
        link_shop_em: {
          de: null,
          fr: null,
          it: null
        },
        tool_category_id: 1,
        products: [],
        publish: 1,
        images: [],
      },

      // Product categories
      tool_categories: [],

      // Products
      products: [],

      // Validation
      errors: {
        article_no: false,
        title: false,
      },

      // Loading states
      isFetched: true,
      isFetchedProducts: true,
      isLoading: false,

      // Tabs config
      tabs: tabsConfig,

      // TinyMCE
      tinyConfig: tinyConfig,
      tinyApiKey: 'vuaywur9klvlt3excnrd9xki1a5lj25v18b2j0d0nu5tbwro',
    };
  },

  created() {
    if (this.$props.type == "edit") {
      this.isFetched = false;
      let uri = `/api/tool/${this.$route.params.id}`;

      this.axios.get(uri).then(response => {
        this.tool = response.data;
        this.isFetched = true;
      });
    }

    this.isFetchedProducts = false;
    this.axios.get(`/api/products`).then(response => {
      this.products = response.data.data;
      this.isFetchedProducts = true;
    });

  },

  methods: {

    // Submit form
    submit() {
      if (this.$props.type == "edit") {
        this.update();
      }

      if (this.$props.type == "create") {
        this.store();
      }
    },

    store() {
      this.isLoading = true;
      this.axios.post('/api/tool', this.tool).then(response => {
        this.$router.push({ name: "tools" });
        this.$notify({ type: "success", text: "Daten erfasst!" });
        this.isLoading = false;
      });
    },

    update() {
      let uri = `/api/tool/${this.$route.params.id}`;
      this.isLoading = true;
      this.axios.put(uri, this.tool).then(response => {
        this.$router.push({ name: "tools" });
        this.$notify({ type: "success", text: "Änderungen gespeichert!" });
        this.isLoading = false;
      });
    },

    addProduct(event) {
      let id = event.target.value;
      let product = this.products.find(x => x.id == id);
      const index = this.tool.products.findIndex(x => x.id == id);
      if (index === -1) {
        this.tool.products.push(product);
      }
    },

    deleteProduct(id, event) {
      const index = this.tool.products.findIndex(x => x.id == id);
      this.tool.products.splice(index, 1);
    },

    // Store uploaded image
    storeImage(upload) {
      let image = {
        id: null,
        name: upload.name,
        caption: null,
        coords_w: 0,
        coords_h: 0,
        coords_x: 0,
        coords_y: 0,
        orientation: upload.orientation,
        preview: 0,
        order: 0,
        publish: 1,
      }

      if (this.$props.type == "edit") {
        image.tool_id = this.$route.params.id;
        this.axios.post('/api/tool/image', image).then(response => {
          this.$notify({ type: "success", text: "Bild gespeichert!" });
          image.id = response.data.toolImageId;
          this.tool.images.push(image);
        });
      }
      else {
        this.tool.images.push(image);
      }
    },

    // Delete by name
    destroyImage(image, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/tool/image/${image}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          const index = this.tool.images.findIndex(x => x.name === image);
          this.tool.images.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    // Toggle image status
    toggleImage(image, event) {
      if (image.id === null) {
        const index = this.tool.images.findIndex(x => x.name === image.name);
        this.tool.images[index].publish = image.publish == 1 ? 0 : 1;
      } else {
        let uri = `/api/tool/image/state/${image.id}`;
        this.isLoading = true;
        this.axios.get(uri).then(response => {
          const index = this.tool.images.findIndex(x => x.id === image.id);
          this.tool.images[index].publish = response.data;
          this.isLoading = false;
        });
      }
    },

    // Save coords
    saveImageCoords(image) {
      if (image.id === null) {
        const index = this.tool.images.findIndex(x => x.name === image.name);
        this.tool.images[index].coords = image.coords;
      } 
      else {
        let uri = `/api/tool/image/${image.id}`;
        this.isLoading = true;
        this.axios.put(uri, image).then(response => {
          this.$notify({ type: "success", text: "Änderungen gespeichert!" });
          this.isLoading = false;
        });
      }
    },
  },

  computed: {
    title: function() {
      return this.$props.type == "edit" 
        ? "Werkzeug bearbeiten" 
        : "Werkzeug hinzufügen";
    }
  }
};
</script>

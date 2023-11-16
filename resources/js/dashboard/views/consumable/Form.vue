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
          <input type="text" v-model="consumable.article_no">
          <label-required />
        </div>
        <div :class="[this.errors.title ? 'has-error' : '', 'form-row']">
          <label>Titel*</label>
          <input type="text" v-model="consumable.title.de">
          <label-required />
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="consumable.subtitle.de">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="consumable.description.de"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Bohrung</label>
          <input type="text" v-model="consumable.drilling">
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="consumable.link_shop.de">
        </div>
        <div class="form-row">
          <label>Link Shop (EM)</label>
          <input type="text" v-model="consumable.link_shop_em.de">
        </div>
        <div class="form-row">
          <label>Kategorie</label>
          <div class="select-wrapper">
            <select v-model="consumable.consumable_category_id">
              <option v-for="c in consumable_categories" :key="c.id" :value="c.id">{{ c.title.de }}</option>
            </select>
          </div>
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
        <div class="form-row" v-if="consumable.products.length">
          <label>Produkte</label>
          <div
            class="listing__item"
            v-for="c in consumable.products"
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
            v-bind:publish.sync="consumable.publish"
            :model="consumable.publish"
            :name="'publish'">
          </radio-button>
        </div>
      </div>
    </div>
    <div v-show="tabs.translation_fr.active">
      <div>
        <div class="form-row">
          <label>Titel</label>
          <input type="text" v-model="consumable.title.fr">
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="consumable.subtitle.fr">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="consumable.description.fr"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="consumable.link_shop.fr">
        </div>
        <div class="form-row">
          <label>Link Shop (EM)</label>
          <input type="text" v-model="consumable.link_shop_em.fr">
        </div>
      </div>
    </div>
    <div v-show="tabs.translation_it.active">
      <div>
        <div class="form-row">
          <label>Titel</label>
          <input type="text" v-model="consumable.title.it">
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="consumable.subtitle.it">
        </div>
        <div class="form-row">
          <label>Technische Daten</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="consumable.description.it"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Link Shop (Sonepar)</label>
          <input type="text" v-model="consumable.link_shop.it">
        </div>
        <div class="form-row">
          <label>Link Shop (EM)</label>
          <input type="text" v-model="consumable.link_shop_em.it">
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
            :images="consumable.images"
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
        <router-link :to="{ name: 'consumables' }" class="btn-secondary">
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
import ImageEdit from "@/views/consumable/images/Edit.vue";

// Tabs config
import tabsConfig from "@/views/consumable/config/tabs.js";

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
      consumable: {
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
        drilling: null,
        consumable_category_id: 1,
        products: [],
        publish: 1,
        images: [],
      },

      // Product categories
      consumable_categories: [],

      // Products
      products: [],

      // Validation
      errors: {
        article_no: false,
        title: false,
        consumable_category_id: false,
      },

      // Loading states
      isFetched: true,
      isFetchedCategories: true,
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
      let uri = `/api/consumable/${this.$route.params.id}`;

      this.axios.get(uri).then(response => {
        this.consumable = response.data;
        this.isFetched = true;
      });
    }

    this.isFetchedCategories = false;
    this.axios.get(`/api/consumable/categories`).then(response => {
      this.consumable_categories = response.data.data;
      this.isFetchedCategories = true;
    });

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
      this.axios.post('/api/consumable', this.consumable).then(response => {
        this.$router.push({ name: "consumables" });
        this.$notify({ type: "success", text: "Daten erfasst!" });
        this.isLoading = false;
      });
    },

    update() {
      let uri = `/api/consumable/${this.$route.params.id}`;
      this.isLoading = true;
      this.axios.put(uri, this.consumable).then(response => {
        this.$router.push({ name: "consumables" });
        this.$notify({ type: "success", text: "Änderungen gespeichert!" });
        this.isLoading = false;
      });
    },

    addProduct(event) {
      let id = event.target.value;
      let product = this.products.find(x => x.id == id);
      const index = this.consumable.products.findIndex(x => x.id == id);
      if (index === -1) {
        this.consumable.products.push(product);
      }
    },

    deleteProduct(id, event) {
      const index = this.consumable.products.findIndex(x => x.id == id);
      this.consumable.products.splice(index, 1);
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
        image.consumable_id = this.$route.params.id;
        this.axios.post('/api/consumable/image', image).then(response => {
          this.$notify({ type: "success", text: "Bild gespeichert!" });
          image.id = response.data.consumableImageId;
          this.consumable.images.push(image);
        });
      }
      else {
        this.consumable.images.push(image);
      }
    },

    // Delete by name
    destroyImage(image, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/consumable/image/${image}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          const index = this.consumable.images.findIndex(x => x.name === image);
          this.consumable.images.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    // Toggle image status
    toggleImage(image, event) {
      if (image.id === null) {
        const index = this.consumable.images.findIndex(x => x.name === image.name);
        this.consumable.images[index].publish = image.publish == 1 ? 0 : 1;
      } else {
        let uri = `/api/consumable/image/state/${image.id}`;
        this.isLoading = true;
        this.axios.get(uri).then(response => {
          const index = this.consumable.images.findIndex(x => x.id === image.id);
          this.consumable.images[index].publish = response.data;
          this.isLoading = false;
        });
      }
    },

    // Save coords
    saveImageCoords(image) {
      if (image.id === null) {
        const index = this.consumable.images.findIndex(x => x.name === image.name);
        this.consumable.images[index].coords = image.coords;
      } 
      else {
        let uri = `/api/consumable/image/${image.id}`;
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
        ? "Verbrauchsmaterial bearbeiten" 
        : "Verbrauchsmaterial hinzufügen";
    }
  }
};
</script>

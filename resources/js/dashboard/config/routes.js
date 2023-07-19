import ErrorForbidden from '@/views/errors/Forbidden.vue';
import ErrorNotFound from '@/views/errors/NotFound.vue';

// Welcome
import Home from '@/views/home/Index.vue';

// Products
import ProductIndex from '@/views/product/Index.vue';
import ProductCreate from '@/views/product/Create.vue';
import ProductEdit from '@/views/product/Edit.vue';

// Consumables
import ConsumableIndex from '@/views/consumable/Index.vue';
import ConsumableCreate from '@/views/consumable/Create.vue';
import ConsumableEdit from '@/views/consumable/Edit.vue';

// Accessories
import AccessoryIndex from '@/views/accessory/Index.vue';
import AccessoryCreate from '@/views/accessory/Create.vue';
import AccessoryEdit from '@/views/accessory/Edit.vue';

// Tool
import ToolIndex from '@/views/tool/Index.vue';
import ToolCreate from '@/views/tool/Create.vue';
import ToolEdit from '@/views/tool/Edit.vue';

const routes = [

  // Home
  {
    name: 'home',
    path: '/administration',
    component: Home,
  },
  
  // Products
  {
    name: 'products',
    path: '/administration/products',
    component: ProductIndex,
  },
  {
    name: 'product-create',
    path: '/administration/product/create',
    component: ProductCreate,
  },
  {
    name: 'product-edit',
    path: '/administration/product/edit/:id',
    component: ProductEdit,
  },

  // Consumables
  {
    name: 'consumables',
    path: '/administration/consumables',
    component: ConsumableIndex,
  },
  {
    name: 'consumable-create',
    path: '/administration/consumable/create',
    component: ConsumableCreate,
  },
  {
    name: 'consumable-edit',
    path: '/administration/consumable/edit/:id',
    component: ConsumableEdit,
  },

  // Accessories
  {
    name: 'accessories',
    path: '/administration/accessories',
    component: AccessoryIndex,
  },
  {
    name: 'accessory-create',
    path: '/administration/accessory/create',
    component: AccessoryCreate,
  },
  {
    name: 'accessory-edit',
    path: '/administration/accessory/edit/:id',
    component: AccessoryEdit,
  },

  // Tools
  {
    name: 'tools',
    path: '/administration/tools',
    component: ToolIndex,
  },
  {
    name: 'tool-create',
    path: '/administration/tool/create',
    component: ToolCreate,
  },
  {
    name: 'tool-edit',
    path: '/administration/tool/edit/:id',
    component: ToolEdit,
  },

  // Authorization
  {
    name: 'forbidden',
    path: '/forbidden',
    component: ErrorForbidden,
  },
  {
    name: 'not-found',
    path: '/not-found',
    component: ErrorNotFound,
  }
];

export default routes
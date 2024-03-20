import Layout from '../../views/ProductQuestion/Layout'
import AllProductQuestion from '../../views/ProductQuestion/All'
import CreateProductQuestion from '../../views/ProductQuestion/Create'
import EditProductQuestion from '../../views/ProductQuestion/Edit'
import DetailsProductQuestion from '../../views/ProductQuestion/Details'
import ImportProductQuestion from '../../views/ProductQuestion/Import'

export default {
    path: 'product-question',
    component: Layout,
    props: {
        role_permissions: ['super_admin','admin'],
        layout_title: 'Product Question Management',
    },
    children: [{
            path: '',
            name: 'AllProductQuestion',
            component: AllProductQuestion,
        },
        {
            path: 'import',
            name: 'ImportProductQuestion',
            component: ImportProductQuestion,
        },
        {
            path: 'create',
            name: 'CreateProductQuestion',
            component: CreateProductQuestion,
        },
        {
            path: 'edit/:id',
            name: 'EditProductQuestion',
            component: EditProductQuestion,
        },
        {
            path: 'details/:id',
            name: 'DetailsProductQuestion',
            component: DetailsProductQuestion,
        },
    ],

};

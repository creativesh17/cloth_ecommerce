import Layout from '../../views/ProductReview/Layout'
import AllProductReview from '../../views/ProductReview/All'
import CreateProductReview from '../../views/ProductReview/Create'
import EditProductReview from '../../views/ProductReview/Edit'
import DetailsProductReview from '../../views/ProductReview/Details'
import ImportProductReview from '../../views/ProductReview/Import'

export default {
    path: 'product-review',
    component: Layout,
    props: {
        role_permissions: ['super_admin','admin'],
        layout_title: 'Product Review Management',
    },
    children: [{
            path: '',
            name: 'AllProductReview',
            component: AllProductReview,
        },
        {
            path: 'import',
            name: 'ImportProductReview',
            component: ImportProductReview,
        },
        {
            path: 'create',
            name: 'CreateProductReview',
            component: CreateProductReview,
        },
        {
            path: 'edit/:id',
            name: 'EditProductReview',
            component: EditProductReview,
        },
        {
            path: 'details/:id',
            name: 'DetailsProductReview',
            component: DetailsProductReview,
        },
    ],

};

import Layout from '../../views/gallery/Layout'
import AllGallery from '../../views/gallery/All'
import CreateGallery from '../../views/gallery/Create'
import EditGallery from '../../views/gallery/Edit'
import DetailsGallery from '../../views/gallery/Details'
import ImportGallery from '../../views/category/Import'

export default {
    path: 'gallery',
    component: Layout,
    props: {
        role_permissions: ['super_admin','admin'],
        layout_title: 'Gallery Management',
    },
    children: [{
            path: '',
            name: 'AllGallery',
            component: AllGallery,
        },
        {
            path: 'import',
            name: 'ImportGallery',
            component: ImportGallery,
        },
        {
            path: 'create',
            name: 'CreateGallery',
            component: CreateGallery,
        },
        {
            path: 'edit/:id',
            name: 'EditGallery',
            component: EditGallery,
        },
        {
            path: 'details/:id',
            name: 'DetailsGallery',
            component: DetailsGallery,
        },
    ],

};

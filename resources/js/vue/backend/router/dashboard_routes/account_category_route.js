import Layout from '../../views/AccountCategory/Layout'
import AllAccountCategory from '../../views/AccountCategory/All'
import CreateAccountCategory from '../../views/AccountCategory/Create'
import EditAccountCategory from '../../views/AccountCategory/Edit'
import DetailsAccountCategory from '../../views/AccountCategory/Details'
import ImportAccountCategory from '../../views/AccountCategory/Import'

export default {
    path: 'account-category',
    component: Layout,
    props: {
        role_permissions: ['super_admin','admin'],
        layout_title: 'Account Category Management',
    },
    children: [{
            path: '',
            name: 'AllAccountCategory',
            component: AllAccountCategory,
        },
        {
            path: 'import',
            name: 'ImportAccountCategory',
            component: ImportAccountCategory,
        },
        {
            path: 'create',
            name: 'CreateAccountCategory',
            component: CreateAccountCategory,
        },
        {
            path: 'edit/:id',
            name: 'EditAccountCategory',
            component: EditAccountCategory,
        },
        {
            path: 'details/:id',
            name: 'DetailsAccountCategory',
            component: DetailsAccountCategory,
        },
    ],

};

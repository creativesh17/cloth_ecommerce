import Layout from '../../views/AccountLog/Layout'
import AllAccountLog from '../../views/AccountLog/All'
import CreateAccountLog from '../../views/AccountLog/Create'
import EditAccountLog from '../../views/AccountLog/Edit'
import DetailsAccountLog from '../../views/AccountLog/Details'
import ImportAccountLog from '../../views/AccountLog/Import'

export default {
    path: 'account-log',
    component: Layout,
    props: {
        role_permissions: ['super_admin','admin'],
        layout_title: 'Account Log Management',
    },
    children: [{
            path: '',
            name: 'AllAccountLog',
            component: AllAccountLog,
        },
        {
            path: 'import',
            name: 'ImportAccountLog',
            component: ImportAccountLog,
        },
        {
            path: 'create',
            name: 'CreateAccountLog',
            component: CreateAccountLog,
        },
        {
            path: 'edit/:id',
            name: 'EditAccountLog',
            component: EditAccountLog,
        },
        {
            path: 'details/:id',
            name: 'DetailsAccountLog',
            component: DetailsAccountLog,
        },
    ],

};

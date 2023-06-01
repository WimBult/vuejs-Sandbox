export default [
    {
        name: 'license',
        path: '/license',
        meta: {
            superAdmin: true,
        },
        component: () => import(/* webpackChunkName: "license" */ '../../views/License/License.vue'),
    },
]

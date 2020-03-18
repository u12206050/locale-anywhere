Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'switch-locale',
      path: '/switch-locale',
      component: require('./components/Tool'),
    },
  ]);

  Vue.component('switch-locale-dropdown', require('./components/Dropdown'));
  Vue.component('index-switch-locale', require('./components/IndexField'));
  Vue.component('detail-switch-locale', require('./components/DetailField'));
  Vue.component('form-switch-locale', require('./components/FormField'));

  if (window.config.customDetailToolbar) {
    Vue.component('custom-detail-toolbar', require('./components/CustomDetailToolbar'));
  }
});

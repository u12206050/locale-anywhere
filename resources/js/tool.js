import Flag from './flag.js'

Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'switch-locale',
      path: '/switch-locale',
      component: require('./components/Tool'),
    },
  ]);

  Vue.prototype.flag = Flag

  Vue.component('switch-locale-dropdown', require('./components/Dropdown'));

  /**
   * SelectLocale
   */
  Vue.component('index-select-locale', require('./components/select/IndexField'));
  Vue.component('detail-select-locale', require('./components/select/DetailField'));
  Vue.component('form-select-locale', require('./components/select/FormField'));

  /**
   * Language Info Field
   */
  Vue.component('index-language', require('./components/language/IndexField'));
  Vue.component('detail-language', require('./components/language/DetailField'));
  Vue.component('form-language', require('./components/language/FormField'));

  if (window.config.customDetailToolbar) {
    Vue.component('custom-detail-toolbar', require('./components/CustomDetailToolbar'));
  }
});

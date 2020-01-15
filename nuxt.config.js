export default {
  mode: 'universal',
  /*
   ** Headers of the page
   */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.npm_package_description || ''
      }
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    link: [
      {
        rel: 'stylesheet',
        href:
          'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap'
      },
      {
        rel: 'stylesheet',
        href: 'https://cdn.datahjelpen.no/fonts/butler/butler-700-300.css'
      }
    ]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: '#e02', height: '5px', duration: 3000 },
  /*
   ** Global CSS
   */
  css: ['@@/assets/sass/global.scss'],

  styleResources: {
    scss: ['@@/assets/sass/_variables.scss']
  },

  /*
   ** Plugins to load before mounting the App
   */
  plugins: [],
  /*
   ** Nuxt.js dev-modules
   */
  devModules: ['@nuxtjs/style-resources'],
  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/svg',
    'nuxt-i18n'
  ],

  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {
    baseURL: 'https://cdn.datahjelpen.no/datahjelpen-no'
  },

  /*
   ** nuxt-i18n module configuration
   ** See https://nuxt-community.github.io/nuxt-i18n/
   */
  i18n: {
    locales: [
      {
        code: 'en',
        file: 'en-US.js'
      },
      {
        code: 'nb',
        file: 'nb-NO.js'
      }
    ],
    lazy: true,
    langDir: 'i18n/',
    defaultLocale: 'nb'
  },

  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
}

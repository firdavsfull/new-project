// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: [
    '@fortawesome/fontawesome-svg-core/styles.css',
    "bootstrap/dist/css/bootstrap.min.css",
  ],

  plugins: [
    { src: '~/plugins/maps', mode: 'client' },
  ],
  modules: [
  'nuxt-icon',
  '@nuxtjs/tailwindcss',
],
build: {
  transpile: ['vue-remix-icons'],
},
  app: {
    head: {
      title: "Авторизация Регистрация",
      meta: [
      ],
      script: [
        {
          src: "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js",
        } 
      ],
      link: [
      ],
      style: [
      ],
      noscript: [
      ]
    },
  },
})

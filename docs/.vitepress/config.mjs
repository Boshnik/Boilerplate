import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "Boilerplate",
  description: "Basic Website Configuration",
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: 'https://boshnik.com/' },
      { text: 'Documentation', link: '/docs/' }
    ],

    sidebar: [
      {
        text: '',
        items: [
          { text: 'Getting Started', link: '/docs/' },
        ]
      }
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/Boshnik/Boilerplate' }
    ]
  }
})

import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "Boilerplate",
  description: "Basic Website Configuration",
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: 'https://boshnik.com/', target: '_self' },
      { text: 'Documentation', link: '/docs/' }
    ],

    sidebar: [
      {
        text: '',
        items: [
          { text: 'Getting Started', link: '/docs/' },
          { text: 'Packages', link: '/docs/packages' },
          { text: 'Resources', link: '/docs/resources' },
          { text: 'Chunks', link: '/docs/chunks' },
          { text: 'Snippets', link: '/docs/snippets' },
          { text: 'Plugins', link: '/docs/plugins' },
          { text: 'System settings', link: '/docs/settings' },
          { text: 'Other', link: '/docs/other' },
        ]
      }
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/Boshnik/Boilerplate' }
    ]
  }
})

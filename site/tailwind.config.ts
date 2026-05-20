import type { Config } from 'tailwindcss'

const config: Config = {
  content: [
    './app/**/*.{js,ts,jsx,tsx,mdx}',
    './components/**/*.{js,ts,jsx,tsx,mdx}',
  ],
  theme: {
    extend: {
      colors: {
        // Palette éditoriale Elite Atacora (Claude Design)
        cream:      '#FAF5EA',
        sand:       '#F1E7CF',
        paper:      '#F6EDD8',
        ink:        '#1E1813',
        coffee:     '#3A2E22',
        muted:      '#7B6E58',
        forest:     '#1E5631',
        moss:       '#3A7D44',
        mossdk:     '#15401F',
        terracotta: '#C2542A',
        honey:      '#E9B44C',
        coral:      '#E07856',
        soft:       '#FFF9EC',
        claretred:  '#A4231A',
      },
      fontFamily: {
        serif:   ['"DM Serif Display"', 'Georgia', 'serif'],
        editor:  ['"Fraunces"', 'Georgia', 'serif'],
        sans:    ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
      },
      maxWidth: {
        page: '1320px',
      },
      keyframes: {
        marquee: {
          from: { transform: 'translateX(0)' },
          to:   { transform: 'translateX(-50%)' },
        },
        floaty: {
          '0%,100%': { transform: 'translateY(0)' },
          '50%':     { transform: 'translateY(-6px)' },
        },
      },
      animation: {
        marquee: 'marquee 60s linear infinite',
        floaty:  'floaty 6s ease-in-out infinite',
      },
    },
  },
  plugins: [],
}

export default config

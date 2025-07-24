
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'sma': {
          'blue': {
            DEFAULT: '#0487E2',  // Primary Blue
            'dark': '#0463CA',   // Dark Blue
            'medium': '#65C2F5', // Medium Blue
            'light': '#B0D6F5',  // Light Blue
            'lightest': '#F0F7FD', // Lightest Blue
          },
          'cyan': '#09B1EC',     // Cyan accent
        }
      }
    },
  },
  daisyui: {
    themes: [
      {
        'smalsh': {
          'primary': '#0487E2',
          'primary-focus': '#0463CA',
          'primary-content': '#ffffff',
          'secondary': '#65C2F5',
          'secondary-focus': '#09B1EC',
          'secondary-content': '#ffffff',
          'accent': '#09B1EC',
          'accent-focus': '#0487E2',
          'accent-content': '#ffffff',
          'neutral': '#2a323c',
          'base-100': '#ffffff',
          'base-200': '#F0F7FD',
          'base-300': '#B0D6F5',
          'info': '#65C2F5',
          'success': '#10B981',
          'warning': '#F59E0B',
          'error': '#EF4444',
        },
      },
    ],
  },
  plugins: [require('daisyui')],
}

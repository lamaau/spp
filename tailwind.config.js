module.exports = {
  content: [
    // prettier-ignore
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.blade.php",
  ],
  darkMode: "class",
  theme: {
    extend: {
      maxHeight: {
        0: "0",
        xl: "36rem",
      },
      fontFamily: {
        sans: ["Inter", "Popins"],
      },
    },
  },
  plugins: [
    require("tailwindcss"),
    require("autoprefixer"),
    require("postcss-import"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/custom-forms"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/line-clamp"),
    require("@tailwindcss/typography"),
  ],
};

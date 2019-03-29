module.exports = {
  css: {
    loaderOptions: {
      sass: {
        data: `
          @import "@/sass/app.scss";
        `
      }
    }
  },

  publicPath: process.env.NODE_ENV === 'production' ? './' : '/'

}

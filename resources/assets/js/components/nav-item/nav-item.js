module.exports = {

  props: {
    link: {default: ''},
    inner: {default: ''}
  },

  template: require('./template.html'),

  data: function() {
    return {};
  },

  methods: {
    isActive: function() {
      return this.$data.link && (this.$data.link === window.location.href.replace(/^https?:/,''));
    }
  },

  filters: {},

  ready: function() {

  }

};
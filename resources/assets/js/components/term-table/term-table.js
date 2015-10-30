module.exports = {

  props: ['terms'],

  data: function() {
    return {

    };
  },

  template: require('./template.html'),

  ready: function() {
    if ( ! this.$data.terms.length) {
      this.$dispatch('load-terms');
    }
  },

  methods: {
    edit: function(term) {
      this.$dispatch('edit-term', term);
    },
    alias: function(term) {
      this.$dispatch('alias-term', term);
    },
    destroy: function(term) {
      console.log('term-table::destroy()', term);
      this.$dispatch('destroy-term', term);
    },
  },

  filters: {
    truncate: function(content, chars) {

      if (content.length < chars) {
        return content;
      }

      return content.slice(0,chars) + ' ...';
    },
    iSortBy: function (arr, sortKey, reverse) {
      var order = (reverse && reverse < 0) ? -1 : 1;
      // sort on a copy to avoid mutating original array
      return arr.slice().sort(function (a, b) {
        a = a[sortKey].toLowerCase();
        b = b[sortKey].toLowerCase();
        return a === b ? 0 : a > b ? order : -order;
      });
    }
  }

};
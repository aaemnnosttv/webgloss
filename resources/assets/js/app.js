var Vue = require('vue');
var _ = require('lodash');

Vue.config.debug = true;
Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = App.csrfToken;

var vm = new Vue({

  el: 'body',

  components: {
    "term-table": require('./components/term-table/term-table'),
    "modal": require('./components/modal/modal'),
    "alert": require('./components/alert/alert')
  },

  data: {
    terms: [],
    errors: [],
    modalTerm: {
      name: '',
      acronym: '',
      definition: ''
    }
  },

  ready: function() {
    console.log('Vue ready!');

  },

  events: {
    'load-terms': function() {
      this.loadTerms();
    },
    'edit-term': function(term) {
      console.log('event::edit-term');
      this.$data.modalTerm = _.clone(term);
      this.termEdit();
    },
    'destroy-term': function(term) {
      console.log('event::destroy-term');
      this.destroyTerm(term);
    }
  },

  methods: {
    loadTerms: function() {
      this.$http.get('/term', function (data, status, request) {
        console.log('terms', status, data);

        this.$set('terms', data);
      }).error(this.errorHandler.bind(this));
    },

    resetModal: function() {
      this.$data.errors = [];

      this.$data.modalTerm = {
        name: '',
        acronym: '',
        definition: ''
      };
    },

    // show modal to create a new term
    termCreate: function() {
      this.$data.modalAction = 'save'; // vue-resource
      this.resetModal();
      this.$broadcast('show-modal', 'term_form');
    },
    // show modal to edit a term
    termEdit: function() {
      this.$data.modalAction = 'update'; // vue-resource
      this.$broadcast('show-modal', 'term_form');
    },
    // submit modal
    commitTerm: function() {
      var action = this.$data.modalAction,
        term = this.$data.modalTerm;

      this.$resource('term/:id')[ action ]({id: term.id}, term, function(data, status, request) {
        console.log('commitTerm success!', action, arguments);
        // push on the new term if it was successful
        if (action === "save" && "object" === typeof data.term) {
          this.$data.terms.push(data.term);
        }
        // update the term if it was successful edit
        if (action === "update" && "object" === typeof data.term) {
          this.updateTerm(data.term);
        }
        this.resetModal();
        this.$broadcast('hide-modal', 'term_form');
      }).error(this.errorHandler.bind(this));
    },

    destroyTerm: function(term) {
      if (window.confirm('Are you sure?')) {
        this.$http.delete('/term/'+ term.id, function(data, status, request) {
          console.log('deleting term', status, data);
          this.removeTerm(term);
        }).error(this.errorHandler.bind(this));
      }
    },

    removeTerm: function(term) {
      this.$data.terms = _.filter(this.$data.terms, function(oldTerm) {
        return term.id !== oldTerm.id;
      });
    },

    updateTerm: function(term) {
      _.forEach(this.$data.terms, function(oldTerm) {
        if (term.id == oldTerm.id) {
          _.merge(oldTerm, term);
        }
      });
    },

    errorHandler: function (data, status, request) {
      console.log('Error!', status, request, data);
      this.$data.errors = _.values(data);
    }
  }, // methods

  filters: {
    toLines: function(content) {
      console.log(content);
      if ("object" === typeof content) {
        return content.join('<br>');
      }
      return content;
    }
  }

});
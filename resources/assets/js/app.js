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
    newTerm: {
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
    //'create-term': function() {
    //  console.log(arguments);
    //},
    'destroy-term': function(term) {
      console.log('event::destroy-term');
      this.destroyTerm(term);
    }
  },

  methods: {
    loadTerms: function() {
      this.$http.get('/terms', function (data, status, request) {
        console.log('terms response', status, data);

        this.$set('terms', data);
      })
        .error(function (data, status, request) {
        // handle error
        console.log('Error!', status, data);
      });
    },

    createTerm: function() {

      var postData = {
        name: this.$data.newTerm.name,
        acronym: this.$data.newTerm.acronym,
        definition: this.$data.newTerm.definition
      };

      this.$http.post('/term', postData, function(data, status, request) {
        console.log('created successfully!', status, data);

        if (data) {
          this.$data.terms.push(data);

          this.$data.newTerm = {
            name: '',
            acronym: '',
            definition: ''
          };
        }
      })
        .error(function (data, status, request) {
          // handle error
          console.log('Error creating term!', status, data);
        });
    },

    destroyTerm: function(term) {
      if (window.confirm('Are you sure?')) {
        this.$http.delete('/term/'+ term.id, function(data, status, request) {
          console.log('deleting term', status, data);
          this.removeTerm(term);
        })
          .error(function (data, status, request) {
            // handle error
            console.log('Error destroying term!', status, data);
          });
      }
    },

    removeTerm: function(term) {
      for(var key in this.$data.terms) {
        if (term.id == this.$data.terms[key].id) {
          this.$data.terms.splice(key, 1);
        }
      }
    }
  }

});
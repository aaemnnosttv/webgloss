module.exports = {
  template: require('./template.html'),
  computed: {
    alertState: function(){
      return !this.state || this.state === 'default' ? 'alert-success' : 'alert-' + this.state;
    }
  },
  props: {
    // required
    show: {
      type: Boolean,
      default: false,
      required: true
    },
    message: {
      type: String,
      default: '',
      required: true
    },
    state: {
      type: String,
      default: 'success'
    },
    dismissible: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    dismiss: function() {
      // hide an alert
      this.show = false;
      // Dispatch an event from the current vm that propagates all the way up to its $root
      this.$dispatch('dismiss::alert');
    }
  }
};
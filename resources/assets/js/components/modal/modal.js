// Vuestrap ftw

// css transition duration
const TRANSITION_DURATION = 300;

module.exports = {

  template: require('./template.html'),

  data: function() {
    return {
      animateBackdrop: false,
      animateModal: false
    };
  },

  props: {
    id: {
      type: String,
      default: ''
    },
    size: {
      type: String,
      default: 'md'
    },
    fade: {
      type: Boolean,
      default: true
    }
  },

  methods: {
    show: function() {
      this.$el.style.display = 'block';
      // wait for the display block, and then add class "in" class on the modal
      setTimeout(function(){
        this.animateBackdrop = true;
        setTimeout(function(){
          this.animateModal = true;
          this.$dispatch('show::modal');
        }.bind(this), (this.fade) ? TRANSITION_DURATION/2 : 0);
      }.bind(this),0);
    },

    hide: function() {
      var self= this;
      // first animate modal out
      this.animateModal = false;
      setTimeout(function(){
        // wait for animation to complete and then hide the backdrop
        this.animateBackdrop = false;
        setTimeout(function(){
          // no hide the modal wrapper
          self.$el.style.display = 'none';
          self.$dispatch('hide::modal');
        }.bind(this), (this.fade) ? TRANSITION_DURATION/2 : 0);
      }.bind(this), (this.fade) ? TRANSITION_DURATION/2 : 0);
    },

    onClickOut: function(e){
      // if backdrop clicked, hide modal
      if (e.target.id && e.target.id === this.id) {
        this.hide();
      }
    }
  },

  ready: function(){
    // support for esc key press
    document.addEventListener('keydown', function (e) {
      var key = e.which || e.keyCode;
      if (key === 27) { // 27 is esc
        this.hide();
      }
    }.bind(this));
  },

  events: {
    // control modal from outside via events
    'show-modal': function(id){
      if (id === this.id){
        this.show();
      }
    },
    'hide-modal': function(id){
      if (id === this.id){
        this.hide();
      }
    }
  }

};
// Component Display Title
Vue.component('cp-diet-planner-display-title', {
  template: `<div class="cp__diet__planner_settings_panel cp__diet__planner_settings_panel_title">
    <h3 class="cp__diet__planner_panel_title">{{ panelTitle }}</h3>
    <div class="cp__diet__planner_panel_body clearfix">
      <span class="label">{{ panelTitle }}: </span>
      <a href="#" class="cp__diet__planner_ajax_link" v-html="displayTitle"></a>
    </div>
  </div>`,
  props: {
      panelTitle: {
          type: String,
          default: ''
      },
      displayTitle: {
          type: String,
          default: ''
      },
  },
  data: function() {
      return {

      };
  },
  computed: {
      
  },
  methods: {
      getClass: function(i) {
        var classes = ['ae__' + i];
          return classes;
      },
  },
  created: function() {

  },
  filters: {
      
  },
  mounted: function() {
      var vm = this;
  },
});

// Component Display Format
Vue.component('cp-diet-planner-display-format', {
  template: `<div class="cp__diet__planner_settings_panel cp__diet__planner_settings_panel_format">
    <h3 class="cp__diet__planner_panel_title">{{ panelTitle }}</h3>
    <div class="cp__diet__planner_panel_body clearfix">
      <span class="label">{{ panelTitle }}: </span>
      <a href="#" class="cp__diet__planner_ajax_link">{{ displayFormat }}</a><span class="label">&nbsp;|&nbsp;</span><a href="#" class="cp__diet__planner_ajax_link">{{ settingText }}</a>
    </div>
  </div>`,
  props: {
      panelTitle: {
          type: String,
          default: ''
      },
      displayFormat: {
          type: String,
          default: ''
      },
      settingText: {
          type: String,
          default: ''
      },
  },
  data: function() {
      return {

      };
  },
  computed: {
      
  },
  methods: {
      getClass: function(i) {
        var classes = ['ae__' + i];
          return classes;
      },
  },
  created: function() {

  },
  filters: {
      
  },
  mounted: function() {
      var vm = this;
  },
});
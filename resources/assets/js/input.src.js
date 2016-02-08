var Vue = require('Vue');
var Resource = require('vue-resource');
var _ = require('underscore');

Vue.config.debug = true
Vue.use(Resource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');


var App = new Vue({
	el: '#body',

	data: {
		started: false,
		words: [],
		newVerb: '',
		newNoun: '',
	},
	ready: function(){
		this.init();
	},
	events: {
		
	},
	methods: {
		init: function(){
	        var _this = this;
	        this.$http.get("/api/words?all=1",function(response){
	        	response.data.forEach(function(word){
	        		_this.words.push(word);
	        	});
	        });
		},
		remove: function(id) {
            var resource = this.$resource('/api/remove');
            resource.save({id: id}, function(data){
				this.words = _.reject(this.words, {id: id});
            });
		},
		add: function(type){
			var resource = this.$resource('/api/add');
			var wordType = (type == 1) ? 'Verb':'Noun';
			var text = this.$get('new'+wordType);
            resource.save({word: text, type: type}, function(response){
				this.words.push(response.data);
				this.newVerb = '';
				this.newNoun = '';
            });
		}
	},
	computed: {
		nouns: function(){
			return _.where(this.words, {type: 2});
		},
		verbs: function(){
			return _.where(this.words, {type: 1});
		}
	},
	watch: {

	}
})



var Vue = require('Vue');
var Resource = require('vue-resource');
Vue.config.debug = true
Vue.use(Resource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

var App = new Vue({
	el: '#body',

	data: {
		started: false,
		words: [],
		current: '',
		idx: 0,
		speaker: responsiveVoice,
		config: {
			voice: "Danish Female",
            params: {

            }
		}
	},
	ready: function(){

	},
	events: {
		"SpeakWasFinished": function(){
			var _this = this;
			if(this.idx >= this.words.length){
				this.idx = 0; //start over
				setTimeout(function(){
					_this.init();
				}, 5000);
			} else {
				setTimeout(function(){
					_this.startTalking();
				}, 1000);
			}
		}
	},
	methods: {
		start: function() {
			this.started = !this.started;
			
			if(this.started){
				console.log("Starting");
				this.init();
			} else {
				console.log("Stopping");
				this.speaker.cancel();
			}
		},
		init: function(){
	        var _this = this;
	        this.$http.get("/api/words",function(response){
	        	this.words = response.data;
				this.startTalking();
	        });
		},
		startTalking: function(){
			if(this.started){
				this.speak(this.words[this.idx++]);
			}
		},
		speak: function(word) {
			var _this = this;
			this.current = word;
			this.speaker.speak(
	            word,
	            this.config.voice,
	            {
	               pitch: 1, 
	               rate: 0.7,
	               onend: function(){
	               		_this.$emit("SpeakWasFinished");
	               }
				}
	        );
		},
		onSpeakDone: function(){
			Console.log("Done");
		}
	},
	watch: {

	}
})



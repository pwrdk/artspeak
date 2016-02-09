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
		completed: false,
		intervals: {
			duration: 600,
			words: 5,
			sections: 1,
		},
		counter: 0,
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
	computed: {

	},
	events: {
		"SpeakWasFinished": function(){
			var _this = this;
			console.log("Speak Done!", this.completed);
			
			//We're done, finish the sentence and stop.
			if(this.completed) {
				this.startStop();
				return;
			}
			if(this.idx >= this.words.length){
				this.idx = 0; //start over
				setTimeout(function(){
					_this.init();
				}, _this.intervals.sections * 1000);
			} else {
				setTimeout(function(){
					_this.startTalking();
				}, _this.intervals.words * 1000);
			}
		},
		"CountdownHasFinished": function(){
			this.completed = true;
		}
	},
	methods: {
		startStop: function() {
			this.started = !this.started;
			
			if(this.started){
				this.completed = false;
				console.log("Starting");
				this.setCountdown();
				this.init();
			} else {
				console.log("Stopping");
				$('#countdown').countdown('stop');
			}
		},
		init: function(){
	        var _this = this;
	        this.$http.get("/api/words",function(response){
	        	this.words = response.data;
				this.startTalking();
	        });
		},
		setCountdown: function(){
			var _this = this;
		
			$('#countdown').countdown(this.getTime())
			.on('update.countdown', function(event) {
				if (event.elapsed) {
					$(this).html("Done.");
					_this.$emit("CountdownHasFinished");
				} else {
					$(this).html(event.strftime('%M min. %S sec.'));
				}
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
		},
		getTime: function(){
			var _this = this;
			return new Date(new Date().valueOf() + _this.intervals.duration * 60 * 1000);
		}
	},
});
 
var Person = Backbone.Model.extend({
    defaults:{
        name: "nitesh",
        age: 18,
        work: "software engg."
    }
}); 

var PersonCollection = Backbone.Collection.extend({
    model: Person
});

var PersonView = Backbone.View.extend({
   tagName: 'li',

   my_template: _.template($("#personTemplate").html()),

	initialize: function(){
		this.render();
	},

	render: function(){
		$(this.el).html( this.my_template(this.model.toJSON()));
	}
});
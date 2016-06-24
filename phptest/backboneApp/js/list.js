var List = Backbone.Model.extend({
    url: "http://bb-app.com/php/list.php",
    initialize: function () {
        
    }
});

var listView = Backbone.View.extend({
    el: $("#search_container"),
    template: _.template($("#signupTemplate").html()),
    template1: _.template($("#listTemplate").html()),
    initialize: function () {
       
    },    
    render: function(){
        var that = this;
        this.model = new List(); 
        this.model.fetch({
            success:function(model, response, xhr){
                var userDetails = new List(response);
                $(that.el).html(that.template1({
                                                 details:userDetails.toJSON()
                                            }));
            }
        });
    }
});
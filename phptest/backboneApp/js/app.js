var route =  Backbone.Router.extend({
    routes: {
        'addContact'   : 'addContact',
        'listContact'  : 'listContact',
        'updateContact/:id'  : 'updateContact',
        'deleteContact/:id'  : 'deleteContact',
        '*actions'      : 'defaultAction'
        }, 
        
    defaultAction: function(){   
       
    },
    addContact: function(){
      var view = new signUpView();
      view.render();        
    },
    listContact: function(){
      var view = new listView();
      view.render();
    },
    updateContact: function(id){
      var view = new updateView();
      view.render(id);
    },
    deleteContact: function(id){
        var view = new deleteView();
        view.render(id);
    }
    
});

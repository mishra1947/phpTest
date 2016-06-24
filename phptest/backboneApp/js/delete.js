var Delete = Backbone.Model.extend({
    //urlRoot: "http://bb-app.com/php/delete.php",
    initialize: function () {

    }
});


var deleteView = Backbone.View.extend({
    initialize: function () {

    },
    render: function (id) {
        this.model = new Delete({"id": id});
        this.model.url = "http://bb-app.com/php/delete.php?id="+id;
        this.model.destroy({
            success: function (model, respose, options) {
                console.log("The model has been deleted");
                Backbone.history.navigate("#listContact", {trigger: true, replace: true});
                return false;
            },
            error: function (model, xhr, options) {
                console.log("Something went wrong while deleting the model");
            }
        });
    }
});

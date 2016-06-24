var Update = Backbone.Model.extend({
    //urlRoot: "http://bb-app.com/php/update/select.php",
    initialize: function () {

    }
});
var updateView = Backbone.View.extend({
    el: $("#search_container"),
    template: _.template($("#updateTemplate").html()),
    initialize: function () {

    },
    events: {
        "submit": "updateAction"
    },
    render: function (id) {
        var that = this;
        var select = new Update();
        select.url = "http://bb-app.com/php/update/select.php?id=" + id;
        select.fetch({
            success: function (model, response, xhr) {
                var userDetail = new Update(response);
                $(that.el).html(that.template({detail: userDetail.toJSON()}));
            },
            error: function () {
                console.log("Error in data fetching");
            }
        });
    },
    updateAction: function () {
        var _id = $(".updateButton").val();
        var id = _id.substr((_id.indexOf('-')) + 1);
        var full_name = $('#full_name').val(),
                email = $('#email').val(),
                phone = $('#phone').val(),
                address = $('#address').val();
        var update = new Update();
        update.urlRoot = "http://bb-app.com/php/update/update.php?id=" + id;
        update.set({
            full_name: full_name,
            email: email,
            phone: phone,
            address: address
        });
        update.save(null,{
            success: function (model, response, options) {
                console.log("The model has been updated to the server");
            }
        });
        Backbone.history.navigate("#listContact", {trigger: true, replace: true});
        return false;
    }
});
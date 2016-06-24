'use strict';

angular.module('confusionApp')

        .controller('MenuController', ['$scope', 'menuFactory', function ($scope, menuFactory) {

                $scope.tab = 1;
                $scope.filtText = '';
                $scope.showDetails = false;

                $scope.showMenu = false;
                $scope.message = "Loading ...";
                menuFactory.getDishes().query(
                        function (response) {
                            $scope.dishes = response;
                            $scope.showMenu = true;
                        },
                        function (response) {
                            $scope.message = "Error: " + response.status + " " + response.statusText;
                        });
                $scope.select = function (setTab) {
                    $scope.tab = setTab;

                    if (setTab === 2) {
                        $scope.filtText = "appetizer";
                    } else if (setTab === 3) {
                        $scope.filtText = "mains";
                    } else if (setTab === 4) {
                        $scope.filtText = "dessert";
                    } else {
                        $scope.filtText = "";
                    }
                };

                $scope.isSelected = function (checkTab) {
                    return ($scope.tab === checkTab);
                };

                $scope.toggleDetails = function () {
                    $scope.showDetails = !$scope.showDetails;
                };
            }])

        .controller('ContactController', ['$scope', function ($scope) {

                $scope.feedback = {mychannel: "", firstName: "", lastName: "", agree: false, email: ""};

                var channels = [{value: "tel", label: "Tel."}, {value: "Email", label: "Email"}];

                $scope.channels = channels;
                $scope.invalidChannelSelection = false;

            }])

        .controller('FeedbackController', ['$scope', '$stateParams', 'feedbackFactory', function ($scope,$stateParams,feedbackFactory) {

                $scope.sendFeedback = function () {

                    console.log($scope.feedback);

                    if ($scope.feedback.agree && ($scope.feedback.mychannel === "")) {
                        $scope.invalidChannelSelection = true;
                        console.log('incorrect');
                    } else {
                        $scope.invalidChannelSelection = false;
                        feedbackFactory.getFeedback().save(null,$scope.feedback);
                        $scope.feedback = {mychannel: "", firstName: "", lastName: "", agree: false, email: ""};
                        $scope.feedback.mychannel = "";
                        $scope.feedbackForm.$setPristine();
                        console.log($scope.feedback);
                    }
                };
            }])

        .controller('DishDetailController', ['$scope', '$stateParams', 'menuFactory', function ($scope, $stateParams, menuFactory) {

                $scope.showDish = false;
                $scope.message = "Loading ...";
                $scope.dish = menuFactory.getDishes().get({id: parseInt($stateParams.id, 10)})
                        .$promise.then(
                                function (response) {
                                    $scope.dish = response;
                                    $scope.showDish = true;
                                },
                                function (response) {
                                    $scope.message = "Error: " + response.status + " " + response.statusText;
                                }
                        );
            }])

        .controller('DishCommentController', ['$scope', 'menuFactory', function ($scope,menuFactory) {

                $scope.feedback = {date: "", Name: "", rating: "", comment: ""};
                $scope.feedback.rating = 5;

                $scope.submitComment = function () {
                  console.log($scope.feedback);
                    $scope.feedback.date = new Date().toISOString();
                    var data = {
                        rating: $scope.feedback.rating,
                        comment: $scope.feedback.comment,
                        author: $scope.feedback.Name,
                        date: $scope.feedback.date
                    };
                    $scope.dish.comments.push(data);

                menuFactory.getDishes().update({id:$scope.dish.id},$scope.dish);

                                $scope.commentForm.$setPristine();
                                $scope.feedback = {date: "", Name: "", rating: '', comment: ""};
                                $scope.feedback.rating = 5;
                            };
            }])

        // implement the IndexController and About Controller here
        .controller('IndexController', ['$scope', 'menuFactory', 'corporateFactory', function ($scope, menuFactory, corporateFactory) {
                //for featured dish
                $scope.showDish = false;
                $scope.showChef = false;
                $scope.showPromotion = false;
                $scope.message = "Loading ...";
                $scope.dish = menuFactory.getDishes().get({id: 0})
                .$promise.then(
                            function(response){
                                $scope.dish = response;
                                $scope.showDish = true;
                            },
                            function(response) {
                                $scope.message = "Error: "+response.status + " " + response.statusText;
                            }
                        );
                $scope.promotion = menuFactory.getPromotion().get({id: 0})
                .$promise.then(
                            function(response){
                                $scope.promotion = response;
                                $scope.showPromotion = true;
                            },
                            function(response) {
                                $scope.message = "Error: "+response.status + " " + response.statusText;
                            }
                        );
                $scope.executiveChef = corporateFactory.getLeaders().get({id: 3})
                        .$promise.then(
                            function(response){
                                $scope.executiveChef = response;
                                $scope.showChef = true;
                            },
                            function(response) {
                                $scope.message = "Error: "+response.status + " " + response.statusText;
                            }
                        );

            }])

        .controller('AboutController', ['$scope', 'corporateFactory', function ($scope, corporateFactory) {
                $scope.showLeaders = false;
                $scope.message = "Loading ...";
                corporateFactory.getLeaders().query(
                        function (response) {
                            $scope.showLeaders = true;
                            $scope.corporateLeaders = response; 
                        },
                        function (response) {
                            $scope.message = "Error: " + response.status + " " + response.statusText;
                        });
            }])


        ;


angular.module('confusionApp')

        .controller('MenuController', ['$scope','$routeParams','menuFactory', function ($scope,$routeParams,menuFactory) {

                $scope.tab = 1;
                $scope.filtText = '';
                $scope.showDetails = false;
                $scope.showButton = "Show Comments";
                $scope.dishes = menuFactory.getDishes();
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

        .controller('FeedbackController', ['$scope', function ($scope) {

                $scope.sendFeedback = function () {

                    console.log($scope.feedback);

                    if ($scope.feedback.agree && ($scope.feedback.mychannel === "")) {
                        $scope.invalidChannelSelection = true;
                        console.log('incorrect');
                    } else {
                        $scope.invalidChannelSelection = false;
                        $scope.feedback = {mychannel: "", firstName: "", lastName: "", agree: false, email: ""};
                        $scope.feedback.mychannel = "";
                        $scope.feedbackForm.$setPristine();
                        console.log($scope.feedback);
                    }
                };
            }])

        .controller('DishDetailController', ['$scope','$routeParams','menuFactory', function ($scope,$routeParams,menuFactory) {

               var dish= menuFactory.getDish(parseInt($routeParams.id,10));
               $scope.dish = dish;
               console.log($scope.dish);

            }])

        .controller('DishCommentController', ['$scope','$routeParams','menuFactory', function ($scope,$routeParams,menuFactory) {
                 $scope.feedback = {remainingChar:"", Name: "", rating: "" , comment: ""};
                $scope.feedback.rating = 5;
                $scope.feedback.remainingChar = 50;
//                $scope.Ratings = [{
//                        rating: "1"
//                    }, {
//                        rating: "2"
//                    }, {
//                        rating: "3"
//                    }, {
//                        rating: "4"
//                    }, {
//                        rating: "5"
//                    }];
               
              $scope.show= false;
              
               $scope.counter = function(){
                   var minchar =50;
                   if($scope.feedback.comment.length>0){
                       $scope.show = true;
                   }
                   $scope.feedback.remainingChar =  minchar - $scope.feedback.comment.length;
               };
                $scope.submitComment = function () {
                     console.log($scope.feedback);
                    $scope.date= new Date().toISOString();
                    $scope.dish = menuFactory.getDish(parseInt($routeParams.id),10);
                    $scope.dish.comments.push({
                        rating: $scope.feedback.rating,
                        comment: $scope.feedback.comment,
                        author: $scope.feedback.Name,
                        date: $scope.date
                    });
                    $scope.feedback = {mychannel: "", Name: "", rating: '' , comment: ""};

                    $scope.commentForm.$setPristine();
                    console.log($scope.feedback);
                        $scope.feedback.rating = 5;
                    
                };
            }])

        ;

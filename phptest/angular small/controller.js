angular.module("app", ['ngSanitize'])
        .run(['$anchorScroll', function ($anchorScroll) {
                $anchorScroll.yOffset = 50;   // always scroll by 50 extra pixels
            }])
        .controller('TestController', ['$scope', '$anchorScroll', '$location', '$cacheFactory','$log', function ($scope, $anchorScroll, $location, $cacheFactory,$log) {
                $scope.moto = "Click to see the magic............this is angular's magic! wow";
                $scope.myClass = "red";
                $scope.changeClass = function () {
                    if ($scope.myClass === "red") {
                        $scope.myClass = ["bold", "orange"];
                        $scope.myHtml = "<p>adding class dynamically using ng-class</p>";
                    } else {
                        $scope.myClass = "red";
                        $scope.myHtml = '';
                    }
                };
                $scope.options = [{value: 'red', lable: 'Red'}, {value: 'bold', lable: 'Bold'}, {value: 'green', lable: 'Green'}];
                //console.log($scope.options);
                $scope.newClass = $scope.options[0].value;

                var div = angular.element(document.querySelector('#demo'));
                div.addClass('red');
//for $anchorScroll service.
                $scope.gotoAnchor = function (x) {
                    var newHash = 'anchor' + x;
                    if ($location.hash() !== newHash) {
                        // set the $location.hash to `newHash` and
                        // $anchorScroll will automatically scroll to it
                        $location.hash('anchor' + x);
                    } else {
                        // call $anchorScroll() explicitly,
                        // since $location.hash hasn't changed
                        $anchorScroll();
                    }
                };

//for $catchFactory service.

                $scope.keys = [];
                $scope.cache = $cacheFactory('cacheId');
                $scope.put = function (key, value) {
                    if (angular.isUndefined($scope.cache.get(key))) {
                        $scope.keys.push(key);
                    }
                    $scope.cache.put(key, angular.isUndefined(value) ? null : value);
                };

                //$log service
                $scope.$log = $log;
                $scope.message = "hello world";
                //$message service
                
            }]);
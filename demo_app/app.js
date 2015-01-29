(function (window) {
    var angular = window.angular;
    angular.module('demoApp', ['ngResource'])
            .factory('demo_zone', [
                '$resource',
                function ($resource) {
                    //Makes a Resource and defines a custom method (update) and (add)
                    return $resource('/resful_api/www/demo_zone/user/:userId', {}, {
                        "update": {method: "PUT"},
                        "add": {'method': 'POST'}
                    });
                }
            ])
            .controller('AppController', [
                '$scope',
                'demo_zone',
                function ($scope, Demo_zone) {
                    $scope.log = [];

                    //---------------  A GET ONE AND PUT ONE DEMO
                    var demoOne = Demo_zone.get({'userId': 1}); // Calls: GET 
                    demoOne.name = 'Steven Smith';
                    demoOne.$update({'userId': 1}); // Calls: PUT
                    demoOne.$promise.then(function (a) {
                        $scope.log.push('A GET ONE AND PUT ONE DEMO ->');
                        $scope.log.push('After GET and then PUT, the PUT Response: ' + angular.toJson(a));
                        $scope.log.push('-- BREAK --');
//                        console.log('GET AND PUT: ', angular.toJson(a));
                    });


                    //---------------  A GET ALL DEMO
                    var demoTwo = Demo_zone.query(); // Calls: GET
                    demoTwo.$promise.then(function (a) {
                        $scope.log.push('A GET ALL DEMO ->');
                        $scope.log.push('After GET the Response: ' + angular.toJson(a));
                        $scope.log.push('-- BREAK --');
                    });


                    //---------------  A DELETE ONE DEMO
                    var demoThree = Demo_zone.delete({'userId': 1}); // Calls: DELETE
                    demoThree.$promise.then(function (a) {
                        $scope.log.push('A DELETE ONE DEMO ->');
                        $scope.log.push('After DELETE the Response: ' + angular.toJson(a));
                        $scope.log.push('-- BREAK --');
                    });


                    //---------------  A ADD ONE DEMO
                    var demoFour = Demo_zone.add({'userId': 2}, {name: 'someone'});
                    demoFour.$promise.then(function (a) {
                        $scope.log.push('A ADD ONE DEMO ->');
                        $scope.log.push('After POST the Response: ' + angular.toJson(a));
                        $scope.log.push('-- BREAK --');
                    });
                }
            ]);
})(window);
(function(window) {
    var angular = window.angular;
    angular.module('demoApp', ['ngResource'])
            .factory('demo_zone', [
                '$resource',
                function($resource) {
                    //Makes a Resource and defines a custom method (update)
                    return $resource('/resful_api/www/demo_zone/user/:userId', {
//                        userId: "@userId"
                    }, {
                        "update": {
                            method: "PUT"
                        },
                        "reviews": {
                            'method': 'GET',
                            isArray: true
                        }
                    });
                }
            ])
            .controller('AppController', [
                '$scope',
                'demo_zone',
                function($scope, Demo_zone) {
                    $scope.log = [];

//                    var bookings = Demo_zone.query(); // Calls: GET /api/booking/

// Get Booking ID 1
//                    var booking = Demo_zone.get({}, {'Id': 1}); // Calls: GET /api/booking/1


                    var booking = Demo_zone.get({'userId': 1}); // Calls: GET /api/booking/1
                    booking.name = 'Steven Smith';
                    booking.$update({'userId': 1});

                    


// Change a value
//                    booking.fees = 34;
//                    console.log(booking);
//                    Demo_zone.update({Id: 1}, {a: 5});
// Save the changes (update it)
//                    booking.$save(); // Calls: POST /api/booking/1

// Delete Booking ID 1
//                    Demo_zone.delete({}, {'Id': 1}); // Calls: DELETE /api/booking/1

// Get Reviews
//                    var reviews = Demo_zone.reviews();

//                    var demo = Demo_zone.get({
//                        id: 1234,
//                        type: 'demoType'
//                    }, function(a) {
//                        $scope.log.push('GET /resful_api/www/demo_zone/demoType/1234');
//                        $scope.log.push('Response: ' + angular.toJson(a));
//                    });
//
//
//
//                    demo.name = 'Testname';
//                    demo.$save();

//                    Demo_zone.update({
//                        id: 1234,
//                        type: 'demoType'
//                    }, demo, function(response) {
//                        $scope.log.push('PUT /resful_api/www/demo_zone/demoType/1234');
//                        $scope.log.push('Response: ' + angular.toJson(response));
//                    });
                }
            ]);
})(window);
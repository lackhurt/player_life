define(['angular'], function(angular) {
    console.log(angular);
    window.PhoneListCtrl = function($scope) {
        $scope.phones = [
            {"name": "Nexus S",
                "snippet": "Fast just got faster with Nexus S."},
            {"name": "Motorola XOOM™ with Wi-Fi",
                "snippet": "The Next, Next Generation tablet."},
            {"name": "MOTOROLA XOOM™",
                "snippet": "The Next, Next Generation tablet."}
        ];
    }
});

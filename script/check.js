angular.module('MyApp')
.controller('CheckCtrl', function($scope, $http, $location, $anchorScroll, $routeParams) {
  this.submit = function() {
    console.log('submitted');
  }

  this.dateList = [
                   '2月下旬',
                   '3月上旬', '3月中旬', '3月下旬',
                   '4月上旬', '4月中旬', '4月下旬',
                   '5月上旬', '5月中旬', '5月下旬',
                   '6月上旬', '6月中旬', '6月下旬',
                  ];

  this.prefList = [ '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'];

    this.maxHiveNumber = 10;
    $scope.getNumber = function(num) {
      return new Array(num);
    }

  this.checkTiming = function(prefId, start) {
    var swarmDate = this.getSwarmDateKey(prefId);
    var idealPrepareFinDate = swarmDate - 1;

    return (start - idealPrepareFinDate);
  }

  this.getSwarmDateKey = function(prefId) {
    var dateKey = 0;
    if( 39 <= prefId &&  prefId <= 46) {
      dateKey = 3;
    } else if(21 <= prefId && prefId <= 38 ){
      dateKey = 4;
      // 北信越
    } else if(15 <= prefId && prefId <= 20) {
      dateKey = 5;

    } else if(8 <= prefId && prefId <= 10) {
      dateKey = 5;

      // 関東南部
    } else if(10 <= prefId && prefId <= 13 ){
      dateKey = 4;

    } else if(prefId == 1 || prefId == 2 || prefId==4) {
      dateKey = 7;
    } else {
      dateKey = 6;
    }
    return dateKey;
  };


});

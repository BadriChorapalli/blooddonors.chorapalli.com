// Including ngTranslate
//--> Converter  http://www.rapidmonkey.com/unicodeconverter/

// Configuring your module, asking for ngTranslate as dependency
var app = angular.module('myApp', ['ngTranslate']);
var translateProvider=null
// Configuring $translateProvider
app.config(['$translateProvider', function ($translateProvider) {
    
    // Simply register translation table as object hash
    $translateProvider.translations('en_EN', {
	'T_BLD':'Blood',
    'T_DNRS':'Donors',
    'M_HM': 'Home',
    'M_RGSTRTN': 'Registration',
	'M_REQ':'Request',
	'M_SER':'Search',
	'M_FEED':'Feedback',
    'H_Title1':'TO SAVE',
	'H_Title2':'A LIFE',
    'LANG_EN': 'English',
	'LANG_HI': '\u0939\u093F\u0928\u094D\u0926\u0940',
    'LANG_TE': '\u0C24\u0C46\u0C32\u0C41\u0C17\u0C41',
	'LANG_TA': '\u0BA4\u0BAE\u0BBF\u0BB4\u0BCD',
	
    });   

    $translateProvider.translations('te_TE', {
		'T_BLD': '\u0C30\u0C15\u0C4D\u0C24',
    'T_DNRS': '\u0C26\u0C3E\u0C24\u0C32\u0C15\u0C41',
	'M_HM': '\u0C39\u0C4B\u0C2E\u0C4D',
	'M_RGSTRTN': '\u0C28\u0C2E\u0C4B\u0C26\u0C41',
	'M_REQ': '\u0C05\u0C2D\u0C4D\u0C2F\u0C30\u0C4D\u0C25\u0C28',
	'M_SER': '\u0C36\u0C4B\u0C27\u0C28',
	'M_FEED': '\u0C05\u0C2D\u0C3F\u0C2A\u0C4D\u0C30\u0C3E\u0C2F\u0C02',
    'LANG_EN': 'English',
	'LANG_HI': '\u0939\u093F\u0928\u094D\u0926\u0940',
    'LANG_TE': '\u0C24\u0C46\u0C32\u0C41\u0C17\u0C41',
	'LANG_TA': '\u0BA4\u0BAE\u0BBF\u0BB4\u0BCD'

    });  
	  $translateProvider.translations('ta_TA', {
	'T_BLD': '\u0B87\u0BB0\u0BA4\u0BCD\u0BA4\u0BAE\u0BCD', 
     'T_DNRS':'Donors',
     'M_HM': '\u0BAE\u0BC1\u0B95\u0BAA\u0BCD\u0BAA\u0BC1', 
	 'M_RGSTRTN': '\u0BAA\u0BA4\u0BBF\u0BB5\u0BC1',
	 'M_REQ': '\u0B95\u0BC7\u0BBE\u0BB0\u0BBF\u0B95\u0BCD\u0B95\u0BC8',
	 'M_SER': '\u0BA4\u0BC7\u0B9F\u0BC1',
	 'M_FEED': '\u0B95\u0BB0\u0BC1\u0BA4\u0BCD\u0BA4\u0BC1',
		'LANG_EN': 'English',
		'LANG_HI': '\u0939\u093F\u0928\u094D\u0926\u0940',
		'LANG_TE': '\u0C24\u0C46\u0C32\u0C41\u0C17\u0C41',
		'LANG_TA': '\u0BA4\u0BAE\u0BBF\u0BB4\u0BCD'

    });
	$translateProvider.translations('hi_HI', {
	'T_BLD':'Blood',
    'T_DNRS':'Donors',
    'M_HM': 'Home',
    'M_RGSTRTN': 'Registration',
	'M_REQ':'Request',
	'M_SER':'Search',
	'M_FEED':'Feedback',
    'H_Title1':'TO SAVE',
	'H_Title2':'A LIFE',
    'LANG_EN': 'English',
	'LANG_HI': '\u0939\u093F\u0928\u094D\u0926\u0940',
    'LANG_TE': '\u0C24\u0C46\u0C32\u0C41\u0C17\u0C41',
	'LANG_TA': '\u0BA4\u0BAE\u0BBF\u0BB4\u0BCD',
	
    });
    
    $translateProvider.uses('en_EN');
	translateProvider=$translateProvider
}]);
/*app.controller('ctrl', ['$translate', '$scope', function ($translate, $scope) {
    $scope.toggleLang = function () {
        $translate.uses() === 'en_EN'? $translate.uses('de_DE') : $translate.uses('en_EN');
    };
}]);*/

app.controller('ctrl', ['$translate', '$scope', function ($translate, $scope){

  $scope.changeLanguage = function (langKey) {
  alert(langKey)
    $translate.uses(langKey);
  };
  $scope.languages = [ {code: 'en_EN', name: 'LANG_EN'}, {code: 'hi_HI', name: 'LANG_HI'},{code: 'te_TE', name: 'LANG_TE'},{code: 'ta_TA', name: 'LANG_TA'}];
  $scope.item = $scope.languages[0];
  $scope.update = function() {
    console.log($scope.item.code, $scope.item.name)
   $translate.uses($scope.item.code);
  }
}]);


//]]>  


<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
/*$route['register/(:num)'] 			= "register/index/$1";*/
/*$route['categories/(:any)/(:num)']                = "home/categories/$1/$2";
$route['categories']                = "home/categories";*/
$route['account/(:num)']                = "account/index/$1";
$route['edit-ad-details/(:num)']                = "upload/edit_ad/$1";
$route['verify-email']                = "home/verify_email";
$route['categories/(:any)/(:num)']                = "home/categories/$1/$2";
$route['filter/(:any)/(:num)/(:num)/(:num)/(:num)/(:any)/(:num)/(:any)']                = "home/filter/$1/$2/$3/$4/$5/$6/$7/$8";
$route['sub_category/(:any)/(:num)']                = "home/sub_category/$1/$2";
$route['city/(:any)/(:num)']                = "home/city/$1/$2";
//$route['ads/(:any)/(:num)/(:num)']                = "home/ads/$1/$2/$3";
//$route['Ads/(:any)/(:any)/(:num)/(:num)']                = "home/add/$1/$2/$3/$4";
//$route['Ad/(:any)/(:any)/(:num)/(:num)']                = "home/addd/$1/$2/$3/$4";
//$route['ad/(:any)/(:num)/(:num)']                = "home/ad/$1/$2/$3";
$route['state/(:any)/(:num)']                = "home/state/$1/$2";
$route['mobile-cell-phones']                = "home/sub_category/mobile-cell-phones/9";
$route['mobile-cell-phones/(:num)']                = "home/sub_category/mobile-cell-phones/9/$1";
$route['mobile-phone-accessories']                = "home/sub_category/mobile-phone-accessories/12";
$route['mobile-phone-accessories/(:num)']                = "home/sub_category/mobile-phone-accessories/12/$1";
$route['used-cars']                = "home/sub_category/used-cars/13";
$route['used-cars/(:num)']                = "home/sub_category/used-cars/13/$1";
$route['used-bikes']                = "home/sub_category/used-bikes/29";
$route['used-bikes/(:num)']                = "home/sub_category/used-bikes/29/$1";
$route['auto-parts-accessories']                = "home/sub_category/auto-parts-accessories/30";
$route['auto-parts-accessories/(:num)']                = "home/sub_category/auto-parts-accessories/30/$1";
$route['modify-car-bikes']                = "home/sub_category/modify-car-bikes/31";
$route['modify-car-bikes/(:num)']                = "home/sub_category/modify-car-bikes/31/$1";
$route['rent-car']                = "home/sub_category/rent-car/32";
$route['rent-car/(:num)']                = "home/sub_category/rent-car/32/$1";
$route['laptops-desktops']                = "home/sub_category/laptops-desktops/44";
$route['laptops-desktops/(:num)']                = "home/sub_category/laptops-desktops/44/$1";
$route['used-tablets']                = "home/sub_category/used-tablets/45";
$route['used-tablets/(:num)']                = "home/sub_category/used-tablets/45/$1";
$route['cds-dvds-movies']                = "home/sub_category/cds-dvds-movies/46";
$route['cds-dvds-movies/(:num)']                = "home/sub_category/cds-dvds-movies/46/$1";
$route['computer-accessories']                = "home/sub_category/computer-accessories/47";
$route['computer-accessories/(:num)']                = "home/sub_category/computer-accessories/47/$1";
$route['administrative-support']                = "home/sub_category/administrative-support/14";
$route['administrative-support/(:num)']                = "home/sub_category/administrative-support/14/$1";
$route['arts-culture']                = "home/sub_category/arts-culture/57";
$route['arts-culture/(:num)']                = "home/sub_category/arts-culture/57/$1";
$route['bankers-brokers']                = "home/sub_category/bankers-brokers/58";
$route['bankers-brokers/(:num)']                = "home/sub_category/bankers-brokers/58/$1";
$route['construction-labour']                = "home/sub_category/construction-labour/59";
$route['construction-labour/(:num)']                = "home/sub_category/construction-labour/59/$1";
$route['customer-service-call-centre']                = "home/sub_category/customer-service-call-centre/60";
$route['customer-service-call-centre/(:num)']                = "home/sub_category/customer-service-call-centre/60/$1";
$route['design-architecture']                = "home/sub_category/design-architecture/61";
$route['design-architecture/(:num)']                = "home/sub_category/design-architecture/61/$1";
$route['education-training']                = "home/sub_category/education-training/62";
$route['education-training/(:num)']                = "home/sub_category/education-training/62/$1";
$route['engineering']                = "home/sub_category/engineering/63";
$route['engineering/(:num)']                = "home/sub_category/engineering/63/$1";
$route['executive']                = "home/sub_category/executive/64";
$route['executive/(:num)']                = "home/sub_category/executive/64/$1";
$route['government-jobs']                = "home/sub_category/government-jobs/65";
$route['government-jobs/(:num)']                = "home/sub_category/government-jobs/65/$1";
$route['government-public-service']                = "home/sub_category/government-public-service/66";
$route['government-public-service/(:num)']                = "home/sub_category/government-public-service/66/$1";
$route['health-care']                = "home/sub_category/health-care/67";
$route['health-care/(:num)']                = "home/sub_category/health-care/67/$1";
$route['it-software']                = "home/sub_category/it-software/68";
$route['it-software/(:num)']                = "home/sub_category/it-software/68/$1";
$route['legal-consulting-hr']                = "home/sub_category/legal-consulting-hr/69";
$route['legal-consulting-hr/(:num)']                = "home/sub_category/legal-consulting-hr/69/$1";
$route['operations']                = "home/sub_category/operations/70";
$route['operations/(:num)']                = "home/sub_category/operations/70/$1";
$route['marketing-advertising-pr']                = "home/sub_category/marketing-advertising-pr/71";
$route['marketing-advertising-pr/(:num)']                = "home/sub_category/marketing-advertising-pr/71/$1";
$route['part-time-jobs']                = "home/sub_category/part-time-jobs/72";
$route['part-time-jobs/(:num)']                = "home/sub_category/part-time-jobs/72/$1";
$route['tour-travel-hospitality']                = "home/sub_category/tour-travel-hospitality/73";
$route['tour-travel-hospitality/(:num)']                = "home/sub_category/tour-travel-hospitality/73/$1";
$route['sales-distribution']                = "home/sub_category/sales-distribution/74";
$route['sales-distribution/(:num)']                = "home/sub_category/sales-distribution/74/$1";
$route['resumes']                = "home/sub_category/resumes/75";
$route['resumes/(:num)']                = "home/sub_category/resumes/75/$1";
$route['drivers']                = "home/sub_category/drivers/76";
$route['drivers/(:num)']                = "home/sub_category/drivers/76/$1";
$route['retail-wholesale']                = "home/sub_category/retail-wholesale/77";
$route['retail-wholesale/(:num)']                = "home/sub_category/retail-wholesale/77/$1";
$route['cat-classes']                = "home/sub_category/cat-classes/15";
$route['cat-classes/(:num)']                = "home/sub_category/cat-classes/15/$1";
$route['computer-classes']                = "home/sub_category/computer-classes/18";
$route['computer-classes/(:num)']                = "home/sub_category/computer-classes/18/$1";
$route['cooking-classes']                = "home/sub_category/cooking-classes/19";
$route['cooking-classes/(:num)']                = "home/sub_category/cooking-classes/19/$1";
$route['mehandi-classes']                = "home/sub_category/mehandi-classes/20";
$route['mehandi-classes/(:num)']                = "home/sub_category/mehandi-classes/20/$1";
$route['driving-classes']                = "home/sub_category/driving-classes/21";
$route['driving-classes/(:num)']                = "home/sub_category/driving-classes/21/$1";
$route['other-classes']                = "home/sub_category/other-classes/22";
$route['other-classes/(:num)']                = "home/sub_category/other-classes/22/$1";
$route['commercial-shop']                = "home/sub_category/commercial-shop/16";
$route['commercial-shop/(:num)']                = "home/sub_category/commercial-shop/16/$1";
$route['flats-for-rent']                = "home/sub_category/flats-for-rent/33";
$route['flats-for-rent/(:num)']                = "home/sub_category/flats-for-rent/33/$1";
$route['holidays-rentals']                = "home/sub_category/holidays-rentals/34";
$route['holidays-rentals/(:num)']                = "home/sub_category/holidays-rentals/34/$1";
$route['houses-for-rent']                = "home/sub_category/houses-for-rent/35";
$route['houses-for-rent/(:num)']                = "home/sub_category/houses-for-rent/35/$1";
$route['office-space-for-rent']                = "home/sub_category/office-space-for-rent/36";
$route['office-space-for-rent/(:num)']                = "home/sub_category/office-space-for-rent/36/$1";
$route['roommates-room-for-rent']                = "home/sub_category/roommates-room-for-rent/37";
$route['roommates-room-for-rent/(:num)']                = "home/sub_category/roommates-room-for-rent/37/$1";
$route['short-term-rentals']                = "home/sub_category/short-term-rentals/38";
$route['short-term-rentals/(:num)']                = "home/sub_category/short-term-rentals/38/$1";
$route['storage-warehouse']                = "home/sub_category/storage-warehouse/39";
$route['storage-warehouse/(:num)']                = "home/sub_category/storage-warehouse/39/$1";
$route['flats-for-sale']                = "home/sub_category/flats-for-sale/40";
$route['flats-for-sale/(:num)']                = "home/sub_category/flats-for-sale/40/$1";
$route['houses-for-sale']                = "home/sub_category/houses-for-sale/41";
$route['houses-for-sale/(:num)']                = "home/sub_category/houses-for-sale/41/$1";
$route['land-for-sale']                = "home/sub_category/land-for-sale/42";
$route['land-for-sale/(:num)']                = "home/sub_category/land-for-sale/42/$1";
$route['office-space-for-sale']                = "home/sub_category/office-space-for-sale/43";
$route['office-space-for-sale/(:num)']                = "home/sub_category/office-space-for-sale/43/$1";
$route['furniture']                = "home/sub_category/furniture/17";
$route['furniture/(:num)']                = "home/sub_category/furniture/17/$1";
$route['home-appliances']                = "home/sub_category/home-appliances/48";
$route['home-appliances/(:num)']                = "home/sub_category/home-appliances/48/$1";
$route['home-store']                = "home/sub_category/home-store/49";
$route['home-store/(:num)']                = "home/sub_category/home-store/49/$1";
$route['musical-instruments']                = "home/sub_category/musical-instruments/50";
$route['musical-instruments/(:num)']                = "home/sub_category/musical-instruments/50/$1";
$route['pets']                = "home/sub_category/pets/51";
$route['pets/(:num)']                = "home/sub_category/pets/51/$1";
$route['sporting-goods']                = "home/sub_category/sporting-goods/52";
$route['sporting-goods/(:num)']                = "home/sub_category/sporting-goods/52/$1";
$route['skin-treatment']                = "home/sub_category/skin-treatment/53";
$route['skin-treatment/(:num)']                = "home/sub_category/skin-treatment/53/$1";
$route['hair-salon']                = "home/sub_category/hair-salon/54";
$route['hair-salon/(:num)']                = "home/sub_category/hair-salon/54/$1";
$route['hair-treatment']                = "home/sub_category/hair-treatment/55";
$route['hair-treatment/(:num)']                = "home/sub_category/hair-treatment/55/$1";
$route['books-magazines']                = "home/sub_category/books-magazines/56";
$route['books-magazines/(:num)']                = "home/sub_category/books-magazines/56/$1";
$route['air-conditioner']                = "home/sub_category/air-conditioner/97";
$route['air-conditioner/(:num)']                = "home/sub_category/air-conditioner/97/$1";
$route['bank']                = "home/sub_category/bank/98";
$route['bank/(:num)']                = "home/sub_category/bank/98/$1";
$route['broadband']                = "home/sub_category/broadband/99";
$route['broadband/(:num)']                = "home/sub_category/broadband/99/$1";
$route['career-counselling']                = "home/sub_category/career-counselling/100";
$route['career-counselling/(:num)']                = "home/sub_category/career-counselling/100/$1";
$route['caterer-tiffin']                = "home/sub_category/caterer-tiffin/101";
$route['caterer-tiffin/(:num)']                = "home/sub_category/caterer-tiffin/101/$1";
$route['cooking-gas']                = "home/sub_category/cooking-gas/102";
$route['cooking-gas/(:num)']                = "home/sub_category/cooking-gas/102/$1";
$route['detective-agency']                = "home/sub_category/detective-agency/103";
$route['detective-agency/(:num)']                = "home/sub_category/detective-agency/103/$1";
$route['freelance']                = "home/sub_category/freelance/104";
$route['freelance/(:num)']                = "home/sub_category/freelance/104/$1";
$route['insurance-financial']                = "home/sub_category/insurance-financial/105";
$route['insurance-financial/(:num)']                = "home/sub_category/insurance-financial/105/$1";
$route['legal-services']                = "home/sub_category/legal-services/106";
$route['legal-services/(:num)']                = "home/sub_category/legal-services/106/$1";
$route['maids-housekeeping']                = "home/sub_category/maids-housekeeping/107";
$route['maids-housekeeping/(:num)']                = "home/sub_category/maids-housekeeping/107/$1";
$route['marriage-halls']                = "home/sub_category/marriage-halls/108";
$route['marriage-halls/(:num)']                = "home/sub_category/marriage-halls/108/$1";
$route['modeling-agencies']                = "home/sub_category/modeling-agencies/109";
$route['modeling-agencies/(:num)']                = "home/sub_category/modeling-agencies/109/$1";
$route['moving-storage']                = "home/sub_category/moving-storage/110";
$route['moving-storage/(:num)']                = "home/sub_category/moving-storage/110/$1";
$route['railway-ticketting-agencies']                = "home/sub_category/railway-ticketting-agencies/111";
$route['railway-ticketting-agencies/(:num)']                = "home/sub_category/railway-ticketting-agencies/111/$1";
$route['vaastu']                = "home/sub_category/vaastu/112";
$route['vaastu/(:num)']                = "home/sub_category/vaastu/112/$1";
$route['web-design']                = "home/sub_category/web-design/113";
$route['web-design/(:num)']                = "home/sub_category/web-design/113/$1";
$route['arts-crafts']                = "home/sub_category/arts-crafts/23";
$route['arts-crafts/(:num)']                = "home/sub_category/arts-crafts/23/$1";
$route['dance']                = "home/sub_category/dance/24";
$route['dance/(:num)']                = "home/sub_category/dance/24/$1";
$route['food-drinks']                = "home/sub_category/food-drinks/25";
$route['food-drinks/(:num)']                = "home/sub_category/food-drinks/25/$1";
$route['lifestyle']                = "home/sub_category/lifestyle/26";
$route['lifestyle/(:num)']                = "home/sub_category/lifestyle/26/$1";
$route['music']                = "home/sub_category/music/27";
$route['music/(:num)']                = "home/sub_category/music/27/$1";
$route['book-stores']                = "home/sub_category/book-stores/78";
$route['book-stores/(:num)']                = "home/sub_category/book-stores/78/$1";
$route['car-dealers']                = "home/sub_category/car-dealers/79";
$route['car-dealers/(:num)']                = "home/sub_category/car-dealers/79/$1";
$route['cell-phone-repairs']                = "home/sub_category/cell-phone-repairs/80";
$route['cell-phone-repairs/(:num)']                = "home/sub_category/cell-phone-repairs/80/$1";
$route['clothes-shopes']                = "home/sub_category/clothes-shopes/81";
$route['clothes-shopes/(:num)']                = "home/sub_category/clothes-shopes/81/$1";
$route['computer-accessories']                = "home/sub_category/computer-accessories/82";
$route['computer-accessories/(:num)']                = "home/sub_category/computer-accessories/82/$1";
$route['doctors-specialists']                = "home/sub_category/doctors-specialists/83";
$route['doctors-specialists/(:num)']                = "home/sub_category/doctors-specialists/83/$1";
$route['flowers-gifts']                = "home/sub_category/flowers-gifts/84";
$route['flowers-gifts/(:num)']                = "home/sub_category/flowers-gifts/84/$1";
$route['food-beverage-products']                = "home/sub_category/food-beverage-products/85";
$route['food-beverage-products/(:num)']                = "home/sub_category/food-beverage-products/85/$1";
$route['health-care-centres']                = "home/sub_category/health-care-centres/86";
$route['health-care-centres/(:num)']                = "home/sub_category/health-care-centres/86/$1";
$route['home-decor-furnishings']                = "home/sub_category/home-decor-furnishings/87";
$route['home-decor-furnishings/(:num)']                = "home/sub_category/home-decor-furnishings/87/$1";
$route['hotels-resorts']                = "home/sub_category/hotels-resorts/88";
$route['hotels-resorts/(:num)']                = "home/sub_category/hotels-resorts/88/$1";
$route['mobile-accessories']                = "home/sub_category/mobile-accessories/89";
$route['mobile-accessories/(:num)']                = "home/sub_category/mobile-accessories/89/$1";
$route['motor-cycle-dealers']                = "home/sub_category/motor-cycle-dealers/90";
$route['motor-cycle-dealers/(:num)']                = "home/sub_category/motor-cycle-dealers/90/$1";
$route['photo-studio']                = "home/sub_category/photo-studio/91";
$route['photo-studio/(:num)']                = "home/sub_category/photo-studio/91/$1";
$route['real-estate-agents']                = "home/sub_category/real-estate-agents/92";
$route['real-estate-agents/(:num)']                = "home/sub_category/real-estate-agents/92/$1";
$route['restuarants']                = "home/sub_category/restuarants/93";
$route['restuarants/(:num)']                = "home/sub_category/restuarants/93/$1";
$route['shopes-stores']                = "home/sub_category/shopes-stores/94";
$route['shopes-stores/(:num)']                = "home/sub_category/shopes-stores/94/$1";
$route['travel-agents']                = "home/sub_category/travel-agents/95";
$route['travel-agents/(:num)']                = "home/sub_category/travel-agents/95/$1";
$route['wedding-shopes']                = "home/sub_category/wedding-shopes/96";
$route['wedding-shopes/(:num)']                = "home/sub_category/wedding-shopes/96/$1";
$route['school-colleges']                = "home/sub_category/school-colleges/114";
$route['school-colleges/(:num)']                = "home/sub_category/school-colleges/114/$1";
$route['colleges']                = "home/sub_category/colleges/115";
$route['colleges/(:num)']                = "home/sub_category/colleges/115/$1";
$route['parks']                = "home/sub_category/parks/116";
$route['parks/(:num)']                = "home/sub_category/parks/116/$1";
$route['temples']                = "home/sub_category/temples/117";
$route['temples/(:num)']                = "home/sub_category/temples/117/$1";
$route['water-falls']                = "home/sub_category/water-falls/118";
$route['water-falls/(:num)']                = "home/sub_category/water-falls/118/$1";
$route['manage-ads']                = "account/manage_ads";
$route['messages']                = "account/messages";
$route['settings']                = "account/settings";
$route['search/(:any)']                = "home/search/$1";
$route['insearch/(:any)/(:any)/(:num)/(:num)']                = "home/insearch/$1/$2/$3/$4";
$route['insearch-filter/(:any)/(:any)/(:num)/(:num)/(:num)/(:num)/(:num)/(:any)/(:num)/(:any)']   = "home/insearch_filter/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10";
$route['verify_ad']                = "home/verify_ad";
$route['mobile-phones']                = "home/categories/mobile-phones/6";
$route['mobile-phones/(:num)']                = "home/categories/mobile-phones/6/$1";
$route['vehicles']                = "home/categories/vehicles/7";
$route['vehicles/(:num)']                = "home/categories/vehicles/7/$1";
$route['classes']                = "home/categories/classes/10";
$route['classes/(:num)']                = "home/categories/classes/10/$1";
$route['electronics']                = "home/categories/electronics/8";
$route['electronics/(:num)']                = "home/categories/electronics/8/$1";
$route['events']                = "home/categories/events/14";
$route['events/(:num)']                = "home/categories/events/14/$1";
$route['home-lifestyle']                = "home/categories/home_lifestyle/12";
$route['home-lifestyle/(:num)']                = "home/categories/home_lifestyle/12/$1";
$route['jobs']                = "home/categories/jobs/9";
$route['jobs/(:num)']                = "home/categories/jobs/9/$1";
$route['list-business']                = "home/categories/list_business/15";
$route['list-business/(:num)']                = "home/categories/list_business/15/$1";
$route['real-estate']                = "home/categories/real_estate/11";
$route['real-estate/(:num)']                = "home/categories/real_estate/11/$1";
$route['school-colleges']                = "home/categories/school_colleges/16";
$route['school-colleges/(:num)']                = "home/categories/school_colleges/16/$1";
$route['services']                = "home/categories/services/13";
$route['services/(:num)']                = "home/categories/services/13/$1";
$route['tourist-places']                = "home/categories/tourist_places/17";
$route['tourist-places/(:num)']                = "home/categories/tourist_places/17/$1";
$route['category/show_category/(:num)'] = "category/show_category/$1";
$route['sub_categorys/show_sub_categorys/(:num)'] = "sub_categorys/show_sub_categorys/$1";
$route['types/show_types/(:num)']                = "types/show_types/$1";
$route['post/show_posts/(:num)'] = "post/show_posts/$1";
$route['(:any)/(:num)']                = "home/ad_details/$1/$2";

/*$route['(:any)/(:num)']                = "home/categories/$1/$2";*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */
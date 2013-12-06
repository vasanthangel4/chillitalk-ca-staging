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
 
$route['default_controller'] = 'home';

$route['en/sign_up/(:any)'] = 'sign_up';
$route['fr/sign_up/(:any)'] = 'sign_up';
$route['de/sign_up/(:any)'] = 'sign_up';
$route['se/sign_up/(:any)'] = 'sign_up';
$route['nl/sign_up/(:any)'] = 'sign_up';
$route['fi/sign_up/(:any)'] = 'sign_up';
$route['dk/sign_up/(:any)'] = 'sign_up';
$route['pl/sign_up/(:any)'] = 'sign_up';

$route['en/sign_up/step1'] = 'sign_up/step1';
$route['fr/sign_up/step1'] = 'sign_up/step1';
$route['de/sign_up/step1'] = 'sign_up/step1';
$route['se/sign_up/step1'] = 'sign_up/step1';
$route['nl/sign_up/step1'] = 'sign_up/step1';
$route['fi/sign_up/step1'] = 'sign_up/step1';
$route['dk/sign_up/step1'] = 'sign_up/step1';
$route['pl/sign_up/step1'] = 'sign_up/step1';

$route['en/sign_up/step2'] = 'sign_up/step2';
$route['fr/sign_up/step2'] = 'sign_up/step2';
$route['de/sign_up/step2'] = 'sign_up/step2';
$route['se/sign_up/step2'] = 'sign_up/step2';
$route['nl/sign_up/step2'] = 'sign_up/step2';
$route['fi/sign_up/step2'] = 'sign_up/step2';
$route['dk/sign_up/step2'] = 'sign_up/step2';
$route['pl/sign_up/step2'] = 'sign_up/step2';

$route['en/sign_up/step3'] = 'sign_up/step3';
$route['fr/sign_up/step3'] = 'sign_up/step3';
$route['de/sign_up/step3'] = 'sign_up/step3';
$route['se/sign_up/step3'] = 'sign_up/step3';
$route['nl/sign_up/step3'] = 'sign_up/step3';
$route['fi/sign_up/step3'] = 'sign_up/step3';
$route['dk/sign_up/step3'] = 'sign_up/step3';
$route['pl/sign_up/step3'] = 'sign_up/step3';

$route['en/sign_up/step4'] = 'sign_up/step4';
$route['fr/sign_up/step4'] = 'sign_up/step4';
$route['de/sign_up/step4'] = 'sign_up/step4';
$route['se/sign_up/step4'] = 'sign_up/step4';
$route['nl/sign_up/step4'] = 'sign_up/step4';
$route['fi/sign_up/step4'] = 'sign_up/step4';
$route['dk/sign_up/step4'] = 'sign_up/step4';
$route['pl/sign_up/step4'] = 'sign_up/step4';

$route['en/sign_up/welcome'] = 'sign_up/welcome';
$route['fr/sign_up/welcome'] = 'sign_up/welcome';
$route['de/sign_up/welcome'] = 'sign_up/welcome';
$route['se/sign_up/welcome'] = 'sign_up/welcome';
$route['nl/sign_up/welcome'] = 'sign_up/welcome';
$route['fi/sign_up/welcome'] = 'sign_up/welcome';
$route['dk/sign_up/welcome'] = 'sign_up/welcome';
$route['pl/sign_up/welcome'] = 'sign_up/welcome';


$route['^en/(.+)$'] = "$1";
$route['^fr/(.+)$'] = "$1";
$route['^de/(.+)$'] = "$1";
$route['^se/(.+)$'] = "$1";
$route['^nl/(.+)$'] = "$1";
$route['^fi/(.+)$'] = "$1";
$route['^dk/(.+)$'] = "$1";
$route['^pl/(.+)$'] = "$1";
 
// '/en' and '/fr' -> use default controller
$route['^en$'] = $route['default_controller'];
$route['^fr$'] = $route['default_controller'];
$route['^de$'] = $route['default_controller'];
$route['^se$'] = $route['default_controller'];
$route['^nl$'] = $route['default_controller'];
$route['^fi$'] = $route['default_controller'];
$route['^dk$'] = $route['default_controller'];
$route['^pl$'] = $route['default_controller'];


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
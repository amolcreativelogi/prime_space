<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
         'admin/getAmenityCategories',
         'admin/getAmenities',
         'admin/getCarType',
         'admin/getLocationTypes',
         'admin/getParkingTypes',
         'admin/getBookingDurationTypes',
         'admin/getUserandHost',  
         'userLogin',  
         'userRegistration', 
         'resetPassword', 
         'updatesaveprofile', 
         'admin/getUser', 
         'admin/getHost',
         'admin/getParkingList',
         'admin/getLandList',
         'admin/getallBookingList',
         'admin/getallParkingList',
         'admin/getallLandList',
         'admin/AssignPermission',
         'admin/PropertyApproval',
         'admin/getDocumentTypes',
         'admin/getUnitTypes',
         'admin/getCancellationTypes',
         'admin/getCancellationPolicies',
         'admin/getLandTypes',
         'admin/Host_Users',
         'admin/cmspages/getCMSPages',
         'admin/blogs/getBlogs',
         'admin/faq/getFaqs',
         'admin/faqs/getFaqCategories',
         'admin/faq/list/',
         'admin/roles/getUnauthorizedRoles/',
         'admin/roles/getAdminRoles',
         'frontend/getPropertyMasters',
         'frontend/bookProperty',
         'frontend/saveProperty',
         'user/DeteteRecord',
         'admin/DeleteRecord_hostuser',
         'frontend/getModuleList',
         'frontend/getAmenities',
         'user/RemoveParkigImage',
         'admin/cmspages/getCMSPages',
         'admin/blogs/getBlogs'
         
         
    ];

     // public function handle($request, Closure $next)
     //  {
     //      $regex = '#' . implode('|', $this->except_urls) . '#';

     //      if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path()))
     //      {
     //          return $this->addCookieToResponse($request, $next($request));
     //      }

     //      throw new TokenMismatchException;
     //  }

}

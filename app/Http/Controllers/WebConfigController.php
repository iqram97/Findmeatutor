<?php

namespace App\Http\Controllers;

use App\WebConfig;
use Illuminate\Http\Request;
use File;
use Toastr;

class WebConfigController extends Controller
{
    public function index()
    {
        $data = WebConfig::find(1);
        return view('BackEnd.web_config.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            if ($request->hasFile('website_header_logo')) {
                $img_url = WebConfig::find(1)->website_header_logo;
                if (file_exists(public_path($img_url))) {
                    File::delete(public_path($img_url));
                }

                $image = $request->file('website_header_logo');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/web');
                $image->move($destinationPath, $name);

                $url = 'uploads/web/' . $name;
            } else {
                $url = $request->website_header_logo_old;
            }


            if ($request->hasFile('website_footer_logo')) {
                $img_url = WebConfig::find(1)->website_footer_logo;
                if (file_exists(public_path($img_url))) {
                    File::delete(public_path($img_url));
                }

                $image = $request->file('website_footer_logo');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/web');
                $image->move($destinationPath, $name);

                $url2 = 'uploads/web/' . $name;
            } else {
                $url2 = $request->website_footer_logo_old;
            }

            $input = array_merge($request->all(), [
                'website_header_logo' => $url,
                'website_footer_logo' => $url2
            ]);

            WebConfig::find(1)->update($input);
            return redirect()->back()->with('success','Website Info Updated Successfully');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}

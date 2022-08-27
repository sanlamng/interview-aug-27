<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        $page['title'] = 'Instant Quotation';
        $page['description'] = "Shipping Cost Estimation";
        return view('home.indexweb', compact('page'));
    }

    public function book(Request $request)
    {
        $request->validate([
            'collection_postal_code' => 'required',
            'destination' => 'required',
            'weight.*' => 'required|numeric|min:1',
            'length.*' => 'required|numeric|min:1',
            'height.*' => 'required|numeric|min:1',
            'width.*' => 'required|numeric|min:1'
        ]);
        $page['title'] = "Quotation";
        $page['description'] = "Request Summary";
        $data = $request->except('_token');
        $destination = Destination::find($request->input('destination'));
        $total_shipment_cost = get_total_shipping_cost($destination->id, user('id'));
        $data['gross_weight'] = get_total_package_weight(request());
        $data['total_amount'] = number_format($total_shipment_cost, 2);
        $data['destination'] = $destination;
        $data['insured'] = $request->input('insured');
        session(['quote' => $data]);
        return view('home.booking', compact('page', 'data'));
    }

    public function about()
    {
        $page['title'] = 'About Us';
        $page['description'] = "About ".settings('company_name');
        return view('home.about', compact('page'));
    }

    public function privacy()
    {
        $page['title'] = 'Privacy Policy';
        $page['description'] = settings('company_name')." Privacy Policy";
        return view('home.privacy', compact('page'));
    }

    public function terms()
    {
        $page['title'] = 'Terms & Condition';
        $page['description'] = settings('company_name')." Terms & Condition";
        return view('home.terms', compact('page'));
    }

    public function contact()
    {
        $page['title'] = 'Contact Us';
        $page['description'] = "Contact ".settings('company_name');
        return view('home.contact', compact('page'));
    }

    public function process_contact(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|email',
            'mobile' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required|min:50',
            'country' => 'required'
        ],[
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.'
        ],[
            'name' => 'name',
            'mobile' => 'phone number'
        ]);
        return $this->__sendMail($request, 'contact message');
    }

    public function inquiry()
    {
        $page['title'] = 'Enquiry';
        $page['description'] = "Enquire ".settings('company_name');
        return view('home.inquiry', compact('page'));
    }

    public function process_inquiry(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|email',
            'mobile' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'inquiry' => 'required|min:50',
            'country' => 'required'
        ],[
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.'
        ],[
            'name' => 'full name',
            'mobile' => 'phone number'
        ]);
        return $this->__sendMail($request, 'enquiry');
    }

    private function __sendMail($request, $type)
    {

        $success   = 'Your '.$type.' has been sent';
        $error     = 'Your '.$type.' was not sent, please try again';
        $from = $request->input('email');
        $subject   = 'New '.$type.' sent from '.settings('company_name'); // Enter the subject of the email here.
        $header  = "From: " . $from . " <" . $from . ">" . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        $body  = '<table style="padding: 35px; background-color: #f5f5f5"; font-family: Roboto, sans-serif; font-size: 1rem; text-align: left; border-radius: 4px>';
        $body .= '<tr><th style="font-size: 1.5rem; font-weight: 600; color: #1E50BC">'.$subject.'</th></tr>';
        $body .= '<tr></td>';
        foreach( $request->except('_token') as $key => $value ) {
            if ( $key != 'section') {
                $body .= '<p><b>' . str_replace( '-', ' ', ucfirst( $key ) ) . '</b>: ' .  $value . '</p>';
            }
        }
        $body .= '</td></tr>';
        $body .= '</table>';
        $mail = @mail( settings('company_email'), $subject, $body, $header );
        if ( $mail ) {
            $request->session()->flash('status', $success);
            return back();
        }
        return back()->withErrors($error);
    }

    public function tracking()
    {
        $page['title'] = "Track & Trace";
        $page['description'] = "Consignment Tracking";
        return view('home.tracking.index', compact('page'));
    }

    public function process_tracking(Request $request)
    {
        $page['title'] = "Tracking";
        $page['description'] = $request->input('tracking_code');
        if($package = Package::whereTrackingCode($request->input('tracking_code'))->first()){
            return view('home.tracking.show', compact('page', 'package'));
        }
        return back()->withErrors('No match found');
    }

    public function cost_estimate(Request $request)
    {
        $destination = Destination::findOrFail($request->input('destination'));
        parse_str($request->input('weight'), $weight);
        parse_str($request->input('length'), $length);
        parse_str($request->input('width'), $width);
        parse_str($request->input('height'), $height);
        request()->merge(['weight' => $weight['weight'], 'length' => $length['length'], 'width' => $width['width'], 'height' => $height['height']]);
        $total_shipment_cost = get_total_shipping_cost($destination->id, user('id'));
        $data['weight'] = get_total_package_weight(request());
        $data['cost'] = number_format($total_shipment_cost, 2);
        return json_encode($data);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactType;
use App\Repositories\ContactRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;
use Redirect;
use Request;
use Session;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $contactTypeList = Cache::tags(['ContactController', 'ContactType', 'contactTypeList'])->rememberForever('contactTypeList', function () {
            return ContactType::contactTypeList();
        });

        return Theme::view('frontend.contact', compact('contactTypeList'));
    }

    public function store(Request $request)
    {
        $input = Input::all();

//        /*
//         * https://www.kaplankomputing.com/blog/tutorials/recaptcha-php-demo-tutorial/
//         * */
        $secret = Cache::tags('Setting')->get('google_recaptcha_secret_key');
        $response = $_POST["g-recaptcha-response"];
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
        $captcha_success = json_decode($verify);

        if ($captcha_success->success == false) {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

        $v = Contact::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        $result = $this->repo->create([
            'contact_type_id' => removeHtmlTagsOfField($input['contact_type_id']),
            'full_name' => removeHtmlTagsOfField($input['full_name']),
            'subject' => removeHtmlTagsOfField($input['subject']),
            'email' => removeHtmlTagsOfField($input['email']),
            'phone' => removeHtmlTagsOfField($input['phone']),
            'content' => removeHtmlTagsOfField($input['content']),
            'is_read' => 0,
            'IP' => Request::ip(),
            'status' => 0
        ]);

        if ($result) {
            Session::flash('success_messages', trans('contact.your_message_posted'));
            return Redirect::route('contact-index');
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}

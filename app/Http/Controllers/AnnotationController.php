<?php

namespace App\Http\Controllers;

use App\ImageLabels;
use App\ImageModel;
use Faker\Provider\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;
use GoogleCloudVision;
//use GoogleCloudVision\Request\AnnotateImageRequest;

class AnnotationController extends Controller
{

    //show the upload form
    public function displayForm(){
        return view('annotate');
    }

    public function annotateImage(Request $request){

        if($request->file('image')) {
            $image = file_get_contents($request->file('image'));
            //prepare request
            $imageAnnotator = new ImageAnnotatorClient([
                'credentials' => __DIR__ . '/key.json'
//                'credentials' => '/app/key.json'

            ]);
            $response = $imageAnnotator->labelDetection($image);
            $labels = $response->getLabelAnnotations();


            if ($labels) {
                $imagetoken = random_int(1111111, 999999999);
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/feed/' . $imagetoken . ".jpg");
            } else {
                header("location: index.php");
                die();
            }


//            $image_filters = ' "-1" ';
//
//            foreach ($labels as $label) {
//                $percent = number_format($label->getscore()  * 100 , 2) ;
//
//                if($percent >= 90){
//                    $image_filters.= ',"' .$label->getDescription().'"' ;
//                }
//
//            }


            $q = ImageModel::query();

            //  dd($q);

            foreach ($labels as $label) {
                $percent = number_format($label->getscore() * 100, 2);
                if ($percent >= 50) {
                    $q->whereraw('id in (select image_id from imagelabels where label = "' . $label->getDescription() . '" and 
            percent >= 50)');
                }
            }


            $image_result = $q->get();

//            dd($image_result);
//            dd($image_result);
//           return $image_filters ;

            return view('welcome', compact('image_result', 'image'));

            $imageAnnotator->close();
        }

    }


    public function addImage()
    {
        return view('add_image');
    }


    public function store_image(Request $request)
    {
        $imageuploade = new ImageModel();

        $image_name = '';
        if ($request->image != '') {
            $image_name = $request->image->store('images', 'public');


            $image = file_get_contents($request->file('image'));
            //prepare request
            $imageAnnotator = new ImageAnnotatorClient([
                'credentials' => __DIR__ . '/key.json'

            ]);
            $response = $imageAnnotator->labelDetection($image);
            $labels = $response->getLabelAnnotations();


            $imageAnnotator->close();
        }

        $imageuploade->image = $image_name;

        $imageuploade->save();




        foreach ($labels as $label) {

            $image_labels = new ImageLabels();

            $image_labels->label = $label->getDescription();
            $image_labels->percent =  number_format($label->getscore()  * 100 , 2);
            $image_labels->image_id = $imageuploade->id;

            $image_labels->save();
        }

        return redirect()->route('image.add')->with(['success' => 'تم اضافة القسم بنجاح']);
    }

}

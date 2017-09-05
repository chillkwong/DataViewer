<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;

class Diamond extends Model
{	

    use DataViewer;

    public static $columns = [
    			'id',
    			'netPrice',
    			'stock',
    			'certificate',
    			'shape',
    			'weight',
    			'color',
    			'clarity',
    			'cut',
    			'polish',
    			'symmetry',
    			'fluroscence',
    			'lab',
    			'location',
                                    'imageLink'
    			];

        // public static $columns = [
        //         'id',
        //         'netPrice',
        //         'stock',
        //         'certificate',
        //         'shape',
        //         'weight',
        //         'color',
        //         'clarity',
        //         'cut',
        //         'polish',
        //         'symmetry',
        //         'fluroscence',
        //         'lab'
        //         ];
}

<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/29/21
 * Time: 9:47 PM
 */

namespace App\Exports\SupplyPoint;


use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Excel;


class PointExport implements FromView, Responsable
{
    use Exportable;
    
    protected $points;
    
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'points.xls';
    
    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLS;
    
    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    
    public function __construct($points)
    {
        $this->points = $points;
    }
    
    public function view(): View
    {
        return view('backend.points.electricity.download',[
            'points' => $this->points,
        ]);
    }
}